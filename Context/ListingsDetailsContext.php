<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/17/16
 * Time: 10:19 AM
 */

namespace Tests\Context;

use Athena\Athena;
use Behat\Behat\Tester\Exception\PendingException;
use GuzzleHttp\Url;
use Tests\Pages\bdd\ListingsDetails;

class ListingsDetailsContext extends BaseContext
{
    /**
     * @var ListingsDetails
     */
    private $listingsDetails;

    public function __construct()
    {
        $this->listingsDetails = new ListingsDetails();
    }

    /**
     * @Given /^I am in Listings Details (.*) page$/
     */
    public function iAmInListingsDetailsPage($category)
    {
        $this->listingsDetails->getBrowser()->get($category);
    }

    /**
     * @Then /^I should see details of listings for Category (.*)$/
     */
    public function iShouldSeeDetailsOfListingsForCategory($category)
    {
        $this->listingsDetails->verifyListingDetails($category);
    }

    /**
     * @Then /^I click Next Listings Details Page$/
     */
    public function iClickNextListingsDetailsPage()
    {
        $this->listingsDetails->clickNextPage();
        $this->listingsDetails->verifyAttributeClassBody();
    }

    /**
     * @Then /^I click Prev Listings Details Page$/
     */
    public function iClickPrevListingsDetailsPage()
    {
        $this->listingsDetails->clickPrevPage();
        $this->listingsDetails->verifyAttributeClassBody();
    }

    /**
     * @Then /^I can find that seller number element contains telp:$/
     */
    public function iCanFindThatSellerNumberElementContainsTelp()
    {
        $this->listingsDetails->verifyPhoneNumberOnHubungiPenjualElement();
    }

}