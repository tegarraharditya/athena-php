<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/17/16
 * Time: 10:19 AM
 */

namespace Tests\Context;


use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Page\ListingsDetails;

class ListingsDetailsContext extends AthenaTestContext
{
    /**
     * @var ListingsDetails
     */
    private $lisingsDetails;

    public function __construct()
    {
        $this->listingsDetails = new ListingsDetails(Athena::browser());
    }

    /**
     * @Given /^I am in Listings Details page$/
     */
    public function iAmInListingsDetailsPage()
    {
        $this->listingsDetails->open();
    }

    /**
     * @Given /^I should see details of seller$/
     */
    public function iShouldSeeDetailsOfSeller()
    {
        $this->listingsDetails->verifyListingsDetailsSellerInfo();
    }

    /**
     * @When /^I click phone number$/
     */
    public function iClickPhoneNumber()
    {
        $this->listingsDetails->clickHubungiPenjualButton();
    }

    /**
     * @Then /^I should see seller phone number$/
     */
    public function iShouldSeeSellerPhoneNumber()
    {
        throw new PendingException();
    }

    /**
     * @When /^I click Hubungi Penjual button$/
     */
    public function iClickHubungiPenjualButton()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see message box appear$/
     */
    public function iShouldSeeMessageBoxAppear()
    {
        throw new PendingException();
    }

    /**
     * @When /^I click report this ads$/
     */
    public function iClickReportThisAds()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I fill all of the information needed$/
     */
    public function iFillAllOfTheInformationNeeded()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I submit the report$/
     */
    public function iSubmitTheReport()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I am be able to report this ads$/
     */
    public function iAmBeAbleToReportThisAds()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see details of listings for Category Motor$/
     */
    public function iShouldSeeDetailsOfListingsForCategoryMotor()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see details of listings for Category Mobil$/
     */
    public function iShouldSeeDetailsOfListingsForCategoryMobil()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see details of listings for Category Property$/
     */
    public function iShouldSeeDetailsOfListingsForCategoryProperty()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see details of listings for Category Keperluan Pribadi$/
     */
    public function iShouldSeeDetailsOfListingsForCategoryKeperluanPribadi()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see details of listings for Category Electronic & Gadget$/
     */
    public function iShouldSeeDetailsOfListingsForCategoryElectronicGadget()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see details of listings for Category Hobi & Olahraga$/
     */
    public function iShouldSeeDetailsOfListingsForCategoryHobiOlahraga()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see details of listings for Category Rumah Tangga$/
     */
    public function iShouldSeeDetailsOfListingsForCategoryRumahTangga()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see details of listings for Category Perlengkapan Bayi & Anak$/
     */
    public function iShouldSeeDetailsOfListingsForCategoryPerlengkapanBayiAnak()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see details of listings for Category Kantor & Industri$/
     */
    public function iShouldSeeDetailsOfListingsForCategoryKantorIndustri()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see details of listings for Category Jasa & Lowongan Kerja$/
     */
    public function iShouldSeeDetailsOfListingsForCategoryJasaLowonganKerja()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I have Contact Seller pop up appear$/
     */
    public function iHaveContactSellerPopUpAppear()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I click submit button on Contact Seller form$/
     */
    public function iClickSubmitButtonOnContactSellerForm()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I am be able to submit message$/
     */
    public function iAmBeAbleToSubmitMessage()
    {
        throw new PendingException();
    }

    /**
     * @When /^I fill email on email field$/
     */
    public function iFillEmailOnEmailField()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I fill details of message$/
     */
    public function iFillDetailsOfMessage()
    {
        throw new PendingException();
    }
}