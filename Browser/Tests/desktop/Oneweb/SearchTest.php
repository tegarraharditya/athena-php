<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/21/16
 * Time: 6:12 PM
 */

namespace Tests\Browser\Tests\desktop\Oneweb;


use Athena\Test\AthenaBrowserTestCase;
use Tests\Pages\bdd\SearchBar;

class SearchTest extends AthenaBrowserTestCase
{
    public function testSearch_SpecificKeyword_ListingsWithSpecificKeyword($keyword){
        $searchBar = new SearchBar();
        $searchBar->open(true);
        $searchBar->typeKeyword($keyword);
        $searchResult = $searchBar->clickSearchButton();
        $searchResult->verifyListingsResultByTitle($keyword);
        $searchResult->verifyListingsResultByListingsDetails($keyword);
    }

    public function testSearch_SpecificKeywordRegion_ListingsWithSpecificKeywordAndRegion(){

    }

}