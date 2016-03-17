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
    private $ID_TITLE = '';
    private $ID_PRICE = '';
    private $ID_IMAGE = '';
    private $ID_DETAILS_PRODUCT = '';
    private $ID_CATEGORY = '';
    private $ID_DATE_CREATED = '';
    private $ID_DATE_POSTED = '';
    private $ID_LOCATION = '';
    private $ID_ADS_ID = '';
    private $ID_USERNAME_SELLER = '';
    private $ID_MEMBER_REG_DATE = '';
    private $ID_LAST_LOGIN_DATE = '';
    private $ID_MORE_ADS = '';
    private $ID_LOCATION_SELLER = '';

    private $ID_SELLER_PHONE_NUMBER = '';
    private $ID_HUBUNGI_PENJUAL_BUTTON = '';

    public function open()
    {
        // TODO: Implement open() method.
        $this->getBrowser()->get("");
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