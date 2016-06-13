<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 9:52 AM
 */

namespace Tests\Pages\bdd;

use Athena\Athena;

 class Footer extends OneWeb
{
    private $XPATH_ALL_LINK = '//*[@id=\'main-footer\']//a';

    private $urls_footer = array(
        'http://help.olx.co.id/hc/id',
        'http://joinolx.com/',
        'http://blog.olx.co.id/');

    private $TOTAL_IGNORE_LINK = 3;

    public function __construct()
    {
        parent::__construct(Athena::browser(),'/');
    }

    private function getElementFooterById($id){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($id);
    }

    private function getElementBodyFooterByXpath(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withXpath('//body');
    }

    public function openAllLinkATFooter(){
        /*foreach($this->getAllLinkAtFooter() as $url){
            $this->getBrowser()->get($url);
        }*/
        $total_link_test = count($this->getAllLinkAtFooter())-$this->TOTAL_IGNORE_LINK;
        $urls = $this->getAllLinkAtFooter();
        for($i=0;$i<$total_link_test;$i++){
            $this->getBrowser()->get($urls[$i]);
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

        $urls = $this->getAllLinkAtFooter();
        $total_link_test = count($urls)-$this->TOTAL_IGNORE_LINK;
        for($i=0;$i<$total_link_test;$i++){
            if(strcmp($urls[$i],$this->urls_footer[$i])==0){
                $verified[]=array($i=>$urls[$i]);
            }else{
                $unverified[]=array($i=>$urls[$i]);
            }
        }

        if(count($unverified)>0){
            $error = print_r($unverified);
            \PHPUnit_Framework_Assert::fail($error);
        }
    }

    public function verifyAllLinkNotBroken(){
        $broken = [];
        $valid = [];

        $urls = $this->getAllLinkAtFooter();
        $total_link_test = count($urls)-$this->TOTAL_IGNORE_LINK;
        for($i=0;$i<$total_link_test;$i++){
            if($this->isURLBroken($urls[$i])){
                $broken[] = array($i=>$urls[$i]);
            }else{
                $valid[] = array($i=>$urls[$i]);
            }
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