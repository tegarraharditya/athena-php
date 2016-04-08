<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/17/16
 * Time: 9:18 AM
 */

namespace Tests\Context;


use Athena\Athena;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\bdd\Listings;
use Tests\Pages\bdd\ListingsDetails;

class ListingsContext extends BaseContext
{
    /**
     * @var Listings
     */
    private $listings;

    /**
     * @var ListingsDetails
     */
    private $listingsDetails;
    public function __construct()
    {
        $this->listings=new Listings();
        //$this->listings->setCurrentListingList('games-console');

    }

    /**
     * @Given /^I am in a Listings page$/
     */
    public function iAmInListingsPage()
    {
        $this->listings->open(true);
        $this->listings->verifyCategoryPage_ENG_Games_Console();

    }

    /**
     * @When /^I click next page$/
     */
    public function iClickNextPage()
    {
        $this->listings->clickNextPage();
    }

    /**
     * @Then /^I can see Ads Listings in page$/
     */
    public function iCanSeeAdsListingsInPage()
    {
        $this->listings->verifyCategoryPage_ENG_Games_Console();
    }

    /**
     * @When /^I click prev button$/
     */
    public function iClickPrevButton()
    {
        $this->listings->clickPrevPage();
    }

    /**
     * @When /^I click ads$/
     */
    public function iClickAds()
    {
        $this->listingsDetails=$this->listings->clickListingsIndex1();
    }

    /**
     * @Then /^I am in Listings Details page$/
     */
    public function iAmInListingsDetailsPage()
    {
        $this->listingsDetails->verifyAttributeClassBody();
    }

    /**
     * @When /^I click pilih sub\-categoty button$/
     */
    public function iClickPilihSubCategotyButton()
    {
        $this->listings->clickPilihSubCategory();
    }

    /**
     * @When /^I click ubah urutan button$/
     */
    public function iClickUbahUrutanButton()
    {
        $this->listings->clickUbahUrutan();
    }

    /**
     * @When /^I click Pilih Kondisi button$/
     */
    public function iClickPilihKondisiButton()
    {
        $this->listings->clickPilihKondisi();
    }

    /**
     * @Then /^I can see Iklan Promosi Section$/
     */
    public function iCanSeeIklanPromosiSection()
    {
        $this->listings->verifyIklanPromosiSection();
    }

    /**
     * @Given /^I can verify only top listings on Iklan Promosi section$/
     */
    public function iCanVerifyOnlyTopListingsOnIklanPromosiSection()
    {
        $this->listings->verifyOnlyTopListingsOnIklanPromosiSection();
    }

    /**
     * @Given /^I can see Iklan Lainnya section$/
     */
    public function iCanSeeIklanLainnyaSection()
    {
        $this->listings->verifyIklanLainnyaSection();
    }

    /**
     * @Given /^I can verify listing with yellow background$/
     */
    public function iCanVerifyListingWithYellowBackground()
    {
        $this->listings->verifyAtLeastOneListingsWithYellowBackgroundInThisPage();
    }

    /**
     * @Given /^I can verify listing with Istimewa label$/
     */
    public function iCanVerifyListingWithIstimewaLabel()
    {
        $this->listings->verifyAtLeastOneListingsWithIstimewaLabelInThisPage();
    }

    /**
     * @When /^I click sub\-category level2 (.*)$/
     */
    public function iClickSubCategoryLevel($level2)
    {
        $this->listings->chooseCategoryLevel2($level2);
    }

    /**
     * @When /^I click sub\-category level3 (.*)$/
     */
    public function iClickSubCategoryLevel1($level3)
    {
        $this->listings->chooseCategoryLevel3($level3);
    }

    /**
     * @When /^I click Iklan Termahal$/
     */
    public function iClickIklanTermahal()
    {
        $this->listings->chooseSorting('termahal');
    }

    /**
     * @Then /^I can verify that it's sorted by the most expensive listings$/
     */
    public function iCanVerifyThatItSSortedByTheMostExpensiveListings()
    {
        $this->listings->verifySortedTermahalOnTopListings();
        $this->listings->verifySortedTermahalOnListings();
    }

    /**
     * @When /^I click Iklan Termurah$/
     */
    public function iClickIklanTermurah()
    {
        $this->listings->chooseSorting('termurah');
    }

    /**
     * @Then /^I can verify that it's sorted by the cheapest$/
     */
    public function iCanVerifyThatItSSortedByTheCheapest()
    {
        $this->listings->verifySortedTermurahOnTopListings();
        $this->listings->verifySortedTermurahOnListings();
    }


}