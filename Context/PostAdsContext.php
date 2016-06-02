<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 5/2/16
 * Time: 1:32 PM
 */

namespace Tests\Context;


use Behat\Behat\Tester\Exception\PendingException;
use Tests\Atlas\Sinon2;
use Tests\Pages\bdd\Homepage;
use Tests\Pages\bdd\PostAds;

class PostAdsContext extends BaseContext
{


    private $postAds;
    private $homepage;
    private $sinon;
    public function __construct()
    {
        $this->postAds = new PostAds();
        $this->homepage = new Homepage();
        $this->sinon = new Sinon2();
    }

    /**
     * @When /^I click post Ads on Header$/
     */
    public function iClickPostAdsOnHeader()
    {
        $this->postAds = $this->homepage->clickPostAdsLink();
    }

    /**
     * @Then /^It will be redirected to Post Ads Page$/
     */
    public function itWillBeRedirectedToPostAdsPage()
    {
        $this->postAds->verifyPostAdsPage();
    }

    /**
     * @Given /^I go to posting ads page$/
     */
    public function iGoToPostingAdsPage()
    {
        $this->postAds->open(true);
    }

    /**
     * @Given /^I fill title$/
     */
    public function iFillTitle()
    {
        $title = 'Test Posting Ads'.date('Y:m:d h:i:sa');
        var_dump($title);
        $this->postAds->inputTitle($title);
    }

    /**
     * @Given /^I choose category$/
     */
    public function iChooseCategory()
    {
        /*$category = $this->sinon->randomCategory();
        var_dump($category);*/
        $this->postAds->clickChooseCategoryButton();
        $this->postAds->chooseCategoryLevel1(1);
        $this->postAds->chooseCategoryLevel2(2);
        $this->postAds->chooseCategoryLevel3(2);
    }

    /**
     * @Given /^I fill description$/
     */
    public function iFillDescription()
    {
        $description = 'description test';
        $this->postAds->inputDescription($description);
    }

    /**
     * @Given /^I upload photo$/
     */
    public function iUploadPhoto()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I choose location$/
     */
    public function iChooseLocation()
    {
        $this->postAds->clickChooseLocationButton();
        $this->postAds->chooseRegion(2);
        $this->postAds->chooseCity(2);
    }

    /**
     * @Given /^I fill name$/
     */
    public function iFillName()
    {
        $this->postAds->inputName('Tester');
    }

    /**
     * @Given /^I fill email$/
     */
    public function iFillEmail()
    {
        $email = $this->sinon->generateEmail();
        var_dump($email);
        $this->postAds->inputEmail($email);
    }

    /**
     * @Given /^I fill Handphone number$/
     */
    public function iFillHandphoneNumber()
    {
        $this->postAds->inputNoHp('089787878788');
    }

    /**
     * @Given /^I fill pin BB$/
     */
    public function iFillPinBB()
    {
        $this->postAds->inputPinBB('ASASAA');
    }

    /**
     * @Given /^I agree OLX can process my data$/
     */
    public function iAgreeOLXCanProcessMyData()
    {
        $this->postAds->thickAgreementUser();
    }

    /**
     * @Given /^I want to accept newsletter$/
     */
    public function iWantToAcceptNewsletter()
    {
        $this->postAds->thickAcceptNewsLetter();
    }

    /**
     * @When /^I click Pasang Iklan button$/
     */
    public function iClickPasangIklanButton()
    {
        $this->postAds->clickSubmitAds();
    }

    /**
     * @Then /^I can see that I successfully post ads$/
     */
    public function iCanSeeThatISuccessfullyPostAds()
    {
        throw new PendingException();
    }

    /**
     * @When /^I submit pasang iklan \(negative\)$/
     */
    public function iSubmitPasangIklanNegative()
    {
        $this->postAds->clickSubmitAdsNegative();
    }

    /**
     * @Then /^I see error on title ads field$/
     */
    public function iSeeErrorOnTitleAdsField()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->postAds->errorNoTitleIsDisplayed());
    }

    /**
     * @Given /^I see error on Category field$/
     */
    public function iSeeErrorOnCategoryField()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->postAds->errorNoCategoryIsDisplayed());
    }

    /**
     * @Given /^I see error on choose location field$/
     */
    public function iSeeErrorOnChooseLocationField()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->postAds->errorNoCityIsDisplayed());
    }

    /**
     * @Given /^I see error on Name field$/
     */
    public function iSeeErrorOnNameField()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->postAds->errorNoNameIsDisplayed());
    }

    /**
     * @Given /^I see error on Email field$/
     */
    public function iSeeErrorOnEmailField()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->postAds->errorNoEmailIsDisplayed());
    }

    /**
     * @Given /^I see error on No HP field$/
     */
    public function iSeeErrorOnNoHPField()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->postAds->errorNoHpNumberIsDisplayed());
    }

    /**
     * @Given /^I see error on Agreement User field$/
     */
    public function iSeeErrorOnAgreementUserField()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->postAds->errorNoAgreementUserIsDisplayed());
    }


}