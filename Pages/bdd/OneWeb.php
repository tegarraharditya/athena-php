<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/18/16
 * Time: 3:33 PM
 */

namespace Tests\Pages\bdd;


use Athena\Athena;
use Athena\Page\AbstractPage;
use Facebook\WebDriver\WebDriverExpectedCondition;

class OneWeb extends AbstractPage
{
    public function getAttributeBodyPage(){
        return  $this->getElementBodyPage()->thenFind()->asHtmlElement()->getAttribute('class');
    }

    private function getElementBodyPage(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withXpath('//body');
    }

    public function getUrl(){
        return Athena::settings()->getByPath('footer.atr0');
    }

    public function getElementWithOther($attribute, $value){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath("//*[@".$attribute."='".$value."']");
    }

    public function checkUrl($url){
        $status = $this->getUrlStatus($url);
        if(substr($status,0,1)!=2){
            \PHPUnit_Framework_Assert::fail($url.' is broken. status : '.$this->getUrlStatus($url));
        }
    }

    public function isURLBroken($url){
        $status = $this->getUrlStatus($url);
        $broken = false;
        if(substr($status,0,1)!=2){
            $broken = true;
        }
        return $broken;
    }

    public function getUrlStatus($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        $returnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $returnCode;
    }

    public function getJavascripVar(){
        return $this->getBrowser()->executeScript('window.categoryAll');
        //return $this->getBrowser()->getCurrentPage()->getElement()
          //  ->withXpath('//script[@type=\'text/javascript\']')->thenFind()->asHtmlElement()
            //->getText();
    }

}

