<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/14/16
 * Time: 1:41 PM
 */

namespace Tests\Pages\bdd;


class PostAds extends OneWeb
{
    private $ADS_TITLE = '';
    private $CATEGORY_DROPDOWN = '';
    private $ADS_DESC = '';
    private $IMAGE = '';
    private $LOCATION = '';
    private $NAME = '';
    private $EMAIL = '';
    private $NOHP = 'ad_form_seller_phone';
    private $PINBB = 'ad_form_seller_pinbb';
    private $AGREEMENT_USER = 'ad_form_user_accept';
    private $NEWSLETTER = '';
    private $BUTTON_SUBMIT = '';
    private $POST_ADS_CLASS = 'adding';

    public function inputTitle($title){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ADS_TITLE);
        $element->thenFind()->asHtmlElement()->sendKeys($title);
    }

    public function chooseCategory(){

    }

    public function inputDescription(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ADS_DESC);
    }

    public function setImage(){

    }

    public function inputName($name){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->NAME);
        $element->thenFind()->asHtmlElement()->sendKeys($name);
    }

    public function inputEmail($email){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->EMAIL);
        $element->thenFind()->asHtmlElement()->sendKeys($email);
    }

    public function inputNoHp($noHp){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->NOHP);
        $element->thenFind()->asHtmlElement()->sendKeys($noHp);
    }

    public function inputPinBB($pinBB){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->PINBB);
        $element->thenFind()->asHtmlElement()->sendKeys($pinBB);
    }

    public function thickAgreementUser(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->AGREEMENT_USER);
        if(!$element->thenFind()->asHtmlElement()->isSelected()){
            $element->thenFind()->asHtmlElement()->click();
        }
    }



    public function verifyPostAdsPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->POST_ADS_CLASS,$this->getAttributeBodyPage());
    }

}