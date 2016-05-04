<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 5/4/16
 * Time: 11:57 AM
 */

namespace Tests\Context\atlas;

use Tests\Context\BaseContext;
use Tests\Pages\bdd\atlas\Homepage;

class HomepageContext extends BaseContext
{
    private $homepage;
    public function __construct()
    {
        $this->homepage = new Homepage();
    }

    /**
     * @When /^I open Olx site$/
     */
    public function iOpenOlxSite()
    {
        $this->homepage->open(true);
    }

    /**
     * @Then /^I can verify that I am in homepage$/
     */
    public function iCanVerifyThatIAmInHomepage()
    {
        //sleep(20);testing commit
        $this->homepage->verifyHomepage();
    }
}