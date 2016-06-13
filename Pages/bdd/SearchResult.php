<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 11:48 AM
 */

namespace Tests\Pages\bdd;


use Athena\Athena;

class SearchResult extends Listings
{
    public function __construct()
    {
//        parent::__construct(Athena::browser(),'');
        parent::__construct('');
    }

    private function clickOneOfResult(){
        $this->getElementListingsIndex(1)->thenFind()->asHtmlElement()->click();
        return new ListingsDetails(Athena::browser());
    }

    public function isFoundInListingsDetailsByTitle($keyword){
        try{
            $this->verifyListingsResultByTitle($keyword);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function isFoundInListingsDetailsBySpecificArea($keyword,$area){
        try{
            verifyListingsResultByTitleInSpecificArea($keyword,$area);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function verifyListingsResultByTitle($keyword){
        $elements_title = $this->getBrowser()->getCurrentPage()->find()
            ->elementsWithXpath('//h2[contains(text(),\''.$keyword.'\')]');

        if(!count($elements_title)>0){
            \PHPUnit_Framework_Assert::fail('Listings are not found in Listings Page. Please check manually');
        }

    }

    public function verifyListingsResultByTitleInSpecificArea($keyword,$area){
        $this->verifyListingsResultByTitle($keyword);

        $elements_area = $this->getBrowser()->getCurrentPage()->find()
            ->elementsWithXpath('//*[contains(text(),\''.$area.'\')]');

        if(!count($elements_area)>0){
            \PHPUnit_Framework_Assert::fail('Listings are not found on Listings Page. Please check manually');

        }
    }

    public function verifyListingsResultByListingsDetails($keyword){
        try{
            $listingsdetails = $this->clickOneOfResult();
            $listingsdetails->verifiedListingsDetailsByKeyword($keyword);
        }catch(\Exception $e){
            \PHPUnit_Framework_Assert::fail('Ads not found. Check manually. Error'.$e->getMessage());
        }

    }

    public function verifyListingsResultByListingsDetailsInSpecificArea($keyword, $area){
        try{
            $listingsdetails = $this->clickOneOfResult();
            $listingsdetails->verifiedListingsDetailsByKeywordInSpecificArea($keyword,$area);
        }catch(\Exception $e){
            \PHPUnit_Framework_Assert::fail('Ads not found. Check manually. Error'.$e->getMessage());
        }

    }

    public function verifyAllListingsByListingsDetailsInSpecificArea($area){
        try{
            $listingsdetails = $this->clickOneOfResult();
            $listingsdetails->verifyListingDetailsInSpecificArea($area);
        }catch(\Exception $e){
            \PHPUnit_Framework_Assert::fail('Ads not found. Check manually. Error'.$e->getMessage());
        }

    }

}