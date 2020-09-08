<?php

namespace App\Http\Controllers\Admin\Crawler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

use App\Datasheet\ReadingCertificate;

class CrawlerReadTcController extends Controller
{
    public function __construct(){
        $this->client = app(Client::class);
    }

    public function MainPage(){
        set_time_limit(0);
        for ($i=490; $i <= 627; $i++) {
            if($i == 186){
                continue;
            }else{
                $content_Main = $this->getPageContent("http://read.tc.edu.tw/reading_certificate/book_list_simple.php?page=$i&perpage=100&order_key=complete_date_desc&show_suggest=&all_show=&simple=1&if_certificated=");
                $crawler_Main = new Crawler();
                $crawler_Main->addHtmlContent(mb_convert_encoding($content_Main, "UTF-8", "BIG5"));

                $target_Main = $crawler_Main->filterXPath('//table[@align="left"]');

                $target_Main->each(function ($node) {
                    $this->approx_datas = $this->getDetail($node);
                });
                // dd($this->approx_datas);
                foreach ($this->approx_datas as $key => $value) {
                    if($value != []){
                        if($value['ISBN'] != '' || $value['book_name'] != '' || $value['author'] != '' || $value['publisher'] != '' || $value['publish_year'] != ''  || $value['block'] != ''  || $value['attest'] != '' ){
                            if(!ReadingCertificate::where('ISBN',$value['ISBN'])->where('book_name',$value['book_name'])->exists()){
                                $flight = ReadingCertificate::firstOrCreate([
                                    'book_name' => $value['book_name'],
                                    'ISBN' => $value['ISBN'],
                                    'author' => $value['author'],
                                    'publisher' => $value['publisher'],
                                    'publish_year' => $value['publish_year'],
                                    'block' => $value['block'],
                                    'attest' => $value['attest']
                                ]);
                            }
                        }else{
                            dd($value);
                        }
                    }
                }
            }
        }
    }

    public function getPageContent($url){
        return $this->client->get($url)->getBody()->getContents();
    }

    public function getDetail(Crawler $node){
        $test = array();
        $datas = $node->filterXPath('//tr/td')->each(function (Crawler $node) {
            return $node->text();
        });
        $returnData = array();
        $num = 0;
        for ($i=0; $i < count($datas); $i++) {
            if($i < 8){
                continue;
            }else{
                switch ($i % 8) {
                    case 0:
                        if(!isset($returnData[$num])){
                            $returnData[$num] = array();
                        }
                        break;
                    case 1:
                        $returnData[$num]['book_name'] = $datas[$i];
                        break;
                    case 2:
                        $returnData[$num]['ISBN'] = $datas[$i];
                        break;
                    case 3:
                        $returnData[$num]['author'] = $datas[$i];
                        break;
                    case 4:
                        $returnData[$num]['publisher'] = $datas[$i];
                        break;
                    case 5:
                        $returnData[$num]['publish_year'] = $datas[$i];
                        break;
                    case 6:
                        $returnData[$num]['block'] = $datas[$i];
                        break;
                    case 7:
                        $returnData[$num]['attest'] = $datas[$i];
                        $num++;
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }
        return $returnData;
    }
}
