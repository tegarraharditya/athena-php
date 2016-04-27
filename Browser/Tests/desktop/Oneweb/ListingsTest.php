<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/21/16
 * Time: 12:40 PM
 */

namespace Tests\Browser\Tests\desktop\Oneweb;


use Athena\Test\AthenaBrowserTestCase;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\bdd\Listings;

class ListingsTest extends AthenaBrowserTestCase
{
    public function testListings_ClickNextPrevPage_ListingsPageAppear(){
        $listings = new Listings('mobile-bekas');
        $listings->open(true);
        $listings->clickNextPage();
        $listings->verifyCategoryPage_Mobil_MobilBekas();
        $listings->clickPrevPage();
        $listings->verifyCategoryPage_Mobil_MobilBekas();
    }

    public function testListings_VerifySpecialListings_Veirified(){
        $listings = new Listings('mobile-bekas');
        $listings->open(true);
        $listings->verifyIklanPromosiSection();
        $listings->verifyOnlyTopListingsOnIklanPromosiSection();
        $listings->verifyIklanLainnyaSection();
        $listings->verifyAtLeastOneListingsWithIstimewaLabelInThisPage();
        $listings->verifyAtLeastOneListingsWithYellowBackgroundInThisPage();
    }

    public function testClickOneListings_RedirectToListingDetailsPage(){
        $listings = new Listings('mobile-bekas');
        $listings->open(true);
        $listings_details = $listings->clickListingsIndex1();
        $listings_details->verifyAttributeClassBody();
    }

    public function testFilterBySubCategory_FromSubCategoryLevel1_ViewListingsPerSubCategory(){
        $listings = new Listings('electronic-gadget');
        $listings->open(true);

        $listings->clickPilihSubCategory();

        $listings->chooseCategoryLevel1(\DataCatName::ID_ENG);
        $listings->chooseCategoryLevel2(\DataCatName::ID_ENG_HANDPHONE);
        $listings->chooseCategoryLevel3('');
    }

    public function testSortListings_ByMostExpensivePrice_SortedByTheMostExpensive(){
        $listings = new Listings('electronic-gadget');
        $listings->open(true);
        $listings->clickUbahUrutan();
        $listings->chooseSorting('termahal');
        $listings->verifySortedTermahalOnListings();
    }

    public function testSortListings_ByTheCheapest_SortedByTheCheapest(){
        $listings = new Listings('electronic-gadget');
        $listings->open(true);
        $listings->clickUbahUrutan();
        $listings->chooseSorting('termurah');
        $listings->verifySortedTermurahOnListings();
    }

    public function testSortListings_ByTheNewest_SortedByTheNewest(){
        $listings = new Listings('electronic-gadget');
        $listings->open(true);
        $listings->clickUbahUrutan();
        $listings->chooseSorting('terbaru');
        $listings->verifySortedTheNewestOnListings();
    }

    public function testFilterCondition_OnlyNew_ShowOnlyNewProduct(){

    }

    public function testFilterCondition_OnlySecondHand_ShowOnlySecondHandProduct(){

    }

}