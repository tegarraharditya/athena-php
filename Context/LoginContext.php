<?php

namespace Tests\Context;

use Athena\Athena;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Page\LoginPage;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 2/24/16
 * Time: 7:48 PM
 */
class LoginContext extends AthenaTestContext
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
        $this->loginPage = new LoginPage(Athena::browser());
    }

    /**
     * @When /^I go to accounts page$/
     */
    public function iGoToAccountsPage()
    {
        $this->loginPage->open('https://ssl.olx.co.id/masuk/');
    }

    /**
     * @Given /^I type email$/
     */
    public function iTypeEmail()
    {
        $this->loginPage->fillLoginEmail('suci.istch@gmail.com');
    }

    /**
     * @Given /^I type password$/
     */
    public function iTypePassword()
    {
        $this->loginPage->fillLoginPassword('testing123');
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
        $this->loginPage->open('https://ssl.olx.co.id/masuk/');
    }

    /**
     * @Then /^I see login page$/
     */
    public function iSeeLoginPage()
    {
        $this->loginPage->verifyFormLoginIsDisplayed();
    }
}
