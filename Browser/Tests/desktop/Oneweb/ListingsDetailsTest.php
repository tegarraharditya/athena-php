<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/21/16
 * Time: 5:47 PM
 */

namespace Tests\Browser\Tests\desktop\Oneweb;


use Athena\Test\AthenaBrowserTestCase;
use Tests\Pages\bdd\ListingsDetails;

class ListingsDetailsTest extends AthenaBrowserTestCase
{
    public function testDetailsPage_MobilBekas_ExtraFieldAppear(){
        $listings_details = new ListingsDetails();
        $listings_details->getBrowser()->get('mobil-bekas');
        $listings_details->verifyListingDetails('mobil-bekas');
    }

    public function testDetailsPage_Apartment_ExtraFieldAppear(){
        $listings_details = new ListingsDetails();
        $listings_details->getBrowser()->get('apartment');
        $listings_details->verifyListingDetails('apartment');
    }

    public function testDetailsPage_Lowongan_ExtraFieldAppear(){
        $listings_details = new ListingsDetails();
        $listings_details->getBrowser()->get('lowongan');
        $listings_details->verifyListingDetails('lowongan');
    }
}