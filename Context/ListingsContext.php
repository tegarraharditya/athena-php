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
    }

    /**
     * @Given /^I am in Listings page$/
     */
    public function iAmInListingsPage()
    {
        $this->listings->open(true);
    }

    /**
     * @When /^I click next page$/
     */
    public function iClickNextPage()
    {
        $this->listings->clickPage(2);
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
        throw new PendingException();
    }

    /**
     * @Then /^I can verify that there's promotion banner on bottom page$/
     */
    public function iCanVerifyThatThereSPromotionBannerOnBottomPage()
    {
        throw new PendingException();
    }
}