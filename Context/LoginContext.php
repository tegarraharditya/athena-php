<?php

namespace Tests\Context;

use Athena\Athena;
use Athena\Test\AthenaTestContext;
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
        $this->loginPage->open();
    }

    /**
     * @Given /^I type email$/
     */
    public function iTypeEmail()
    {
        $this->loginPage->fillLoginEmail('suci.ij@gmail.com');
    }

    /**
     * @Given /^I type password$/
     */
    public function iTypePassword()
    {
        $this->loginPage->fillLoginPassword('olx131');
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
}
