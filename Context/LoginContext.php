<?php

namespace Tests\Context;

use Athena\Athena;
use Athena\Browser\BrowserInterface;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Page\LoginPage;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 2/24/16
 * Time: 7:48 PM
 */
class LoginContext extends BaseContext
{
    /**
     * @var \Tests\Page\MyAds
     */
    private $MyAdsPage;

    /**
     * @var \Tests\Page\LoginPage
     */
    private $loginPage;

    /**
     * LoginContext constructor.
     */
    public function __construct()
    {
        //Athena::settings()->getByPath('strings.byPage.homepage');
        $this->loginPage = new LoginPage(Athena::browser());
    }

    /**
     * @When /^I go to accounts page$/
     */
    public function iGoToAccountsPage()
    {
        $this->loginPage->open(true);
    }

    /**
     * @Given /^I type email$/
     */
    public function iTypeEmail()
    {
        $email = Athena::settings()->get('username');
        $this->loginPage->fillLoginEmail($email);
    }

    /**
     * @Given /^I type password$/
     */
    public function iTypePassword()
    {
        $password = Athena::settings()->get('password');
        $this->loginPage->fillLoginPassword($password);
    }

    /**
     * @Given /^I click submit button$/
     */
    public function iClickSubmitButton()
    {
        $this->MyAdsPage = $this->loginPage->submitLoginForm();
    }

    /**
     * @Then /^I should see myaccount page$/
     */
    public function iShouldSeeMyaccountPage()
    {
        $this->MyAdsPage->verifyMyAdsTitle();
    }

    /**
     * @When /^I go to login page$/
     */
    public function iGoToLoginPage()
    {
        $this->loginPage->open(true);
    }

    /**
     * @Then /^I see login page$/
     */
    public function iSeeLoginPage()
    {
        $this->loginPage->verifyFormLoginIsDisplayed();
    }
}
