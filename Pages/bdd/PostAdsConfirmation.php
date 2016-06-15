<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 6/9/16
 * Time: 12:42 PM
 */

namespace Tests\Pages\bdd;


use Athena\Athena;

class PostAdsConfirmation extends OneWeb
{
    private $REPOST_ADS_BUTTON = 'btn_post_success_repeat';
    private $REPOST_ADS_SAME_CAT_BUTTON = 'btn_post_success_repeat_cat';
    private $ATRR_BODY_CLASS_PAGE = 'addingConfirm';

    public function __construct()
    {
        parent::__construct(Athena::browser(), '');
    }

    public function verifyPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->ATRR_BODY_CLASS_PAGE,$this->getAttributeBodyPage());
    }

    private function getElementWithID($id){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($id);
    }

    public function verifyAdsButton(){
        $this->getElementWithID($this->REPOST_ADS_BUTTON)->assertThat()->isDisplayed();
    }

    public function verifyAdsButtonOtherCategory(){
        $this->getElementWithID($this->REPOST_ADS_SAME_CAT_BUTTON)->assertThat()->isDisplayed();
    }

    public function clickRepostAdsButton(){
        $this->getElementWithID($this->REPOST_ADS_BUTTON)->thenFind()->asHtmlElement()
            ->click();
        return new PostAds();
    }

    public function clickRepostAdsSameCategoryButton(){
        $this->getElementWithID($this->REPOST_ADS_SAME_CAT_BUTTON)->thenFind()->asHtmlElement()
            ->click();
        return new PostAds();
    }


}