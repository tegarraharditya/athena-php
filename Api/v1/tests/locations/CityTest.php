<?php

namespace Tests\Api\v1\tests\locations;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\v1\pages\CityPage;
use Tests\Atlas\Sinon;

class CityTest extends AthenaAPITestCase {
    
    public function testCities_IdIsGiven_ReturnOneJsonElementWithCityAndReturnHttpCode200()
    {
        $cityApiPage = new CityPage();
        $expectedCities = (new Sinon())->randomCity();

        
        $cityFromApi = $cityApiPage->getWithIdAction($expectedCities['id'], $cityApiPage->getAccessToken());

        $this->assertEquals($expectedCities['id'], $cityFromApi->fromJson()['id']);
        $this->assertEquals($expectedCities['name'], $cityFromApi->fromJson()['name']);
        $this->assertEquals($expectedCities['region_id'], $cityFromApi->fromJson()['region_id']);
        $this->assertEquals(200, $cityFromApi->getResponse()->getStatusCode());
    }

    public function testCities_NoIdIsGiven_ReturnJsonListWith1000CitiesAndReturnHttpCode200()
    {
        $cityApiPage = new CityPage();

        $expectedCities = json_decode((new Sinon())->allCities(), true);
        $lang = $expectedCities['lang'];
        unset($expectedCities['lang']);
        
        $citiesResp  = $cityApiPage->getAction($cityApiPage->getAccessToken());

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
        $cityApiPage = new CityPage();
        $cityApiPage->getWithIdAction(time(), $cityApiPage->getAccessToken());
    }
}

