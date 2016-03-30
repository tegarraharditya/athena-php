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
        $this->listings=new Listings(Athena::browser());
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
     * @Then /^I can see Iklan Promosi$/
     */
    public function iCanSeeIklanPromosi()
    {
        $this->listings->verifyIklanPromosiSection();
    }

    /**
     * @Given /^I can see Iklan lainnya$/
     */
    public function iCanSeeIklanLainnya()
    {
        $this->listings->verifyIklanLainnyaSection();
    }

    /**
     * @Then /^I can see Listings with Yellow Background on Top section$/
     */
    public function iCanSeeListingsWithYellowBackgroundOnTopSection()
    {
        echo 'hello';
    }

    /**
     * @Then /^I can see Istimewa Label in Iklan Promosi Section$/
     */
    public function iCanSeeIstimewaLabelInIklanPromosiSection()
    {
        $this->listings->verifyIstimewaLabelOnlyInIklanPromosiSection();
    }

    /**
     * @Given /^I can see Top Listings$/
     */
    public function iCanSeeTopListings()
    {
        echo 'hello';
    }
}