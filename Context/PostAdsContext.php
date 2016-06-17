<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 5/2/16
 * Time: 1:32 PM
 */

namespace Tests\Context;


use Athena\Athena;
use Facebook\WebDriver\WebDriverKeys;
use Tests\Atlas\Sinon2;
use Tests\Pages\bdd\Homepage;
use Tests\Pages\bdd\PostAds;
use Tests\Pages\bdd\PostAdsConfirmation;

class PostAdsContext extends BaseContext
{

    private $error_email_and_number_not_match = 'Nomor ini telah terdaftar atas akun pengguna lain';
    private $postAds;
    private $homepage;

    /**
     * @var PostAdsConfirmation
     */
    private $adsconf;
    private $sinon;
    private $level2;
    private $settings;
    public function __construct()
    {
        $this->postAds = new PostAds();
        $this->homepage = new Homepage();
        $this->sinon = new Sinon2();
        $this->settings = (array) Athena::settings()->getAll();
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
        $this->adsconf = $this->postAds->clickSubmitAds();

    }

    /**
     * @Then /^I can see that I successfully post ads$/
     */
    public function iCanSeeThatISuccessfullyPostAds()
    {
        $this->adsconf->verifyPage();
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

    /**
     * @Given /^I fill existing email address$/
     */
    public function iFillExistingEmailAddress()
    {

        $existing_email = $this->settings['username'];
        $this->postAds->inputEmail($existing_email);
    }

    /**
     * @When /^I can see a pop up to continue with login$/
     */
    public function iCanSeeAPopUpToContinueWithLogin()
    {
        $this->postAds->verifyConfirmationLoginShowUp();
    }

    /**
     * @When /^I click yes$/
     */
    public function iClickYes()
    {
        $this->postAds->clickConfirmToContinueWithLogin();
    }

    /**
     * @When /^I fill password$/
     */
    public function iFillPassword()
    {
        $password = $this->settings['password'];
        $this->postAds->inputPasswordLogin($password);
    }

    /**
     * @When /^I click submit login$/
     */
    public function iClickSubmitLogin()
    {
        $this->adsconf = $this->postAds->clickSubmitLoginSuccess();
    }

    /**
     * @Given /^I fill existing verified phone number$/
     */
    public function iFillExistingVerifiedPhoneNumber()
    {
        $phonenumber = $this->settings['verified-phone'];
        $this->postAds->inputNoHp($phonenumber);
    }

    /**
     * @Given /^I fill other's existing email address$/
     */
    public function iFillOtherSExistingEmailAddress()
    {
        $others_email = $this->settings['username-others'];
        $this->postAds->inputEmail($others_email);
    }

    /**
     * @Then /^I see error : can not use this phone number$/
     */
    public function iSeeErrorCanNotUseThisPhoneNumber()
    {
        $actual_error = $this->postAds->getPopUpError();
        $this->postAds->verifyError($this->error_email_and_number_not_match,$actual_error);
    }

    /**
     * @Given /^I post Ads using existing email and existing verified phone number$/
     */
    public function iPostAdsUsingExistingEmailAndExistingVerifiedPhoneNumber()
    {
        $email = $this->settings['username'];
        $phone = $this->settings['verified-phone'];
        $password = $this->settings['password'];
        $this->postAds->postAds($email,$phone);
        $this->postAds->clickSubmitAdsNegative();

        //login
        $this->postAds->verifyConfirmationLoginShowUp();
        sleep(3);
        $this->postAds->clickConfirmToContinueWithLogin();
        $this->postAds->inputPasswordLogin($password);
        $this->adsconf = $this->postAds->clickSubmitLoginSuccess();

    }

    /**
     * @When /^I post another ads using existing email and existing verified phone number$/
     */
    public function iPostAnotherAdsUsingExistingEmailAndExistingVerifiedPhoneNumber()
    {   $email = '';
        $phone = $this->settings['verified-phone'];
        $this->adsconf->verifyPage();
        $this->postAds = $this->adsconf->clickRepostAdsButton();
        $this->postAds->postAds($email,$phone);
        $this->adsconf = $this->postAds->clickSubmitAds();
        $this->adsconf->verifyPage();

    }

    /**
     * @When /^I post another ads using other's email$/
     */
    public function iPostAnotherAdsUsingOtherSEmail()
    {
        $email = 'com';
        $phone = '';
        $this->postAds = $this->adsconf->clickRepostAdsButton();
        $this->postAds->postAds($email,$phone);
        $this->postAds->clickSubmitAdsNegative();
    }

    /**
     * @When /^I click Pasang Iklan button \(need confirmation\)$/
     */
    public function iClickPasangIklanButtonNeedConfirmation()
    {
        $this->postAds->clickSubmitAdsNegative();
    }

    /**
     * @Then /^I see pop up to login again$/
     */
    public function iSeePopUpToLoginAgain()
    {
        $this->postAds->verifyConfirmationLoginShowUp();
    }


}