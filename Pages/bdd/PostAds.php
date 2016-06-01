<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/14/16
 * Time: 1:41 PM
 */

namespace Tests\Pages\bdd;


use Athena\Athena;

class PostAds extends OneWeb
{
    private $ADS_TITLE = 'ad_form_title';
    private $CATEGORY_BUTTON = 'btn_ad_form_cat';
    private $CATEGORY_DROPDOWN_UL_LEVEL1 = 'sort__l1-list';
    private $CATEGORY_DROPDOWN_UL_LEVEL2 = 'sort__l2-list';
    private $CATEGORY_DROPDOWN_UL_LEVEL3 = 'sort__l3-list';
    private $ADS_DESC = '';
    private $IMAGE_BUTTON = 'btn_file_upload_add';
    private $CHOOSE_LOCATION_BUTTON = 'btn_ad_form_location';
    private $LOCATION_UL_REGION = 'location-list-regions';
    private $LOCATION_UL_CITIES = 'location-list-cities';
    private $NAME = '';
    private $EMAIL = '';
    private $NOHP = 'ad_form_seller_phone';
    private $PINBB = 'ad_form_seller_pinbb';
    private $AGREEMENT_USER = 'ad_form_user_accept';
    private $NEWSLETTER = 'ad_form_user_agreement_1';
    private $BUTTON_SUBMIT = 'ad_form_submit';
    private $POST_ADS_CLASS = 'adding';

    public function __construct()
    {
        parent::__construct(Athena::browser(),'post-ads');
    }

    public function inputTitle($title){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ADS_TITLE);
        $element->thenFind()->asHtmlElement()->sendKeys($title);
    }

    public function clickChooseCategoryButton(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->CATEGORY_BUTTON);
        $element->thenFind()->asHtmlElement()->click();
    }

    public function chooseCategoryLevel1($index_level1){
        $element_cat_level1 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->CATEGORY_DROPDOWN_UL_LEVEL1.'\']$/li['.$index_level1.']/a');

        $element_cat_level1->thenFind()->asHtmlElement()->click();
    }

    public function chooseCategoryLevel2($index_level2){
        $element_cat_level2 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->CATEGORY_DROPDOWN_UL_LEVEL2.'\']$/li['.$index_level2.']/a');

        $element_cat_level2->thenFind()->asHtmlElement()->click();
    }

    public function chooseCategoryLevel3($index_level3){
        $element_cat_level3 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->CATEGORY_DROPDOWN_UL_LEVEL3.'\']$/li['.$index_level3.']/a');

        $element_cat_level3->thenFind()->asHtmlElement()->click();
    }

    public function inputDescription($description){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ADS_DESC);
        $element->thenFind()->asHtmlElement()->sendKeys($description);
    }

    public function setImage($path_image){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->IMAGE_BUTTON);
        $element->thenFind()->asHtmlElement()->sendKeys($path_image);
    }

    public function clickChooseLocationButton(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->CHOOSE_LOCATION_BUTTON);
        $element->thenFind()->asHtmlElement()->click();
    }

    public function chooseRegion($index_region){
        $element_region = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->LOCATION_UL_REGION.'\']$/li['.$index_region.']/a');

        $element_region->thenFind()->asHtmlElement()->click();
    }

    public function chooseCity($index_city){
        $element_city = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->LOCATION_UL_CITIES.'\']$/li['.$index_city.']/a');

        $element_city->thenFind()->asHtmlElement()->click();
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

    public function thickAcceptNewsLetter(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->NEWSLETTER);
        if(!$element->thenFind()->asHtmlElement()->isSelected()){
            $element->thenFind()->asHtmlElement()->click();
        }
    }

    public function clickSubmitAds(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->BUTTON_SUBMIT);
        $element->thenFind()->asHtmlElement()->click();
    }

    public function verifyPostAdsPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->POST_ADS_CLASS,$this->getAttributeBodyPage());
    }

}