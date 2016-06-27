<?php
/**
 * Created by PhpStorm.
 * User: tegar
 * Date: 6/22/16
 * Time: 10:42 AM
 */

namespace Tests\Context;

use Athena\Athena;
use Athena\Page\AbstractPage;
use Behat\Behat\Tester\Exception\PendingException;
use GuzzleHttp\Url;
use Tests\Pages\bdd\AdsAutoApprove;

class AdsAutoApproveContext extends BaseContext
{

    /**
     * @var AdsAutoApprove
     */
    private $adsAutoAprrove;
    private $ID_USER = 'intern.product@olx.co.id';
    private $ID_PASS = 'Intern123456';

    public function __construct()
    {
        $this->adsAutoAprrove = new AdsAutoApprove();
    }

    /**
     * @When /^I open moderation homepage$/
     */
    public function iOpenModerationHomepage()
    {
        $this->adsAutoAprrove->openUrl();
    }

    /**
     * @Then /^I put username$/
     */
    public function iPutUsername()
    {
        $this->adsAutoAprrove->setUsername($this->ID_USER);
    }

    /**
     * @Given /^I put password$/
     */
    public function iPutPassword()
    {
        $this->adsAutoAprrove->setPassword($this->ID_PASS);
    }


    /**
     * @Then /^I click submit buttons$/
     */
    public function iClickSubmitButtons()
    {
        $this->adsAutoAprrove->clickLogin();
    }

    /**
     * @Then /^I click moderation panel$/
     */
    public function iClickModerationPanel()
    {
        $this->adsAutoAprrove->clickMediasi();
    }

    /**
     * @Then /^I click OK all ads$/
     */
    public function iClickOKAllAds()
    {
       $this->adsAutoAprrove->approveAllAds();
    }
}



