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

}