<?php

namespace Tests\Api\v1\tests\oauth;

use Athena\Test\AthenaAPITestCase;
use Tests\Atlas\Sinon;
use Tests\Libs\Device;
use Tests\Api\v1\pages\OauthPage;

class DeviceLoginTest extends AthenaAPITestCase {
    
    public function testLogin_EmptyDeviceDataIsGiven_ReturnInvalidRequestErrorAndHttpCode400()
    {
        $oauthApiPage = new OauthPage();
        
        $client = $oauthApiPage->getFromSinonOAuthClientData();

        $apiResp = $oauthApiPage->loginWithDeviceIdAction(
            null,
            null,
            $client
        );

        $data = $apiResp->fromJson();

        $this->assertEquals(400, $apiResp->getResponse()->getStatusCode());
        $this->assertArrayHasKey('error', $data);
        $this->assertEquals('invalid_request', $data['error']);
    }

    public function testLogin_DeviceTokenIsFromDifferentDevice_ReturnInvalidGrantErrorAndHttpCode400()
    {
        $device = Device::random();
        $anotherDevice = Device::random();

        $oauthApiPage = new OauthPage();
        $client = $oauthApiPage->getFromSinonOAuthClientData();
        
        $apiResp = $oauthApiPage->loginWithDeviceIdAction(
            $device->getDeviceId(),
            $anotherDevice->getOauthValidationToken(),
            $client
        );

        $data = $apiResp->fromJson();

        $this->assertEquals(400, $apiResp->getResponse()->getStatusCode());
        $this->assertArrayHasKey('error', $data);
        $this->assertEquals('invalid_grant', $data['error']);
    }

    public function testLogin_CorrectDeviceDataIsGiven_ReturnTokensAndHttpCode200()
    {
        $device = Device::random();

        $oauthApiPage = new OauthPage();
        $client = $oauthApiPage->getFromSinonOAuthClientData();

        $apiResp = $oauthApiPage->loginWithDeviceIdAction(
            $device->getDeviceId(),
            $device->getOauthValidationToken(),
            $client
        );

        $data = $apiResp->fromJson();

        $this->assertEquals(200, $apiResp->getResponse()->getStatusCode());
        $this->assertArrayHasKey('access_token', $data);
        $this->assertArrayHasKey('refresh_token', $data);
    }
}