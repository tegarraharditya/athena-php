<?php

namespace Tests\api\open\tests\oauth;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\open\pages\OauthPage;

class RefreshTest extends AthenaAPITestCase {
    
    public function testRefresh_CorrectRefreshKeyIsGiven_ReturnTokensAndHttpCode200()
    {
        $this->markTestSkipped("Local dependency in shared level!!");
        $oauthApiPage = new OauthPage();
        $oauthData = $oauthApiPage->getOauthData();

        $apiResp = $oauthApiPage->refreshTokenAction(
            $oauthData['tokens']['refresh_token'],
            $oauthData['client']
        );

        $data = $apiResp->fromJson(false);
                

        $this->assertEquals(200, $apiResp->getResponse()->getStatusCode());
        $this->assertObjectHasAttribute('access_token', $data);
        $this->assertObjectHasAttribute('refresh_token', $data);
    }

    public function testRefresh_IncorrectRefreshKeyIsGiven_ReturnInvalidGrantErrorAndHttpCode400()
    {
        $oauthApiPage = new OauthPage();
        $oauthData = $oauthApiPage->getOauthData();

        $apiResp = $oauthApiPage->refreshTokenAction(
            md5(time()),
            $oauthData['client']
        );

        $data = $apiResp->fromJson(false);

        $this->assertEquals(400, $apiResp->getResponse()->getStatusCode());
        $this->assertObjectHasAttribute('error', $data);
        $this->assertEquals('invalid_grant', $data->error);
    }
}
