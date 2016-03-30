<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/18/16
 * Time: 3:33 PM
 */

namespace Tests\Pages\bdd;


use Athena\Page\BasePage;

class OneWeb extends BasePage
{
    public function getAttributeBodyPage(){
        return  $this->getElementBodyPage()->thenFind()->asHtmlElement()->getAttribute('class');
    }

    private function getElementBodyPage(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withXpath('//body');
    }

    public function getElementWithOther($attribute, $value){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath("//*[@".$attribute."='".$value."']");
    }

    public function checkUrl($url){
        if($this->getUrlStatus($url)!=200){
            \PHPUnit_Framework_Assert::fail($url.' is broken. status : '.$this->getUrlStatus($url));
        }
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

}

