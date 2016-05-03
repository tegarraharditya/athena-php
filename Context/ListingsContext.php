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
use Tests\Helper\LeanTestingHookTrait;
use Tests\Pages\bdd\Listings;
use Tests\Pages\bdd\ListingsDetails;

class ListingsContext extends BaseContext
{
    /**
     * @var Listings
     */
    private $listings;
    private $categoryLevel2Name;
    private $categoryLevel3Name;

    /**
     * @var ListingsDetails
     */
    private $listingsDetails;
    public function __construct()
    {
        $this->listings=new Listings('games-console');
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
        $this->categoryLevel2Name = $this->listings->getTextCategoryLevel2($level2);
        $this->listings->chooseCategoryLevel2($level2);
    }

    /**
     * @When /^I click sub\-category level3 (.*)$/
     */
    public function iClickSubCategoryLevel3($level3)
    {
        $this->categoryLevel3Name = $this->listings->getTextCategoryLevel3($level3);
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
        //$this->listings->verifySortedTermurahOnTopListings();
        $this->listings->verifySortedTermurahOnListings();
    }

    /**
     * @Then /^I can see proper result from (.*) and (.*)$/
     */
    public function iCanSeeProperResultFromAnd($level2, $level3)
    {
        $this->listings->verifySubCategoryListings($this->categoryLevel2Name,$this->categoryLevel3Name);
    }

    /**
     * @When /^I click Iklan Terbaru$/
     */
    public function iClickIklanTerbaru()
    {
        $this->listings->chooseSorting('terbaru');
    }

    /**
     * @Then /^I can verify that it's sorted by the newest$/
     */
    public function iCanVerifyThatItSSortedByTheNewest()
    {
        $this->listings->verifySortedTheNewestOnListings();
    }

    /**
     * @Given /^I am in Listings page level1$/
     */
    public function iAmInListingsPageLevel1()
    {
        $this->listings->getBrowser()->get('mobil');
    }

    /**
     * @Given /^I click sub\-category level1 (.*)$/
     */
    public function iClickSubCategoryLevel1($level1)
    {
        throw new PendingException();
    }

    /**
     * @When /^I click Baru$/
     */
    public function iClickBaru()
    {
        $this->listings->chooseConditionBaru();
    }

    /**
     * @Then /^I can verify that condition of product is new$/
     */
    public function iCanVerifyThatConditionOfProductIsNew()
    {
        $this->listings->verifyConditionListings('baru');
    }

    /**
     * @When /^I click Bekas$/
     */
    public function iClickBekas()
    {
        $this->listings->chooseConditionBekas();
    }

    /**
     * @Then /^I can verify that condition of product is used$/
     */
    public function iCanVerifyThatConditionOfProductIsUsed()
    {
        $this->listings->verifyConditionListings('bekas');
    }


}