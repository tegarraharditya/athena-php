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
        $this->listings->setCurrentListingList('games-console');
    }

    /**
     * @Given /^I am in Listings page$/
     */
    public function iAmInListingsPage()
    {
        //$this->listings->setCurrentListingList('games-console');
        $this->listings->open(true);
        //var_dump('title: '.$this->listings->getCurrentListingsLink());

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
        throw new PendingException();
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
}