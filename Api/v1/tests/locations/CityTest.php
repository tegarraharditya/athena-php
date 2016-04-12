<?php

namespace Tests\Api\v1\tests\locations;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\v1\pages\CityPage;

class CityTest extends AthenaAPITestCase {
    
    public function testCities_IdIsGiven_ReturnOneJsonElementWithCityAndReturnHttpCode200()
    {
        $cityPage = new CityPage();
        $expectedCities = $cityPage->getFromSinonRandomCity();

        
        $cityFromApi = $cityPage->getFromApiWithIdAction($expectedCities['id'], $cityPage->getAccessToken());

        $this->assertEquals($expectedCities['id'], $cityFromApi->fromJson()['id']);
        $this->assertEquals($expectedCities['name'], $cityFromApi->fromJson()['name']);
        $this->assertEquals($expectedCities['region_id'], $cityFromApi->fromJson()['region_id']);
        $this->assertEquals(200, $cityFromApi->getResponse()->getStatusCode());
    }

    public function testCities_NoIdIsGiven_ReturnJsonListWith1000CitiesAndReturnHttpCode200()
    {
        $cityPage = new CityPage();

        $expectedCities = json_decode($cityPage->getFromSinonAllCities(), true);
        $lang = $expectedCities['lang'];
        unset($expectedCities['lang']);
        
        $citiesResp  = $cityPage->getFromApiAction($cityPage->getAccessToken());

        $citiesApiResponse   = $citiesResp->fromJson()['results'];
        $citiesStatusCode = $citiesResp->getResponse()->getStatusCode();

        usort($citiesApiResponse, function ($a, $b) {
            return $a['id'] > $b['id'] ? -1 : 1;
        });

        usort($expectedCities, function ($a, $b) {
            return $a['id'] > $b['id'] ? -1 : 1;
        });
        
        $rand_id = rand(0, (count($expectedCities) - 1));

        
        $this->assertEquals($expectedCities[$rand_id]['id'], $citiesApiResponse[$rand_id]['id']);
        $this->assertEquals($expectedCities[$rand_id]['region_id'], $citiesApiResponse[$rand_id]['region_id']);
        $this->assertEquals(200, $citiesStatusCode);
    }

    /**
     * @throws GuzzleHttp\Exception\ClientException
     * @expectedExceptionCode 404
     */

    public function testCities_WrongIdIsGiven_ReturnHttpCode404()
    {
        $cityPage = new CityPage();
        $cityPage->getFromApiWithIdAction(time(), $cityPage->getAccessToken());
    }
}

