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
    private $ADS_DESC = 'ad_form_desc';
    private $IMAGE_BUTTON = 'btn_file_upload_add';
    private $CHOOSE_LOCATION_BUTTON = 'btn_ad_form_location';
    private $LOCATION_UL_REGION = 'location-list-regions';
    private $LOCATION_UL_CITIES = 'location-list-cities';
    private $NAME = 'ad_form_seller_name';
    private $EMAIL = 'ad_form_seller_mail';
    private $NOHP = 'ad_form_seller_phone';
    private $PINBB = 'ad_form_seller_pinbb';
    private $AGREEMENT_USER = 'ad_form_user_accept';
    private $NEWSLETTER = 'ad_form_user_agreement_1';
    private $BUTTON_SUBMIT = 'ad_form_submit';
    private $POST_ADS_CLASS = 'adding';

    //error label
    private $LABEL_ERROR_TITLE = 'ad_form_title-error';
    private $LABEL_ERROR_CATEGORY = 'ad_form_category-error';
    private $LABEL_ERROR_CITY = 'ad_form_city-error';
    private $LABEL_ERROR_NAME = 'ad_form_seller_name-error';
    private $LABEL_ERROR_EMAIL = 'ad_form_seller_mail-error';
    private $LABEL_ERROR_NOHP = 'ad_form_seller_phone-error';
    private $LABEL_ERROR_AGREEMENT_USER = 'data[accept]-error';

    //extra field
    private $ID_price = 'param_price';
    private $SELECT_TIPE_KENDARAAN = 'param_m_tipe';
    private $SELECT_TRANSMISI = 'param_m_transmission';
    private $SELECT_YEARS = 'param_m_year';
    private $BUILDING_AREA = 'param_p_sqr_building';
    private $FLOOR = 'param_p_floor';
    private $SELECT_BEDROOM = 'param_p_bedroom';
    private $SELECT_CERTIFICATE = 'param_p_certificate';
    private $FACILITY_AC = 'param_p_facility_ac';
    private $FACILITY_SWIMMINGPOOL = 'param_p_facility_swimmingpool';
    private $FACILITY_CARPORT = 'param_p_facility_carport';
    private $FACILITY_GARDEN = 'param_p_facility_garden';
    private $FACILITY_GARASI = 'param_p_facility_garasi';
    private $FACILITY_TELEPHONE = 'param_p_facility_telephone';
    private $FACILITY_PAM = 'param_p_facility_pam';
    private $FACILITY_WATERHEAT = 'param_p_facility_waterheater';
    private $FACILITY_REFRIGERATOR = 'param_p_facility_refrigerator';
    private $FACILITY_STOVE = 'param_p_facility_stove';
    private $FACILITY_MICROWAVE = 'param_p_facility_microwave';
    private $FACILITY_OVEN = 'param_p_facility_oven';
    private $FACILITY_FIREEXTENGUISHER = 'param_p_facility_fireextenguisher';
    private $FACILITY_GORDYN = 'param_p_facility_gordyn';
    private $ADDRESS = 'param_p_alamat';
    private $MIN_SALARY = 'param_salary_from';
    private $MAX_SALARY = 'param_salary_to';

    //confirmation pop up
    private $CONFIRMASTION_ADS = 'confirm_approve';
    private $CONFIRMATION_LANJUTKAN_LOGIN_BUTTON = 'confirm_approve';
    private $MODAL_LOGIN_FORM = 'modal_login_form';
    private $PASSWORD_LOGIN = 'ad_posting_password_field';
    private $SUBMIT_LOGIN = 'btn_submit_login';

    private $POP_UP_ERROR_TEXT = 'alert_info__text';

    public function __construct()
    {
        parent::__construct(Athena::browser(),'post-ads');
    }

    public function inputTitle($title){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ADS_TITLE);
        $element->thenFind()->asHtmlElement()->sendKeys($title);
    }

    private function verifyCategoryLevel1ShowUp(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->CATEGORY_DROPDOWN_UL_LEVEL1);
        $element->assertThat()->isDisplayed();
    }

    private function verifyCategoryLevel2ShowUp(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->CATEGORY_DROPDOWN_UL_LEVEL2);
        $element->assertThat()->isDisplayed();
    }

    private function verifyCategoryLevel3ShowUp(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->CATEGORY_DROPDOWN_UL_LEVEL3);
        $element->assertThat()->isDisplayed();
    }

    public function clickChooseCategoryButton(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->CATEGORY_BUTTON);
        $element->thenFind()->asHtmlElement()->click();
        $this->verifyCategoryLevel1ShowUp();
    }

    public function chooseCategoryLevel1($level1){
        $element_cat_level1 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->CATEGORY_DROPDOWN_UL_LEVEL1.'\']/li['.$level1.']/a');

        $element_cat_level1->thenFind()->asHtmlElement()->click();

        /*$element_cat_level1 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('.//*[text()=\''.$level1.'\']');*/

        $this->verifyCategoryLevel2ShowUp();
    }

    public function getTextFromChosenLevel1($index){
        $element_cat_level1 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->CATEGORY_DROPDOWN_UL_LEVEL1.'\']/li['.$index.']/a//p');
        return $element_cat_level1->thenFind()->asHtmlElement()->getText();
    }

    public function getTextFromChosenLevel2($index){
        $element_cat_level2 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->CATEGORY_DROPDOWN_UL_LEVEL2.'\']/li['.$index.']/a//p');
        return $element_cat_level2->thenFind()->asHtmlElement()->getText();
    }

    public function getTextFromChosenLevel3($index){
        $element_cat_level3 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->CATEGORY_DROPDOWN_UL_LEVEL3.'\']/li['.$index.']/a//p');
        return $element_cat_level3->thenFind()->asHtmlElement()->getText();

    }

    public function chooseCategoryLevel2($level2){
        /*$element_cat_level2 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('.//*[text()=\''.$level2.'\']');*/
        $element_cat_level2 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->CATEGORY_DROPDOWN_UL_LEVEL2.'\']/li['.$level2.']/a');
        $element_cat_level2->thenFind()->asHtmlElement()->click();
        $this->verifyCategoryLevel3ShowUp();
    }

    public function chooseCategoryLevel3($level3){
        /*$element_cat_level3 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('.//*[text()=\''.$level3.'\']');*/
        $element_cat_level3 = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->CATEGORY_DROPDOWN_UL_LEVEL3.'\']/li['.$level3.']/a');
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
            ->withXpath('//ul[@id=\''.$this->LOCATION_UL_REGION.'\']/li['.$index_region.']/a');

        $element_region->thenFind()->asHtmlElement()->click();
    }

    public function chooseCity($index_city){
        $element_city = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('//ul[@id=\''.$this->LOCATION_UL_CITIES.'\']/li['.$index_city.']/a');

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

        return new PostAdsConfirmation();
    }

    public function clickSubmitAdsNegative(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->BUTTON_SUBMIT);
        $element->thenFind()->asHtmlElement()->click();
    }

    public function verifyPostAdsPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->POST_ADS_CLASS,$this->getAttributeBodyPage());
    }

    public function errorNoTitleIsDisplayed(){
        try{
            $this->getBrowser()->getCurrentPage()->getElement()->withId($this->LABEL_ERROR_TITLE)
                ->assertThat()->isDisplayed();
            return true;
        }catch(\Exception $e){
            return false;
        }

    }

    public function errorNoCategoryIsDisplayed(){
        try{
            $this->getBrowser()->getCurrentPage()->getElement()->withId($this->LABEL_ERROR_CATEGORY)
                ->assertThat()->isDisplayed();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function errorNoCityIsDisplayed(){
        try{
            $this->getBrowser()->getCurrentPage()->getElement()->withId($this->LABEL_ERROR_CITY)
                ->assertThat()->isDisplayed();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function errorNoNameIsDisplayed(){
        try{
            $this->getBrowser()->getCurrentPage()->getElement()->withId($this->LABEL_ERROR_NAME)
                ->assertThat()->isDisplayed();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function errorNoEmailIsDisplayed(){
        try{
            $this->getBrowser()->getCurrentPage()->getElement()->withId($this->LABEL_ERROR_EMAIL)
                ->assertThat()->isDisplayed();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function errorNoHpNumberIsDisplayed(){
        try{
            $this->getBrowser()->getCurrentPage()->getElement()->withId($this->LABEL_ERROR_NOHP)
                ->assertThat()->isDisplayed();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function errorNoAgreementUserIsDisplayed(){
        try{
            $this->getBrowser()->getCurrentPage()->getElement()->withId($this->LABEL_ERROR_AGREEMENT_USER)
                ->assertThat()->isDisplayed();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    //extra field mobil-bekas
    private function selectTipeKendaraan($index){
        $select_tipe_kendaraan = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->SELECT_TIPE_KENDARAAN);
        $select_tipe_kendaraan->thenFind()->asDropDown()->selectByIndex($index);
    }

    private function selectTranmission($index){
        $select_tranmission = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->SELECT_TRANSMISI);
        $select_tranmission->thenFind()->asDropDown()->selectByIndex($index);
    }

    private function selectYear($value){
        $select_year = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->SELECT_YEARS);
        $select_year->thenFind()->asDropDown()->selectByValue($value);
    }

    private function inputPrice($price){
        $price_element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_price);
        $price_element->thenFind()->asHtmlElement()->sendKeys($price);
    }

    //extra field Apartment
    private function inputBuildingArea($area){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->BUILDING_AREA);
        $element->thenFind()->asHtmlElement()->sendKeys($area);
    }

    private function inputTotalFloor($int_floor){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->FLOOR);
        $element->thenFind()->asHtmlElement()->sendKeys($int_floor);
    }

    private function selectTotalBedRooms($total){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->SELECT_BEDROOM);
        $element->thenFind()->asDropDown()->selectByValue($total);
    }

    private function getRandomCertificate(){
        $values = array('shm-sertifikathakmilik','hgb-hakgunabangun','lainnyappjbgirikadatdll');
        $random = array_rand($values,1);
        return $random[0];
    }

    private function selectCertificate($value){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->SELECT_CERTIFICATE);
        $element->thenFind()->asDropDown()->selectByValue($value);
    }

    private function getElementFasilities($id){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($id);
    }

    private function thickFasilities($id){
        if(!$this->getElementFasilities($id)->thenFind()->asHtmlElement()->isSelected()){
            $this->getElementFasilities($id)->thenFind()->asHtmlElement()->click();
        }

    }

    private function inputAddress($address){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ADDRESS);
        $element->thenFind()->asHtmlElement()->sendKeys($address);
    }

    private function inputMinSalary($salary){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->MIN_SALARY);
        $element->thenFind()->asHtmlElement()->sendKeys($salary);
    }

    private function inputMaxSalary($salary){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->MAX_SALARY);
        $element->thenFind()->asHtmlElement()->sendKeys($salary);
    }

    private function getRandomValue($min,$max){
        return mt_rand($min,$max);
    }

    public function fillExtraFieldBasedOnCategory($level2){
        if($level2==='Mobil Bekas'){
            $this->inputPrice($this->getRandomValue(1,999999999));
            $this->selectTipeKendaraan(5);
            $this->selectTranmission(1);
            $this->selectYear($this->getRandomValue(1985,2016));
        }else if($level2=='Apartment'){
            $this->inputPrice($this->getRandomValue(1,9999999999));
            $this->inputBuildingArea($this->getRandomValue(1,9999));
            $this->inputTotalFloor($this->getRandomValue(1,1000));
            $this->selectTotalBedRooms(1,11);
            $this->selectCertificate($this->getRandomCertificate());

            //fasilities
            $this->thickFasilities($this->FACILITY_AC);
            $this->thickFasilities($this->FACILITY_CARPORT);
            $this->thickFasilities($this->FACILITY_FIREEXTENGUISHER);
            $this->thickFasilities($this->FACILITY_GARASI);
            $this->thickFasilities($this->FACILITY_GARDEN);
            $this->thickFasilities($this->FACILITY_GORDYN);
            $this->thickFasilities($this->FACILITY_MICROWAVE);
            $this->thickFasilities($this->FACILITY_OVEN);
            $this->thickFasilities($this->FACILITY_PAM);
            $this->thickFasilities($this->FACILITY_REFRIGERATOR);
            $this->thickFasilities($this->FACILITY_STOVE);
            $this->thickFasilities($this->FACILITY_SWIMMINGPOOL);
            $this->thickFasilities($this->FACILITY_TELEPHONE);
            $this->thickFasilities($this->FACILITY_WATERHEAT);

            $this->inputAddress('OLX testing - Menara Sentraya');
        }else if($level2==='Lowongan'){
            $this->inputMinSalary('500000');
            $this->inputMaxSalary('10000000000000');
        }

    }

    public function verifyConfirmationLoginShowUp(){
        $this->getBrowser()->getCurrentPage()->getElement()->withId($this->CONFIRMASTION_ADS)
            ->assertThat()->isDisplayed();

        $this->getBrowser()->getCurrentPage()->getElement()->withId($this->CONFIRMATION_LANJUTKAN_LOGIN_BUTTON)
            ->assertThat()->isDisplayed();
    }

    private function verifyLoginPopUpShowUp(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->MODAL_LOGIN_FORM);
        $element->assertThat()->isDisplayed();
    }

    public function clickConfirmToContinueWithLogin(){
        $this->getBrowser()->getCurrentPage()->getElement()->withId($this->CONFIRMATION_LANJUTKAN_LOGIN_BUTTON)
            ->thenFind()->asHtmlElement()->click();


        $this->verifyLoginPopUpShowUp();
    }


    public function inputPasswordLogin($value){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->PASSWORD_LOGIN);
        $element->thenFind()->asHtmlElement()->sendKeys($value);
    }

    public function clickSubmitLoginSuccess(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->SUBMIT_LOGIN);
        $element->thenFind()->asHtmlElement()->click();
        return new PostAdsConfirmation();
    }

    public function verifyError($errorExpected,$errorActual){
        \PHPUnit_Framework_Assert::assertEquals($errorExpected,$errorActual);
    }

    public function getPopUpError(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->POP_UP_ERROR_TEXT);
        return $element->thenFind()->asHtmlElement()->getText();
    }

    public function postAds($email,$phonenumber){
        $this->inputTitle('test post Ads oleh QA OLX');
        //select category
        $this->clickChooseCategoryButton();
        $this->chooseCategoryLevel1(1);
        $level2 = $this->getTextFromChosenLevel2(1);
        $this->chooseCategoryLevel2(1);
        $this->chooseCategoryLevel3(1);

        $this->fillExtraFieldBasedOnCategory($level2);
        $this->inputDescription('dnkjddkdbdkfbdfb djfdkfnkdnfd djfkndjfndjf bsdhbsbdsbd shjbsjhdbs dsbdsbds sdbskdbs sdb');

        //lokasi
        $this->clickChooseLocationButton();
        $this->chooseRegion(2);
        $this->chooseCity(2);

        $this->inputName('name name name name name');
        $this->inputEmail($email);
        $this->inputNoHp($phonenumber);
        $this->thickAgreementUser();
        $this->thickAcceptNewsLetter();

        /*
         And I fill title
    And I choose category "<level1>" "<level2>" "<level3>"
    And I fill all extra fields "<level2>"
    And I fill description
    And I upload photo
    And I choose location
    And I fill name
    And I fill existing email address
    And I fill Handphone number
    And I fill pin BB
    And I agree OLX can process my data
    And I want to accept newsletter
         */

    }



}