<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/4/16
 * Time: 10:47 AM
 */

namespace Tests\Pages\bdd;


use Athena\Athena;
use Athena\Page\BasePage;
use Facebook\WebDriver\WebDriverExpectedCondition;

class Homepage extends OneWeb
{
    CONST HOME = 'home--';
    CONST HEADER_POST_ADS_LINK = 'post-ad-head';

    public function __construct()
    {
        parent::__construct(Athena::browser(),'/');
    }

    public function verifyPage(){
        \PHPUnit_Framework_Assert::assertEquals(static::HOME,$this->getAttributeBodyPage());
    }

    private function getElementLogo(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId('logo-header');
    }

    private function getElementCategory($attribute,$value){
        return $this->getElementWithOther($attribute, $value);
    }

    private function getElementCategoryViewAll($id){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($id);
    }

    public function clickLogo(){
        $this->getElementLogo()->thenFind()->asHtmlElement()->click();
    }

    public function clickElementLevel2($level2){
        $this->getElementCategory('data-cat-name',$level2)->thenFind()->asHtmlElement()->click();
        return new Listings(Athena::browser());
    }

    public function clickElementLevel1($level1){
        $this->getElementCategory('data-cat-name', $level1)->thenFind()->asHtmlElement()->click();
    }

    public function clickElementCategoryViewAll($viewall){
        $this->getElementCategoryViewAll($viewall)->thenFind()->asHtmlElement()->click();
    }

    public function clickPostAdsLink(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId(static::HEADER_POST_ADS_LINK);

        $element->thenFind()->asHtmlElement()->click();
        return new PostAds();
    }


}