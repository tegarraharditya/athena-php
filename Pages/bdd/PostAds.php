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
    private $NOHP = '';
    private $PINBB = '';
    private $AGREEMENT_USER = '';
    private $NEWSLETTER = '';
    private $BUTTON_SUBMIT = '';

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



}