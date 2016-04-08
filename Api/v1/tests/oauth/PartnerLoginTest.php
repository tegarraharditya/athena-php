<?php

namespace Tests\Api\v1\tests\oauth;

use Athena\Test\AthenaAPITestCase;
use Tests\atlas\Sinon;
use Tests\Api\v1\pages\OauthPage;

class PartnerLoginTest extends AthenaAPITestCase {
    
    public function testLogin_EmptyDeviceDataIsGiven_ReturnInvalidRequestErrorAndHttpCode400()
    {
        $sinon = new Sinon();
        $client = $sinon->oAuthClientData();

        $oauthApiPage = new OauthPage();

        $apiResp = $oauthApiPage->loginWithPartnerCodeAction(
            null,
            null,
            $client
        );

        $data = $apiResp->fromJson();

        $this->assertEquals(400, $apiResp->getResponse()->getStatusCode());
        $this->assertArrayHasKey('error', $data);
        $this->assertEquals('invalid_request', $data['error']);
    }

    public function testLogin_PartnerSecretIsIncorrect_ReturnInvalidGrantErrorAndHttpCode400()
    {
        $sinon = new Sinon();
        $client = $sinon->oAuthClientData();
        $partner = $sinon->createApiPartner();

        $oauthApiPage = new OauthPage();

        $apiResp = $oauthApiPage->loginWithPartnerCodeAction(
            $partner['partner_code'],
            sha1(rand(0, 99999999)),
            $client
        );

        $data = $apiResp->fromJson();

        $this->assertEquals(400, $apiResp->getResponse()->getStatusCode());
        $this->assertArrayHasKey('error', $data);
        $this->assertEquals('invalid_grant', $data['error']);
    }

    public function testLogin_CorrectPartnerDataIsGiven_ReturnTokensAndHttpCode200()
    {
        $sinon = new Sinon();
        $client = $sinon->oAuthClientData();
        $partner = $sinon->createApiPartner();

        $oauthApiPage = new OauthPage();

        $apiResp = $oauthApiPage->loginWithPartnerCodeAction(
            $partner['partner_code'],
            $partner['key'],
            $client
        );

        $data = $apiResp->fromJson();

        $this->assertEquals(200, $apiResp->getResponse()->getStatusCode());
        $this->assertArrayHasKey('access_token', $data);
        $this->assertArrayHasKey('refresh_token', $data);
    }
    
}
