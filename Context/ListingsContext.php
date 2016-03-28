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
use Tests\Page\Listings;

class ListingsContext extends BaseContext
{
    /**
     * @var Listings
     */
    private $listings;
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
     * @Then /^I can verify that there's promotion banner on bottom page$/
     */
    public function iCanVerifyThatThereSPromotionBannerOnBottomPage()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I go to (.*) page$/
     */
    public function iAmInPage($category)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I can see listings based on (.*)$/
     */
    public function iCanSeeListingsBasedOn($category)
    {
        throw new PendingException();
    }

    /**
     * @When /^I click ads$/
     */
    public function iClickAds()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I am in Listings Details page$/
     */
    public function iAmInListingsDetailsPage()
    {
        throw new PendingException();
    }
}