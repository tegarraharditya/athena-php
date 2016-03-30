<?php

namespace Tests\api\open\tests\locations;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\open\pages\CityPage;
use Tests\Atlas\Sinon;

class CityTest extends AthenaAPITestCase {
    
    public function testCities_IdIsGiven_ReturnOneJsonElementWithCityAndReturnHttpCode200()
    {
        $cityApiPage = new CityPage();
        $expectedCities = (new Sinon())->randomCity();

        
        $cityFromApi = $cityApiPage->getWithIdAction($expectedCities['id'], $cityApiPage->getAccessToken());

        $this->assertEquals($expectedCities, $cityFromApi->fromJson());
        $this->assertEquals(200, $cityFromApi->getResponse()->getStatusCode());
    }

    public function testCities_NoIdIsGiven_ReturnJsonListWith1000CitiesAndReturnHttpCode200()
    {
        $cityApiPage = new CityPage();

        $expectedCities = json_decode((new Sinon())->allCities(), true);
        $lang = $expectedCities["lang"];    
        unset($expectedCities['lang']);
        
        $citiesResp  = $cityApiPage->getAction($cityApiPage->getAccessToken());

        $citiesResponse   = $citiesResp->fromJson()['results'];
        $citiesStatusCode = $citiesResp->getResponse()->getStatusCode();

        usort($citiesResponse, function ($a, $b) {
            return $a['id'] > $b['id'] ? -1 : 1;
        });

        usort($expectedCities, function ($a, $b) {
            return $a['id'] > $b['id'] ? -1 : 1;
        });

        for ($idx = 0; $idx < count($expectedCities); $idx++) {
            $this->assertEquals($expectedCities[$idx], $citiesResponse[$idx]);
        }

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

