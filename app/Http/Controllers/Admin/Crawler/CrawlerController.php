<?php

namespace App\Http\Controllers\Admin\Crawler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

use App\Datasheet\ReadingCertificate;
use App\Datasheet\ReadingCertificate_Content;

class CrawlerController extends Controller
{
    public function __construct(){
        $this->client = app(Client::class);
        $this->books_url = array();
        $this->books_content = array();
        $this->book_content = '';
        $this->books_title = array();
        $this->text = '';
        $this->title = '';
        $this->approx_datas = array();
    }
    public function searchBooksUrl(){
        set_time_limit(0);
        $readindCertificate_books = ReadingCertificate::where('attest', '=','可認證')->where('id','>',22782)->get()->toArray();

        foreach ($readindCertificate_books as $key => $value) {
            $book_url = '';
            $this->book_content = '';
            // dd($value);
            $content_Main = $this->getPageContent("https://www.kingstone.com.tw/search/search?q=".$value['ISBN']);
            $crawler_Main = new Crawler();
            $crawler_Main->addHtmlContent($content_Main);
            // dd($crawler_Main);
            $books_publish_date = $crawler_Main->filterXPath('//span[@class="pubdate"]/b')->evaluate('string()');
            $books_url = $crawler_Main->filterXPath('//h3[@class="pdnamebox"]/a')->evaluate('string(@href)');
            $books_classbox = $crawler_Main->filterXPath('//div[@class="classbox"]')->evaluate('string()');
            
            if($books_url != []){
                foreach ($books_publish_date as $key => $date) {
                    if(strpos($date,$value['publish_year']) !== false){
                        $book_url = $books_url[$key];
                        $book_classbox = $books_classbox[$key];
                    }
                }
                if($book_url == '' && $books_classbox != [] && $books_url != []){
                    $book_url = $books_url[0];
                    $book_classbox = $books_classbox[0];
                }
            }else{
                continue;
            }
            if(strpos($book_url,'zone=book&lid=search&actid=WISE') !== false){
                $book_url = 'https://www.kingstone.com.tw'.$book_url;
                $content_Second = $this->getPageContent($book_url);

                $book_content_crawler = new Crawler();
                $book_content_crawler->addHtmlContent($content_Second);

                $book_allcontent = $book_content_crawler->filterXPath('//div[@class="pdintroarea"]');

                $book_allcontent->each(function ($node2, $index) {
                    $this->book_content .= $this->getTextFrombooks($node2)[0];
                });
                $replace_arr = array(
                    "\r\n" => '',
                    " " => '',
                    "內容簡介" => '',
                    "看更多" => '',
                    "\t" => '',
                    "\n" => ''
                );
                $book_content = strtr(trim($this->book_content),$replace_arr);
                $book_classbox = strtr(trim($book_classbox),$replace_arr);
                
                $check_exist = ReadingCertificate_Content::where('RC_ISBN',$value['ISBN'])->where('RC_id',$value['id'])->exists();
                ReadingCertificate::where([
                    'id'=>$value['id'],
                    'ISBN' => $value['ISBN'],
                ])->update([
                    'classification'=>$book_classbox,
                    'form'=>$book_classbox,
                    'url'=>$book_url
                ]);
                if(!$check_exist){
                    ReadingCertificate_Content::create([
                        'RC_id' => $value['id'],
                        'RC_ISBN' => $value['ISBN'],
                        'book_content' => $book_content,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]);
                }else{
                    ReadingCertificate_Content::where([
                        'RC_id' => $value['id'],
                        'RC_ISBN' => $value['ISBN']]
                    )->update([
                        'book_content' => $book_content,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ]);
                }
                // if($value['id'] >1){
                //     dd($value, $books_publish_date, $book_classbox, $books_url,$book_url, $crawler_Main);
                // }
            }   
                // dd($value, $books_publish_date, $book_classbox, $books_url,$book_url, $crawler_Main);
            else{
                continue;
            }
        }
    }

    public function test(){
        set_time_limit(0);
        for ($i=1; $i < 2; $i++) {
            $content_Main = $this->getPageContent("https://www.kingstone.com.tw/bookold/Search_age.asp?age=4&sort=sale_desc&sr1=&sr2=&page=$i");
            $crawler_Main = new Crawler();
            $crawler_Main->addHtmlContent($content_Main);

            $target_Main = $crawler_Main->filterXPath('//div[@class="box row_list"]/ul');

            $target_Main->each(function ($node) {
                $this->approx_datas = $this->getPublisherDateFrombooks($node);
                $this->books_title = $this->getTitleFrombooks($node);
                $links = $this->getLinkFrombooks($node);
                // $authors = $this->getAuthorFrombooks($node);
                // $publishers = $this->getPublisherFrombooks($node);
                foreach ($this->books_title as $key => $title) {
                    $this->books_url[$this->books_title[$key]] = 'https://www.kingstone.com.tw'.$links[$key];
                }
            });

            foreach ($this->books_url as $title => $book_url) {
                $this->title = $title;
                $content_Second = $this->getPageContent($book_url);
                $crawler_Second = new Crawler();
                $crawler_Second->addHtmlContent($content_Second);

                $target_Second = $crawler_Second->filterXPath('//div[@class="pdintroarea"]');
                $target_Second->each(function ($node2, $index) {
                    array_push($this->books_content,$this->getTextFrombooks($node2)[0]);
                });
            }

            dd($this->books_title, $this->approx_datas, $this->books_content);
        }
    }
    public function getPageContent($url){
        return $this->client->get($url)->getBody()->getContents();
    }

    public function getTitleFrombooks(Crawler $node){
        return $node->filterXPath('//li/a[@class="anchor"]')->evaluate('string(@title)');
    }

    public function getLinkFrombooks(Crawler $node){
        return $node->filterXPath('//li/a[@class="anchor"]')->evaluate('string(@href)');
    }

    public function getTextFrombooks(Crawler $node){
        return $node->filterXPath('//div[@class="panelcollapse pdintro"]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }
    public function getAuthorFrombooks(Crawler $node){
        return $node->filterXPath('//span[@class="author"]')->each(function (Crawler $node) {
                return $node->text();
            });
    }
    public function getPublisherFrombooks(Crawler $node){
        return $node->filterXPath('//span[@class="publisher"]')->each(function (Crawler $node) {
                return $node->text();
            });
    }
    public function getPublisherDateFrombooks(Crawler $node){
        $datas = $node->filterXPath('//li/span')->each(function (Crawler $node) {
            return $node->text();
        });

        $count = 0;
        $returnDatas = array();
        foreach ($datas as $key => $value) {
            if(!isset($returnDatas[$count])){
                $returnDatas[$count] = array();
            }

            if(strpos($value, '立即購買') !== false){
                $count++;
            }else{
                array_push($returnDatas[$count], $value);
            }
        }
        return $returnDatas;
    }
}
