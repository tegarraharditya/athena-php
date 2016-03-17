<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 11:49 AM
 */

namespace Tests\Page;


class ListingsDetails extends AbstractPage
{
    private $ID_TITLE = 'detail_ad_title';
    private $ID_PRICE = 'detail_ad_price';
    private $ID_IMAGE = 'detail_ad_img';
    private $ID_DETAILS_PRODUCT = 'detail_ad_desc';
    private $ID_CATEGORY = 'detail_ad_category';
    private $ID_DATE_CREATED = '';
    private $ID_DATE_POSTED = 'detail_ad_posted';
    private $ID_LOCATION = 'detail_ad_location';
    private $ID_ADS_ID = 'detail_ad_id';
    private $ID_USERNAME_SELLER = 'detail_seller_name';
    private $ID_MEMBER_REG_DATE = 'detail_seller_registered';
    private $ID_LAST_LOGIN_DATE = 'detail_seller_last_log';
    private $ID_MORE_ADS = '';
    private $ID_LOCATION_SELLER = 'detail_seller_address';

    private $ID_SELLER_PHONE_NUMBER = 'detail_ad_contact';
    private $ID_HUBUNGI_PENJUAL_BUTTON = '';

    public function open($url)
    {
        // TODO: Implement open() method.
        $this->getBrowser()->get($url);
    }

    private function getElementListingsDetails($element){
        return $this->getElement()->withId($element);
    }

    private function verifyElementListingsDetails($element){
        $this->getElementListingsDetails($element)->wait(3)->toBeVisible();
        $this->getDataFromElementListingsDetails($element);
    }

    private function getElementHubungiPenjualButton(){
        return $this->getElement()->withId($this->ID_HUBUNGI_PENJUAL_BUTTON);
    }

    /**
     * @param $element
     * @return string
     */
    private function getDataFromElementListingsDetails($element){
        return $this->getElementListingsDetails($element)->thenFind()->asHtmlElement()->getText();
    }

    public function clickHubungiPenjualButton(){
        $this->getElementHubungiPenjualButton()->thenFind()->asHtmlElement()->click();
    }

    public function verifyListingsDetailsCategoryMobil(){
        $this->verifyElementListingsDetails($this->ID_TITLE);
        $this->verifyElementListingsDetails($this->ID_IMAGE);
        $this->verifyElementListingsDetails($this->ID_PRICE);
        $this->verifyElementListingsDetails($this->ID_DETAILS_PRODUCT);
        $this->verifyElementListingsDetails($this->ID_CATEGORY);
        $this->verifyElementListingsDetails($this->ID_DATE_CREATED);
    }

    public function verifyListingsDetailsCategoryMotor(){

    }

    public function verifyListingsDetailsCategoryProperty(){}

    public function verifyListingsDetailsCategoryKeperluanPribadi(){

    }

    public function verifyListingsDetailsCategoryElectronicGadget(){

    }

    public function verifyListingsDetailsCategoryHobiOlahraga(){

    }

    public function verifyListingsDetailsCategoryRumahTangga(){

    }

    public function verifyListingsDetailsCategoryPerlengkapanBayiAnak(){

    }

    public function verifyListingsDetailsCategoryKantorIndustri(){

    }

    public function verifyListingsDetailsCategoryJasaLoker(){

    }

    public function verifyListingsDetailsSellerInfo(){

    }


}