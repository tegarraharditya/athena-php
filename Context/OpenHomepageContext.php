<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/4/16
 * Time: 10:39 AM
 */

namespace Tests\Context;


use Athena\Athena;
use Athena\Test\AthenaTestContext;
use Tests\Page\Homepage;

class OpenHomepageContext extends AthenaTestContext
{
    /**
     * @var String
     */
    private $url;

    public function __construct(){
        $this->homepage = new Homepage(Athena::browser());
    }

    /**
     * @Given /^I have a url$/
     */
    public function iHaveUrl(){
        $this->url = 'http://olx.co.id';
        return $this->url;
    }

    /**
     * @When /^I open a url$/
     */
    public function iOpenUrl(){
        $this->homepage->open();
    }

    /**
     * @Then /^I should see homepage$/
     */
    public function iSeeHomepageTitle(){
        $this->homepage->verifyPage();
    }

}