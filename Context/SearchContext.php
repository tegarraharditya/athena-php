<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 3:01 PM
 */

namespace Tests\Context;


use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;

class SearchContext extends AthenaTestContext
{

    /**
     * @Given /^I type (.*)$/
     */
    public function iType($keyword)
    {
        throw new PendingException();
    }

    /**
     * @When /^I click search button$/
     */
    public function iClickSearchButton()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I get products list containing (.*)$/
     */
    public function iGetProductsListContaining($keyword)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I choose (.*)$/
     */
    public function iChoose($area)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I get product list containing (.*) in (.*)$/
     */
    public function iGetProductListContainingIn($keyword, $area)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I get all product in all areas$/
     */
    public function iGetAllProductInAllAreas()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I get all products in specific area$/
     */
    public function iGetAllProductsInSpecificArea()
    {
        throw new PendingException();
    }
}