<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 11:49 AM
 */

namespace Tests\Pages\bdd;


use Athena\Athena;
use Behat\Behat\Tester\Exception\PendingException;

class ListingsDetails extends OneWeb
{
    //Default Details Listings
    private $ID_TITLE = 'detail_ad_title';
    private $ID_IMAGE = 'detail_ad_img';
    private $ID_DETAILS_PRODUCT = 'detail_ad_desc';

    private $ID_PRICE = 'detail_ad_price';
    private $ID_SELLER_PHONE_NUMBER = 'detail_ad_contact';
    private $ID_CATEGORY = 'detail_ad_category';
    private $ID_DATE_POSTED = 'detail_ad_posted';
    private $ID_JUMLAH_PENGUNJUNG = '';
    private $ID_ADS_ID = 'detail_ad_id';

    private $ID_USERNAME_SELLER = 'detail_seller_name';
    private $ID_ADDRESS_SELLER = 'detail_seller_address';
    private $ID_MEMBER_REG_DATE = 'detail_seller_registered';
    private $ID_LAST_LOGIN_DATE = 'detail_seller_last_log';

    //Extra Field Details Listings - Mobil Bekas
    private $ID_MOBIL_TIPE_MOBIL = 'detail_ad_param_m_tipe';
    private $ID_MOBIL_TRANSMISSION = 'detail_ad_param_m_transmission';
    private $ID_MOBIL_TAHUN = 'detail_ad_param_m_year';

    //Extra Field Details Listings - Property
    private $ID_PROPERTY_LUAS_TANAH = 'detail_ad_param_p_sqr_land';
    private $ID_PROPERTY_LUAS_BANGUNAN = 'detail_ad_param_p_sqr_building';
    private $ID_PROPERTY_SERTIFIKAT = 'detail_ad_param_p_certificate';
    private $ID_PROPERTY_FASILITAS = 'detail_ad_param_p_facility';
    private $ID_PROPERTY_PROPERTY_ADDRESS = 'detail_ad_param_p_alamat';

    //Extra Field Listings Details -  Jasa dan Lowongan
    private $ID_JASA_LOWONGAN_SALARY = 'detail_ad_param_salary';

    //other element
    private $ID_HUBUNGI_PENJUAL_BUTTON = 'detail_ad_contact_pm';
    private $ID_CHAT_DENGAN_PENJUAL = 'detail_contact_chat';
    private $ID_NEXT_PAGE = 'page_nav_sibling_next';
    private $ID_PREV_PAGE = 'page_nav_sibling_prev';
    private $ATR_LISTINGS_DETAILS_PAGE = 'advert';

    private $ID_SELLER_CONTACT = 'btn_contact_main';
    private $ID_ICON_ANDROID = 'login-head';


    public function __construct()
    {
        parent::__construct(Athena::browser(),'listings_details');
    }


    private function getElementListingsDetails($element){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($element);
    }

    private function getElementHubungiPenjualButton(){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withId($this->ID_HUBUNGI_PENJUAL_BUTTON);
    }

    private function getElementChat(){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withId($this->ID_CHAT_DENGAN_PENJUAL);
    }

    private function getDataFromElementListingsDetails($element){
        return $this->getElementListingsDetails($element)->thenFind()->asHtmlElement()->getText();
    }

    public function getTextCategoryName(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_CATEGORY);
        return $element->thenFind()->asHtmlElement()->getText();
    }

    public function verifyAttributeClassBody(){
        \PHPUnit_Framework_Assert::assertEquals($this->ATR_LISTINGS_DETAILS_PAGE,$this->getAttributeBodyPage());
    }

    private function verifyElementListingsDetails($element){
        $this->getElementListingsDetails($element)->assertThat()->isDisplayed();
    }

    public function clickHubungiPenjualButton(){
        $this->getElementHubungiPenjualButton()->thenFind()->asHtmlElement()->click();
    }

    public function clickChatwithSeller(){
        $this->getElementChat()->thenFind()->asHtmlElement()->click();
    }

    public function verifyPopUpChatwithSeller(){
        $element_active = $this->getBrowser()->getCurrentPage()
            ->getElement()->withXpath('//*[@class=\'modal__group js-cta-modal-target is-shown\']');
        $element_active->assertThat()->isDisplayed();
    }

    public function verifyImageDetailsAsContain(){
        $elements = $this->getBrowser()->getCurrentPage()->find()
            ->elementsWithXpath('//*[@id=\''.$this->ID_IMAGE.'\']//li');

        foreach($elements as $element){
            $attr_value = $element->getAttribute('style');
            if($attr_value==''){
                \PHPUnit_Framework_Assert::fail('Ads doesn\'t has Image');
            }
            if(strpos($attr_value,'background-size: contain;')==-false){
                \PHPUnit_Framework_Assert::fail(
                    'Image on Ads Details page is not fit. Please check manually. url: '.$this->getBrowser()->getCurrentURL());
            }
        }
    }




    public function verifyListingDetails($category){
        $this->verifyElementListingsDetails($this->ID_TITLE);
        $this->verifyElementListingsDetails($this->ID_IMAGE);
        $this->verifyElementListingsDetails($this->ID_DETAILS_PRODUCT);

        $this->verifyElementListingsDetails($this->ID_PRICE);
        $this->verifyElementListingsDetails($this->ID_SELLER_PHONE_NUMBER);
        $this->verifyElementListingsDetails($this->ID_CATEGORY);
        $this->verifyElementListingsDetails($this->ID_DATE_POSTED);
        $this->verifyElementListingsDetails($this->ID_JUMLAH_PENGUNJUNG);
        $this->verifyElementListingsDetails($this->ID_ADS_ID);

        $this->verifyElementListingsDetails($this->ID_USERNAME_SELLER);
        $this->verifyElementListingsDetails($this->ID_ADDRESS_SELLER);
        $this->verifyElementListingsDetails($this->ID_MEMBER_REG_DATE);
        $this->verifyElementListingsDetails($this->ID_LAST_LOGIN_DATE);

        $this->verifyFraudWarningElement();
        $this->verifyExtraParameter($category);
    }

    private function verifyExtraParameter($category){
        if(strcmp($category,'mobil-bekas')){
            $this->verifyExtraParameterMobilBekas();
        }else if (strcmp($category,'property')){
            $this->verifyExtraParameterProperty();
        }else if(strcmp($category,'lowongan')){
            $this->verifyExtraParameterJasaLowongan();
        }else{
            \PHPUnit_Framework_Assert::fail($category.' is undefined');
        }
    }

    private function verifyExtraParameterMobilBekas(){
        $this->verifyElementListingsDetails($this->ID_MOBIL_TIPE_MOBIL);
        $this->verifyElementListingsDetails($this->ID_MOBIL_TRANSMISSION);
        $this->verifyElementListingsDetails($this->ID_MOBIL_TAHUN);
    }

    private function verifyExtraParameterProperty(){
        $this->verifyElementListingsDetails($this->ID_PROPERTY_LUAS_TANAH);
        $this->verifyElementListingsDetails($this->ID_PROPERTY_LUAS_BANGUNAN);
        $this->verifyElementListingsDetails($this->ID_PROPERTY_SERTIFIKAT);
        $this->verifyElementListingsDetails($this->ID_PROPERTY_FASILITAS);
        $this->verifyElementListingsDetails($this->ID_PROPERTY_PROPERTY_ADDRESS);
    }

    private function verifyExtraParameterJasaLowongan(){
        $this->verifyElementListingsDetails($this->ID_JASA_LOWONGAN_SALARY);
    }

    public function verifiedListingsDetailsByKeyword($keyword){
        $elements = $this->getBrowser()->getCurrentPage()->find()
            ->elementsWithXpath('//*[contains(text(),\''.$keyword.'\')]');

        if(!count($elements)>0){
            \PHPUnit_Framework_Assert::fail('Keyword is not found on Listings Details Page');
        }
    }

    public function verifyFraudWarningElement(){
        $this->getBrowser()->getCurrentPage()->getElement()->withXpath('.//*[text()=\'Tips Berbelanja\']')->assertThat()->isDisplayed();
    }

    public function verifiedListingsDetailsByKeywordInSpecificArea($keyword,$area){
        $address = $this->getElementListingsDetails($this->ID_ADDRESS_SELLER)->thenFind()
            ->asHtmlElement()->getText();
        $this->verifiedListingsDetailsByKeyword($keyword);
        \PHPUnit_Framework_Assert::assertEquals($area,$address);
    }

    public function verifyListingDetailsInSpecificArea($area){
        $address = $this->getElementListingsDetails($this->ID_ADDRESS_SELLER)->thenFind()
            ->asHtmlElement()->getText();
        \PHPUnit_Framework_Assert::assertEquals($area,$address);
    }

    public function clickNextPage(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()
            ->withId($this->ID_NEXT_PAGE);

        $element->thenFind()->asHtmlElement()->click();
    }

    public function clickAndroidIcon(){
         $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_ICON_ANDROID)->thenFind()->asHtmlElement()->click();
    }

    public function clickCloseIconAndroid(){
        $this->getBrowser()->getCurrentPage()->getElement()->withXpath(".//*[@id='js-modal-login']/div[2]/section/header/a/span")->thenFind()->asHtmlElement()->click();
    }

    public function clickPrevPage(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()
            ->withId($this->ID_PREV_PAGE);

        $element->thenFind()->asHtmlElement()->click();
    }

    public function verifyPhoneNumberOnHubungiPenjualElement(){
        $element_attribut_value = $this->getElementHubungiPenjualButton()->thenFind()->asHtmlElement()
            ->getAttribute('href');

        if(!substr($element_attribut_value,0,4)=='tel:'){
            \PHPUnit_Framework_Assert::fail('Error : Hubungi Penjualan Element is not started with \'tel:\'');
        }
    }

    public function verifyProductCondition($condition){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId('detail_ad_param_condition');
        $condition_actual = $element->thenFind()->asHtmlElement()->getText();

        if(!strcmp($condition_actual,$condition)==0){
            \PHPUnit_Framework_Assert::fail('Expected : '.$condition.'. Actual : '.$condition_actual);
        }
    }

    /**
     * @return bool
     */
    public function isNotClosedIconAndroid(){
        return $this->getBrowser()->getCurrentPage()->find()->elementWithId("js-modal-login")->isDisplayed();
    }

    public function verifyCloseIconAndroid(){
        \PHPUnit_Framework_Assert::assertNotTrue($this->isNotClosedIconAndroid(),'Modals is not cloed');
    }


}