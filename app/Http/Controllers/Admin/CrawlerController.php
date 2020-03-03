<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerController extends Controller
{
    public function __construct(){
        $this->client = app(Client::class);
        $this->books_url = array();
        $this->books_info = array();
        $this->text = '';
        $this->title = '';
    }
    public function test(){
        set_time_limit(0);
        for ($i=1; $i < 2; $i++) {
            $content_Main = $this->getPageContent("https://www.kingstone.com.tw/bookold/Search_age.asp?age=2&sort=sale_desc&sr1=%E4%B8%AD%E5%88%86%E9%A1%9E&sr2=%E5%AF%AB%E4%BD%9C%EF%BC%8F%E8%AA%9E%E6%96%87%E5%AD%B8%E7%BF%92&page=$i");
            $crawler_Main = new Crawler();
            $crawler_Main->addHtmlContent($content_Main);

            $target_Main = $crawler_Main->filterXPath('//div[@class="box row_list"]/ul');

            $target_Main->each(function ($node) {
                $titles = $this->getTitleFrombooks($node);
                $links = $this->getLinkFrombooks($node);

                foreach ($titles as $key => $title) {
                    $this->books_url[$titles[$key]] = 'https://www.kingstone.com.tw'.$links[$key];
                }
            });

            foreach ($this->books_url as $title => $book_url) {
                $this->title = $title;
                $content_Second = $this->getPageContent($book_url);
                $crawler_Second = new Crawler();
                $crawler_Second->addHtmlContent($content_Second);

                $target_Second = $crawler_Second->filterXPath('//div[@class="pdintroarea"]');
                $target_Second->each(function ($node2) {
                    $this->books_info[$this->title] = $this->getTextFrombooks($node2);
                });
            }
        }

        dd($this->books_info);
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
}
