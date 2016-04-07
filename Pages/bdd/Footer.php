<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 9:52 AM
 */

namespace Tests\Pages\bdd;


use Athena\Page\BasePage;

 class Footer extends OneWeb
{
    private $XPATH_ALL_LINK = '//*[@id=\'main-footer\']//a';

    private $urls_footer = array(
        'http://olex.id/',
        'http://help.olx.co.id/hc/id',
        'http://help.olx.co.id/hc/id/articles/206444513-Ketentuan-Umum',
        'http://help.olx.co.id/hc/id/articles/206077866-Kebijakan-Privasi',
        'http://help.olx.co.id/hc/id/articles/206443633-Cara-Menggunakan-OLX',
        'http://help.olx.co.id/hc/id/articles/206443813-Tips-Jual-Beli-Aman-di-OLX',
        'http://olx.co.id/sitemap/',
        'http://olx.co.id/sitemap/regions/',
        'http://olx.co.id/popular/',
        'http://joinolx.com/',
        'https://www.facebook.com/olxid',
        'https://twitter.com/OLX_Indonesia',
        'http://blog.olx.co.id/');

    public function __construct()
    {
        parent::__construct('/');
    }

    private function getElementFooterById($id){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($id);
    }

    private function getElementBodyFooterByXpath(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withXpath('//body');
    }

    public function openAllLinkATFooter(){
        foreach($this->getAllLinkAtFooter() as $url){
            $this->getBrowser()->get($url);
        }
    }

    public function getAllLinkAtFooter(){
        $elements = $this->getBrowser()->getCurrentPage()->find()
            ->elementsWithXpath($this->XPATH_ALL_LINK);
        $urls = [];
        foreach($elements as $elm){
            $urls[]=$elm->getAttribute('href');
        }
        return $urls;
    }

    public function verifyAllFooterLink(){

        $verified=[];
        $unverified=[];
        $i=0;
        foreach($this->getAllLinkAtFooter() as $url){
            if(strcmp($url,$this->urls_footer[$i])==0){
               $verified[]=array($i=>$url);
            }else{
                $unverified[]=array($i=>$url);
            }
            $i++;
        }

        if(count($unverified)>0){
            $error = print_r($unverified);
            \PHPUnit_Framework_Assert::fail($error);
        }
    }

    public function verifyAllLinkNotBroken(){
        $broken = [];
        $valid = [];
        $i=0;
        foreach($this->getAllLinkAtFooter() as $url){
            if($this->isURLBroken($url)){
                $broken[] = array($i=>$url);
            }else{
                $valid[] = array($i=>$url);
            }
            $i++;
        }

        if(count($broken)>0){
            $error = print_r($broken);
            \PHPUnit_Framework_Assert::fail($error);
        }
    }

    public function openFooterIndexKe($index){
        $this->getBrowser()->get($this->getAllLinkAtFooter()[$index]);
    }

    public function getUrlFooter($id){
        return $this->getElementFooterById($id)->thenFind()->asHtmlElement()->getAttribute('href');
    }

    public function clickFooterLink($footer){
        $this->getElementFooterById($footer)->thenFind()->asHtmlElement()->click();
    }

    public function isElementExistById($id){
        $this->getBrowser()->getCurrentPage()->getElement()->withId($id)->assertThat()->isDisplayed();
    }

    public function getAttributeFooterPage(){
        return $this->getElementBodyFooterByXpath()->thenFind()->asHtmlElement()->getAttribute('class');
    }

 }