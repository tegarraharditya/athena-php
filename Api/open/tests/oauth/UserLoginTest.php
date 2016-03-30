<?php

namespace Tests\api\open\tests\oauth;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\open\pages\OauthPage;

class UserLoginTest extends AthenaAPITestCase {
    
    public function testLogin_CorrectCredentialsAreGiven_ReturnTokensAndHttpCode200()
    {
        $oauthApiPage = new OauthPage();
        $user = $oauthApiPage->getUserData();
        $oauthData = $oauthApiPage->getOauthData();

        $apiResp = $oauthApiPage->loginWithPasswordAction(
            $user['email'],
            $user['password'],
            $oauthData['client']['id'],
            $oauthData['client']['secret']
        );

        $data = $apiResp->fromJson();

        $this->assertEquals(200, $apiResp->getResponse()->getStatusCode());
        $this->assertObjectHasAttribute('access_token', $data);
        $this->assertObjectHasAttribute('refresh_token', $data);
    }

    public function testLogin_WrongPasswordIsGiven_ReturnInvalidGrantErrorAndHttpCode400()
    {
        $oauthApiPage = new OauthPage();
        $user = $oauthApiPage->getUserData();
        $oauthData = $oauthApiPage->getOauthData();

        $apiResp = $oauthApiPage->loginWithPasswordAction(
            $user['email'],
            time(),
            $oauthData['client']['id'],
            $oauthData['client']['secret']
        );

        $this->assertEquals(400, $apiResp->getResponse()->getStatusCode());
        $this->assertEquals('invalid_grant', $apiResp->fromJson(false)->error);
    }
    
}

