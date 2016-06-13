<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/8/16
 * Time: 10:07 AM
 */

namespace Tests\Pages\bdd;


use Athena\Athena;
use Athena\Browser\Page\Find\Assertion\ElementExistsAtLeastOnceAssertion;
use Athena\Tests\Browser\Page\Find\Assertion\ElementExistsAtLeastOnceAssertionTest;
use Athena\Tests\Browser\Page\Find\Assertion\ElementValueEqualsAssertionTest;
use Behat\Behat\Tester\Exception\PendingException;
use Facebook\WebDriver\WebDriverKeys;

class Listings extends OneWeb
{
    private $ALL_CATEGORY = 'listing';
    private $MOBIL_MOBIL_BEKAS ='listing';
    private $MOBIL_AKSESORIS_MOBIL = 'listing';
    private $MOBIL_AUDIO_MOBIL = 'listing';
    private $MOBIL_SPAREPART = 'listing';
    private $MOBIL_VELG_AND_BAN = 'listing';

    private $MOTOR_MOTOR_BEKAS = 'listing';
    private $MOTOR_AKSESORIS = 'listing';
    private $MOTOR_HELM = 'listing';
    private $MOTOR_SPAREPART = 'listing';

    private $PROPERTY_RUMAH = 'listing';
    private $PROPERTY_APARTMENT = 'listing';
    private $PROPERTY_INDEKOS = 'listing';
    private $PROPERTY_BANGUNAN_KOMERSIL = 'listing';
    private $PROPERTY_TANAH = 'listing';
    private $PROPERTY_LAINNYA = 'listing';

    private $PRIBADI_FASHION_WANITA = 'listing';
    private $PRIBADI_FASHION_PRIA = 'listing';
    private $PRIBADI_JAM_TANGAN = 'listing';
    private $PRIBADI_PAKAIAN_OR = 'listing';
    private $PRIBADI_PERHIASAN = 'listing';
    private $PRIBADI_MAKEUP_PARFUME = 'listing';
    private $PRIBADI_TERAPI_PENGOBATAN = 'listing';
    private $PRIBADI_PERAWATAN = 'listing';
    private $PRIBADI_NUTRISI_SUPLEMEN = 'listing';
    private $PRIBADI_LAINNYA = 'listing';

    private $ENG_HANDPHONE = 'listing';
    private $ENG_TABLET = 'listing';
    private $ENG_AKSESORIS_HP_TABLET = 'listing';
    private $ENG_FOTOGRAFI = 'listing';
    private $ENG_RUMAH_TANGGA = 'listing';
    private $ENG_GAMES_CONSOLE = 'listing';
    private $ENG_KOMPUTER = 'listing';
    private $ENG_LAMPU = 'listing';
    private $ENG_TV_AUDIO_VIDEO = 'listing';

    private $HO_ALAT_MUSIK = 'listing';
    private $HO_OLAHRAGA = 'listing';
    private $HO_SEPEDA_AKSESORIS = 'listing';
    private $HO_HANDICRAFTS = 'listing';
    private $HO_BARANG_ANTIK = 'listing';
    private $HO_BUKU_MAJALAH = 'listing';
    private $HO_KOLEKSI = 'listing';
    private $HO_MAINAN_HOBI = 'listing';
    private $HO_MUSIK_FILM = 'listing';
    private $HO_HEWAN_PELIHARAAN = 'listing';

    private $RT_MAKANAN_MINUMAN = 'listing';
    private $RT_FURNITURE = 'listing';
    private $RT_DEKORASI_RUMAH = 'listing';
    private $RT_KONSTRUKSI_TAMAN = 'listing';
    private $RT_JAM = 'listing';
    private $RT_LAMPU = 'listing';
    private $RT_PERLENGKAPAN_RUMAH = 'listing';
    private $RT_LAINNYA = 'listing';

    private $PBA_PAKAIAN = 'listing';
    private $PBA_PERLENGKAPAN_BAYI = 'listing';
    private $PBA_PERLENGKAPAN_IBU_BAYI = 'listing';
    private $PBA_BONEKA_MAINAN_ANAK = 'listing';
    private $PBA_BUKU_ANAK = 'listing';
    private $PBA_STROLLER = 'listing';
    private $PBA_LAINNYA = 'listing';

    private $KI_PERALATAN_KANTOR = 'listing';
    private $KI_PERLENGKAPAN_USAHA = 'listing';
    private $KI_MESIN_KEPERLUAN_INDUSTRI = 'listing';
    private $KI_STATIONARY = 'listing';
    private $KI_LAINNYA = 'listing';

    private $LOKER_CARI_PEKERJAAN = 'listing';
    private $LOKER_JASA = 'listing';

    private $XPATH_PAGING_BAR = "//*[@id='page_nav_pagination']li";
    private $XPATH_ALL_TOP_LISTINGS = '//*[@id=\'js-ad-promotion-group\']/article';
    private $XPATH_ALL_TOP_LISTINGS_PRICE = './/*[@id=\'js-ad-promotion-group\']//span[contains(text(),\'Rp\')]';
    private $XPATH_ALL_LISTINGS_PRICE = './/*[@id=\'js-ad-listing-group\']//span[contains(text(),\'Rp\')]';
    private $NEXT_PAGE = 'Next';
    private $PREV_PAGE = 'Previous';
    private $ID_IKLAN_PROMOSI = 'js-ad-promotion-group';
    private $ID_IKLAN_LAINNYA = 'js-ad-listing-group';
    private $XPATH_IKLAN_LAINNYA_ARTICLE = './/*[@id=\'js-ad-promotion-group\']/article';
    private $XPATH_LABEL_ISTIMEWA_IN_IKLAN_PROMOSI = './/*[@id=\'js-ad-promotion-group\']//*[text()=\'ISTIMEWAA\']';
    private $ID_SUB_CATEGORY_BUTTON = 'btn_filter__modal_l3';
    private $ID_UBAH_URUTAN_BUTTON = 'btn_filter__modal_sort';
    private $ID_FILTER_NEW = 'ads-filter-condition-new';
    private $ID_FILTER_USED = 'ads-filter-condition-old';
    private $ID_SORT_PRICE_MOST_EXPENSIVE_BUTTON = 'ads-sort-by-price-desc';
    private $ID_SORT_PRICE_CHEAPEST_BUTTON = 'ads-sort-by-price-asc';
    private $ID_SORT_THE_NEWEST_BUTTON = 'ads-sort-by-none';
    private $ID_PILIH_KONDISI_BUTTON = 'btn_filter__modal_condition';
    private $ID_POPUP_CHOOSE_SUBCAT_LEVEL1 = 'modal-inner-category-l1';
    private $ID_POPUP_CHOOSE_SUBCAT_LEVEL2 = 'modal-inner-category-l2';
    private $ID_POPUP_CHOOSE_SUBCAT_LEVEL3 = 'modal-inner-category-l3';

    private $CLASS_TOP_LISTINGS = 'ad-listing__promoted-0';
    private $CLASS_BADGED_LISTINGS = 'ad-listing__promoted-1';
    private $CLASS_HIGHLIGHTED_LISTINGS = 'ad-listing__promoted-2';


    /**
     * @var String
     */
    private $listingsLink;

    /**
     * Listings constructor.
     * @param string $page
     */
    public function __construct($page)
    {
        parent::__construct(Athena::browser(),$page);
    }

    private function getElementIklanPromosiSection(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_IKLAN_PROMOSI);
    }

    private function getElementIklanLainnyaSection(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_IKLAN_LAINNYA);
    }

    private function getElementPage($page){
        return $this->getBrowser()->getCurrentPage()->getElement()->withLinkText($page);
    }

    protected function getElementListingsIndex($index){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('.//*[@id=\'js-ad-listing-group\']/article['.$index.']//div/a');
    }

    private function getElementNextPage(){
        return $this->getElementWithOther('aria-label',$this->NEXT_PAGE);
    }

    /**
     * @param $xpath
     * @return \Facebook\WebDriver\Remote\RemoteWebElement[]
     */
    private function getListElementByXpath($xpath){
        return $elements=$this->getBrowser()->getCurrentPage()->find()->elementsWithXpath($xpath);
    }

    private function getElementPrevPage()
    {
        return $this->getElementWithOther('aria-label', $this->PREV_PAGE);
    }

    private function getTotalElementByXpath($xpath){
        $elements=$this->getBrowser()->getCurrentPage()->find()->elementsWithXpath($xpath);
        return $total = count($elements);
    }

    private function getElementPilihSubCategory(){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withId($this->ID_SUB_CATEGORY_BUTTON);
    }

    private function getElementUbahUrutan(){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withId($this->ID_UBAH_URUTAN_BUTTON);
    }

    private function getElementPilihKondisi(){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withId($this->ID_PILIH_KONDISI_BUTTON);
    }

    private function getElementPopUpSubCategoryLevel1(){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withId($this->ID_POPUP_CHOOSE_SUBCAT_LEVEL1);
    }

    private function getElementPopUpSubCategoryLevel2(){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withId($this->ID_POPUP_CHOOSE_SUBCAT_LEVEL2);
    }

    private function getElementPopUpSubCategoryLevel3(){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withId($this->ID_POPUP_CHOOSE_SUBCAT_LEVEL3);
    }

    private function getElementsAllTopListings(){
        return $this->getBrowser()->getCurrentPage()->find()->elementsWithXpath($this->XPATH_ALL_TOP_LISTINGS);
    }

    private function getArrayTimeStampListings(){
        $elements = $this->getBrowser()->getCurrentPage()->find()->elementsWithXpath($this->XPATH_IKLAN_LAINNYA_ARTICLE);
        $elements_timestamp = [];
        foreach($elements as $element){
            $time = $element->getAttribute('data-created-time');
            if($time==''){\PHPUnit_Framework_Assert::fail('timestamp is empty');}
            $elements_timestamp[] = array($time);
        }
        return $elements_timestamp;
    }

    public function getTextActiveBreadcrumb(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withCss('li.breadcrumb-item.is-active');
        return $element->thenFind()->asHtmlElement()->getText();
    }

    public function clickPilihSubCategory(){
        $this->getElementPilihSubCategory()->thenFind()->asHtmlElement()->click();
    }

    public function chooseCategoryLevel1($category){
        $this->getElementPopUpSubCategoryLevel1()->assertThat()->isDisplayed();

        $element = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('.//*[@data-cat-name=\''.$category.'\']');

        $element->thenFind()->asHtmlElement()->click();
    }

    public function chooseCategoryLevel2($category){
        $this->getElementPopUpSubCategoryLevel2()->assertThat()->isDisplayed();

        $element = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('.//*[@data-cat-name=\''.$category.'\']');

        $element->thenFind()->asHtmlElement()->click();
    }

    public function getTextCategoryLevel2($level2){
        $element = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('.//*[@data-cat-name=\''.$level2.'\']//p');
        return $element->thenFind()->asHtmlElement()->getText();
    }

    public function chooseCategoryLevel3($category){
        $this->getElementPopUpSubCategoryLevel3()->assertThat()->isDisplayed();

        $element = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('.//*[@data-cat-name=\''.$category.'\']');

        $element->thenFind()->asHtmlElement()->click();
    }

    public function getTextCategoryLevel3($level3){
        $element = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('.//*[@data-cat-name=\''.$level3.'\']//p');

        return $element->thenFind()->asHtmlElement()->getText();
    }

    public function verifyConditionListings($condition){
        $elements = $this->getBrowser()->getCurrentPage()->find()->elementsWithXpath('//*[@class=\'meta-condition\']');

        foreach($elements as $element){
            $condition_actual = $element->getText();
            if(!strcmp($condition_actual,$condition)==0){
                \PHPUnit_Framework_Assert::fail('Condition actual : '.$condition_actual.'. Condition Expected : '.$condition);
            }
        }
    }

    public function clickUbahUrutan(){
        $this->getElementUbahUrutan()->thenFind()->asHtmlElement()->click();
        //throw new PendingException();//wait pop up sub-category
    }

    public function clickPilihKondisi(){
        $this->getElementPilihKondisi()->thenFind()->asHtmlElement()->click();
        //throw new PendingException();//wait pop up pilih kondisi
    }

    public function chooseSorting($key){
        if(strcasecmp($key,'termahal')==0){
            $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_SORT_PRICE_MOST_EXPENSIVE_BUTTON)
                ->thenFind()->asHtmlElement()->click();
        }else if (strcasecmp($key,'termurah')==0){
            $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_SORT_PRICE_CHEAPEST_BUTTON)
                ->thenFind()->asHtmlElement()->click();
        }else if (strcasecmp($key,'terbaru')==0) {
            $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_SORT_THE_NEWEST_BUTTON)
                ->thenFind()->asHtmlElement()->click();
        }else{
            \PHPUnit_Framework_Assert::fail('key '.$key.'is undefined');
        }
    }

    private function getArrayPriceWihXpath($xpath){
        $elements = $this->getBrowser()->getCurrentPage()->find()->elementsWithXpath($xpath);
        $elements_price = [];
        foreach($elements as $element){
            $price = str_replace('Rp ','',$element->getText());
            $price_final = str_replace('.','',$price);
            if($price_final==''){
                \PHPUnit_Framework_Assert::fail('price is empty');
            }
            $elements_price[] = array($price_final);
        }
        return $elements_price;
    }

    public function isSortedDesc($array){
        $prices_top = $array;
        return rsort($prices_top,SORT_NUMERIC);
    }

    public function isSortedAsc($array){
        $prices_top = $array;
        return sort($prices_top,SORT_NUMERIC);
    }

    public function verifySortedTermahalOnTopListings(){
        $elements = $this->getArrayPriceWihXpath($this->XPATH_ALL_TOP_LISTINGS_PRICE);
        $result = $this->isSortedDesc($elements);

        if(!$result){
            \PHPUnit_Framework_Assert::fail('Top Listings is not sorted by the most expensive');
        }
    }

    public function verifySortedTermahalOnListings(){
        $elements = $this->getArrayPriceWihXpath($this->XPATH_ALL_LISTINGS_PRICE);
        $result = $this->isSortedDesc($elements);

        if(!$result){
            \PHPUnit_Framework_Assert::fail('Regular Listings is not sorted by the most expensive');
        }
    }

    public function verifySortedTermurahOnTopListings(){
        $elements = $this->getArrayPriceWihXpath($this->XPATH_ALL_TOP_LISTINGS_PRICE);

        $result = $this->isSortedAsc($elements);
        if(!$result){
            \PHPUnit_Framework_Assert::fail('Top Listings is not sorted by the cheapest');
        }
    }

    public function verifySortedTermurahOnListings(){
        $elements = $this->getArrayPriceWihXpath($this->XPATH_ALL_LISTINGS_PRICE);

        $result = $this->isSortedAsc($elements);
        if(!$result){
            \PHPUnit_Framework_Assert::fail('Regular Listings is not sorted by the cheapest');
        }
    }

    public function verifySubCategoryListings($level2Name,$level3Name){

        $breadcrumb = $this->getTextActiveBreadcrumb();
        if(!strcmp($breadcrumb,$level2Name)==0){
            \PHPUnit_Framework_Assert::fail('Breadcrumb active expected : '.$level2Name.'. Actual : '.$breadcrumb);
        }

        $listingsdetails = $this->clickListingsIndex1();

        $category_level3 = $listingsdetails->getTextCategoryName();

        if(!strcmp($category_level3,$level3Name)==0){
            \PHPUnit_Framework_Assert::fail('category Expected : '.$level3Name.'. Category Actual : '.$category_level3);
        }
    }

    public function verifySortedTheNewestOnListings(){
        $array_time = $this->getArrayTimeStampListings();
        $result = $this->isSortedDesc($array_time);

        if(!$result){
            \PHPUnit_Framework_Assert::fail('Listings is not sorted by the newest');
        }
    }

    public function chooseConditionBaru(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_FILTER_NEW);
        $element->thenFind()->asHtmlElement()->click();
    }

    public function chooseConditionBekas(){
        $element = $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_FILTER_USED);
        $element->thenFind()->asHtmlElement()->click();
    }


    public function getCurrentListingsLink(){
        return $this->listingsLink;
    }

    public function setCurrentListingList($category){
        $this->listingsLink=$category;
    }

    public function clickPage($page){
        $this->getElementPage($page)->thenFind()->asHtmlElement()->click();
    }

    public function clickNextPage(){
        $this->getElementNextPage()->thenFind()->asHtmlElement()->click();
    }

    public function clickPrevPage(){
        $this->getElementPrevPage()->thenFind()->asHtmlElement()->click();
    }

    public function clickListingsIndex1(){
        $this->getElementListingsIndex(1)->thenFind()->asHtmlElement()->click();
        return new ListingsDetails();
    }

    public function verifyIklanPromosiSection(){
        $this->getElementIklanPromosiSection()->assertThat()->isDisplayed();
    }

    public function verifyOnlyTopListingsOnIklanPromosiSection(){
        $elements = $this->getElementsAllTopListings();

        foreach($elements as $element){
            $value=$element->getAttribute('class');
            if(strpos($value,$this->CLASS_TOP_LISTINGS)===false){
                \PHPUnit_Framework_Assert::fail('It should not be on top listings section');
            }
        }
    }

    public function verifyIklanLainnyaSection(){
        $this->getElementIklanLainnyaSection()->assertThat()->isDisplayed();
    }

    public function verifyAtLeastOneListingsWithYellowBackgroundInThisPage(){
        $elements = $this->getBrowser()->getCurrentPage()->find()->elementsWithXpath(
            '//*[contains(@class,\''.$this->CLASS_HIGHLIGHTED_LISTINGS.'\')]');

        if(!count($elements)>0){
            \PHPUnit_Framework_Assert::fail('No Yellow Background Listings. Please check manually');
        }
    }

    public function verifyAtLeastOneListingsWithIstimewaLabelInThisPage(){
        $elements = $this->getBrowser()->getCurrentPage()->find()->elementsWithXpath(
            '//*[contains(@class,\''.$this->CLASS_BADGED_LISTINGS.'\')]');

        if(!count($elements)>0){
            \PHPUnit_Framework_Assert::fail('No \'Istimewa\' listings. Please check manually');
        }

    }

    private function getAllAdsWithImageStyle(){
        $all_elements = $this->getListElementByXpath('.//*[@id=\'js-ad-listing-group\']//header/a[contains(@style,\'background-image\')]');
        return $all_elements;
    }

    private function getAllAdsWithImage(){
        $all_elements = $this->getListElementByXpath('.//*[@id=\'js-ad-listing-group\']//header/a/img');
        return $all_elements;
    }

    public function clickRandomAdsWithImage(){
        //check listings ada image
        $elements_has_image = $this->getAllAdsWithImage();
        if(count($elements_has_image)==0){
            \PHPUnit_Framework_Assert::fail('No listings has image. Please choose another category');
        }

        //check listings ada style
        $elements_has_style = $this->getAllAdsWithImageStyle();
        $count_elements_style = count($elements_has_style);
        if($count_elements_style==0){
            \PHPUnit_Framework_Assert::fail('Background size can not be found');
        }else{
            $rand_ = rand(0,($count_elements_style-1));

            $element = $elements_has_style[$rand_];
            $element->click();

            return new ListingsDetails();
        }
    }

    public function verifyListingsImageHasContainAsBackgroundSize(){
        $elements_has_image = $this->getAllAdsWithImage();
        if(count($elements_has_image)==0){
            \PHPUnit_Framework_Assert::fail('No listings has image. Please choose another category');
        }
        $elements_has_style = $this->getAllAdsWithImageStyle();
        $count_elements_style = count($elements_has_style);
        if($count_elements_style==0){
            \PHPUnit_Framework_Assert::fail('Background size can not be found');
        }
    }

    public function verifyListingsHasNoConditionFilter(){

    }

    public function verifyAllCategory(){
        \PHPUnit_Framework_Assert::assertEquals($this->ALL_CATEGORY,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Mobil_MobilBekas(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOBIL_MOBIL_BEKAS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Mobil_AksesorisMobil(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOBIL_AKSESORIS_MOBIL,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Mobil_AudioMobil(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOBIL_AUDIO_MOBIL,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Mobil_Sparepart(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOBIL_SPAREPART,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Mobil_VelgAndBan(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOBIL_VELG_AND_BAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Motor_MotorBekas(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOTOR_MOTOR_BEKAS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Motor_Aksesoris(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOTOR_AKSESORIS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Motor_Helm(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOTOR_HELM,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Motor_SparePart(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOTOR_SPAREPART,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_Rumah(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_RUMAH,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_Apartment(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_APARTMENT,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_Indekos(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_INDEKOS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_BangunanKomersil(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_BANGUNAN_KOMERSIL,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_Tanah(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_TANAH,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_Lainnya(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_LAINNYA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_FashionWanita(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_FASHION_WANITA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_FashionPria(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_FASHION_PRIA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_JamTangan(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_JAM_TANGAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_PakaianOR(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_PAKAIAN_OR,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_Perhiasan(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_PERHIASAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_MakeUp_Parfume(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_MAKEUP_PARFUME,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_Terapi_Pengobatan(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_TERAPI_PENGOBATAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_Perawatan(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_PERAWATAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_Nutrisi_Suplemen(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_NUTRISI_SUPLEMEN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_Lainnya(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_LAINNYA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Handphone(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_HANDPHONE,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Tablet(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_TABLET,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Aksesoris_HP_Tablet(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_AKSESORIS_HP_TABLET,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Fotografi(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_FOTOGRAFI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_RumahTangga(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_RUMAH_TANGGA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Games_Console(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_GAMES_CONSOLE,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Komputer(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_KOMPUTER,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Lampu(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_LAMPU,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_TV_Audio_Video(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_TV_AUDIO_VIDEO,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_Alatmusik(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_ALAT_MUSIK,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_Olahraga(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_OLAHRAGA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_SepedaAksesoris(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_SEPEDA_AKSESORIS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_Handicrafts(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_HANDICRAFTS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_BarangAntik(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_BARANG_ANTIK,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_BukuMajalah(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_BUKU_MAJALAH,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_Koleksi(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_KOLEKSI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_MainanHobi(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_MAINAN_HOBI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_MusikFilm(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_MUSIK_FILM,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_HewanPeliharaan(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_HEWAN_PELIHARAAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_MakananMinuman(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_MAKANAN_MINUMAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_Furniture(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_FURNITURE,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_DekorasiRumah(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_DEKORASI_RUMAH,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_KontruksiTaman(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_KONSTRUKSI_TAMAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_Jam(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_JAM,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_Lampu(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_LAMPU,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_PerlengkapanRumah(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_PERLENGKAPAN_RUMAH,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_Lainnya(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_LAINNYA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_KI_PeralatanKantor(){
        \PHPUnit_Framework_Assert::assertEquals($this->KI_PERALATAN_KANTOR,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_KI_PerlengkapanUsaha(){
        \PHPUnit_Framework_Assert::assertEquals($this->KI_PERLENGKAPAN_USAHA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_KI_MesinKeperluanIndustri(){
        \PHPUnit_Framework_Assert::assertEquals($this->KI_MESIN_KEPERLUAN_INDUSTRI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_KI_Stationary(){
        \PHPUnit_Framework_Assert::assertEquals($this->KI_STATIONARY,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_KI_Lainnya(){
        \PHPUnit_Framework_Assert::assertEquals($this->KI_LAINNYA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Loker_Lowongan(){
        \PHPUnit_Framework_Assert::assertEquals($this->LOKER_LOWONGAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Loker_CariPekerjaan(){
        \PHPUnit_Framework_Assert::assertEquals($this->LOKER_CARI_PEKERJAAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Loker_Jasa(){
        \PHPUnit_Framework_Assert::assertEquals($this->LOKER_JASA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_Pakaian(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_PAKAIAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_PerlengkapanBayi(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_PERLENGKAPAN_BAYI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_PerlengkapanIbuBayi(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_PERLENGKAPAN_IBU_BAYI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_BonekaMainanAnak(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_BONEKA_MAINAN_ANAK,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_BukuAnak(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_BUKU_ANAK,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_Stroller(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_STROLLER,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_Lainnya(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_LAINNYA,$this->getAttributeBodyPage());
    }
}