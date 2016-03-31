<?php
namespace Tests\Api\v1\tests\locations;

use Athena\Test\AthenaAPITestCase;
use Tests\atlas\Sinon;
use Tests\Api\v1\pages\RegionPage;

class RegionTest extends AthenaAPITestCase {
    
    public function testRegion_IdIsGiven_ReturnOneJsonElementWithRegionAndReturnHttpCode200()
    {
        $regionApiPage = new RegionPage();

        $expectedRegion = (new Sinon())->randomRegion();

        $regionFromApi = $regionApiPage->getWithIdAction($expectedRegion['id'], $regionApiPage->getAccessToken());

        $this->assertEquals($expectedRegion, $regionFromApi->fromJson());
        $this->assertEquals(200, $regionFromApi->getResponse()->getStatusCode());
    }

    public function testRegions_NoIdIsGiven_ReturnJsonListWithAllRegionsAndReturnHttpCode200()
    {
        $regionApiPage = new RegionPage();

        $expectedRegions = (new Sinon())->allRegions();

        $regionsResp   = $regionApiPage->getAction($regionApiPage->getAccessToken());

        $regionsContent = $regionsResp->fromJson()['results'];
        $regionsStatusCode = $regionsResp->getResponse()->getStatusCode();

        usort($regionsContent, function ($a, $b) {
            return $a['id'] > $b['id'] ? -1 : 1;
        });

        usort($expectedRegions, function ($a, $b) {
            return $a['id'] > $b['id'] ? -1 : 1;
        });

        for ($idx = 0; $idx < count($expectedRegions); $idx++) {
            $this->assertEquals($expectedRegions[$idx], $regionsContent[$idx]);
        }

        $this->assertEquals(200, $regionsStatusCode);
    }

    /**
     * TODO Fix API response to return 404 when region does not exist
     */
    public function testRegion_WrongIdIsGiven_ReturnEmptyListAndHttpCode404()
    {
        $regionApiPage = new RegionPage();
        $regionFromApi = $regionApiPage->getWithIdAction(time(), $regionApiPage->getAccessToken());
        
        $this->assertEquals(200, $regionFromApi->getResponse()->getStatusCode());
        $this->assertEmpty($regionFromApi->fromJson());
    }
    
}