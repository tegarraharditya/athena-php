<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 5/2/16
 * Time: 1:32 PM
 */

namespace Tests\Context;


use Behat\Behat\Tester\Exception\PendingException;
use Composer\Util\Keys;
use Facebook\WebDriver\WebDriverKeys;
use Tests\Atlas\Sinon2;
use Tests\Helper\LeanTestingHookTrait;
use Tests\Pages\bdd\Homepage;
use Tests\Pages\bdd\MyAds;
use Tests\Pages\bdd\PostAds;

class PostAdsContext extends BaseContext
{


    private $postAds;
    private $homepage;
    /**
     * @var MyAds
     */
    private $myads;
    private $sinon;
    private $level2;
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
        $this->postAds->inputTitle($title);
    }

    /**
     * @Given /^I fill description$/
     */
    public function iFillDescription()
    {
        $description = 'DEscription Test, DEscription Test, '.WebDriverKeys::ENTER.'DEscription Test, DEscription Test';
        $this->postAds->inputDescription($description);
    }

    /**
     * @Given /^I upload photo$/
     */
    public function iUploadPhoto()
    {
        //throw new PendingException();
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
        $this->myads = $this->postAds->clickSubmitAds();
        sleep(10);
    }

    /**
     * @Then /^I can see that I successfully post ads$/
     */
    public function iCanSeeThatISuccessfullyPostAds()
    {
        $this->myads->verifyMyAdsTitle();
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

    /**
     * @Given /^I fill all extra fields (.*)$/
     */
    public function iFillAllExtraFields($level2)
    {
        $this->postAds->fillExtraFieldBasedOnCategory($this->level2);
    }

    /**
     * @Given /^I choose category "([^"]*)" "([^"]*)" "([^"]*)"$/
     */
    public function iChooseCategory1($arg1, $arg2, $arg3)
    {
        $this->postAds->clickChooseCategoryButton();
        $this->postAds->chooseCategoryLevel1($arg1);
        $this->level2 = $this->postAds->getTextFromChosenLevel2($arg2);
        $this->postAds->chooseCategoryLevel2($arg2);
        $this->postAds->chooseCategoryLevel3($arg3);
    }


}