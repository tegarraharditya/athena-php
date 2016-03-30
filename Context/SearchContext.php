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
use Tests\Page\SearchBar;

class SearchContext extends BaseContext
{
    /**
     * @var SearchBar
     */
    private $searchBar;
    public function __construct()
    {
        $this->searchBar = new SearchBar();
    }

    /**
     * @Given /^I type (.*)$/
     */
    public function iType($keyword)
    {
        $this->searchBar->typeKeyword($keyword);
    }

    /**
     * @When /^I click search button$/
     */
    public function iClickSearchButton()
    {
        $this->searchBar->clickSearchButton();
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
        $this->searchBar->clickPilihLokasiButton();
        $this->searchBar->clickLokasi($area);//index area as shown on 'Pilih Lokasi' Pop Up Box
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

    /**
     * @When /^I press enter$/
     */
    public function iPressEnter()
    {
        $this->searchBar->pressEnter();
    }

    /**
     * @Then /^link is not broken$/
     */
    public function linkIsNotBroken()
    {
        $this->searchBar->checkUrl('http://olx.co.id');
    }
}