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
use Tests\Pages\bdd\Listings;
use Tests\Pages\bdd\ListingsDetails;

class ListingsDetailsContext extends BaseContext
{
    /**
     * @var ListingsDetails
     */
    private $listingsDetails;
    private $listings;

    public function __construct()
    {
        $this->listingsDetails = new ListingsDetails();
        $this->listings = new Listings('games-console ');
    }

    /**
     * @Given /^I am in Listings Details (.*) page$/
     */
    public function iAmInListingsDetailsPage($category)
    {
        $this->listings->getBrowser()->get($category);
        $this->listingsDetails = $this->listings->clickListingsIndex1();
    }

    /**
     * @Then /^I should see details of listings for Category (.*)$/
     */
    public function iShouldSeeDetailsOfListingsForCategory($category)
    {
        $this->listingsDetails->verifyListingDetails($category);
    }

    /**
     * @Then /^I can find that seller number element contains telp:$/
     */
    public function iCanFindThatSellerNumberElementContainsTelp()
    {
        $this->listingsDetails->verifyPhoneNumberOnHubungiPenjualElement();
    }

    /**
     * @When /^I click Chat dengan Penjual button$/
     */
    public function iClickChatDenganPenjualButton()
    {
        $this->listingsDetails->clickChatwithSeller();
    }

    /**
     * @Then /^I see pop up suggestion to download apps$/
     */
    public function iSeePopUpSuggestionToDownloadApps()
    {
        $this->listingsDetails->verifyPopUpChatwithSeller();
    }

    /**
     * @When /^I click Next Button$/
     */
    public function iClickNextButton()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I can see listings details in next page$/
     */
    public function iCanSeeListingsDetailsInNextPage()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I am in Listing Details (.*) page$/
     */
    public function iAmInListingDetailsPage($category)
    {
        throw new PendingException();
    }

    /**
     * @When /^I click android icon$/
     */
    public function iClickAndroidIcon()
    {
        $this->listingsDetails->clickAndroidIcon();
    }

    /**
     * @Given /^I click close$/
     */
    public function iClickClose()
    {
        $this->listingsDetails->clickCloseIconAndroid();
    }

    /**
     * @Then /^I cannot see the android icon$/
     */
    public function iCannotSeeTheAndroidIcon()
    {
        $this->listingsDetails->verifyCloseIconAndroid();
    }


}