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
use Tests\Pages\bdd\SearchBar;
use Tests\Pages\bdd\SearchResult;

class SearchContext extends BaseContext
{
    /**
     * @var SearchBar
     */
    private $searchBar;

    /**
     * @var SearchResult
     */
    private $searchResult;
    private $cityName;
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
        $this->searchResult=$this->searchBar->clickSearchButton();
    }

    /**
     * @When /^I choose province (.*)$/
     */
    public function iChooseProvince($area)
    {

        $this->searchBar->clickLokasiProvince($area);
    }

    /**
     * @When /^I choose city (.*)$/
     */
    public function iChooseCity($area)
    {
        $this->cityName=$this->searchBar->getCityNameFromIndex($area);
        $this->searchResult=$this->searchBar->clickLokasiCity($area);
    }

    /**
     * @Then /^I get products list in specific area containing (.*)$/
     */
    public function iGetProductListContainingIn($keyword)
    {
        try{
            $this->searchResult->verifyListingsResultByTitleInSpecificArea($keyword,$this->cityName);

        }catch(\Exception $e){
            $this->searchResult->verifyListingsResultByListingsDetailsInSpecificArea($keyword,$this->cityName);
        }
    }

    /**
     * @Then /^I get all product in all areas$/
     */
    public function iGetAllProductInAllAreas()
    {
        $this->searchResult->verifyAllCategory();
    }

    /**
     * @Then /^I get all products in specific area$/
     */
    public function iGetAllProductsInSpecificArea1()
    {
        $this->searchResult->verifyAllCategory();
        $this->searchResult->verifyAllListingsByListingsDetailsInSpecificArea($this->cityName);
    }

    /**
     * @When /^I press enter$/
     */
    public function iPressEnter()
    {
        $this->searchBar->pressEnter();
    }

    /**
     * @Given /^I click Pilih Lokasi Button$/
     */
    public function iClickPiihLokasiButton()
    {
        $this->searchBar->clickPilihLokasiButton();
    }

    /**
     * @Then /^I get products list containing (.*)$/
     */
    public function iGetProductsListContaining($keyword)
    {
        try{
            $this->searchResult->verifyListingsResultByTitle($keyword);
        }catch(\Exception $e){
            $this->searchResult->verifyListingsResultByListingsDetails($keyword);
        }
    }


}