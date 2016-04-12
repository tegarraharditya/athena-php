<?php

namespace Tests\Api\v1\pages;

use Tests\Atlas\Sinon;

class OauthPage extends BasePage {

    const ENDPOINT = '/api/v1/oauth/token/';
    const GRANT_TYPE_PASSWORD = 'password';
    const GRANT_TYPE_DEVICE = 'device';
    const GRANT_TYPE_PARTNER = 'partner';
    const GRANT_TYPE_REFRESH = 'refresh_token';


    /**
     * Login as a user.
     *
     * @param string $username     User identication
     * @param string $password     User password
     * @param string $clientId     API request authentication identification
     * @param string $clientSecret API request authentication secret
     *
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function loginWithPasswordAction($username, $password, $clientId, $clientSecret)
    {
        return $this->client()
            ->post(self::ENDPOINT)
            ->withOption('exceptions', FALSE)
            ->withBasicAuth($clientId, $clientSecret)
            ->withBody([
                'grant_type' => self::GRANT_TYPE_PASSWORD,
                'username'   => $username,
                'password' => $password
            ],'')
            ->then()
            ->retrieve();
    }

    /**
     * Login as a device anonymous user.
     *
     * @param string $deviceId Mobile device ID
     * @param string $deviceToken Mobile device verification token
     * @param array $client API Client
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function loginWithDeviceIdAction($deviceId, $deviceToken, $client)
    {
        return $this->client()
            ->post(self::ENDPOINT)
            ->withOption('exceptions', FALSE)
            ->withBasicAuth($client['id'], $client['secret'])
            ->withBody([
                'grant_type' => self::GRANT_TYPE_DEVICE,
                'device_id'   => $deviceId,
                'device_token' => $deviceToken
            ],'')
            ->then()
            ->retrieve();
    }

    /**
     * Login as an API partner
     *
     * @param string $partnerCode unique partner code identifier
     * @param string $partnerSecret partner secret key/code
     * @param array $client API Client
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function loginWithPartnerCodeAction($partnerCode, $partnerSecret, $client)
    {
        return $this->client()
            ->post(self::ENDPOINT)
            ->withOption('exceptions', FALSE)
            ->withBasicAuth($client['id'], $client['secret'])
            ->withBody([
                'grant_type' => self::GRANT_TYPE_PARTNER,
                'partner_code'   => $partnerCode,
                'partner_secret' => $partnerSecret
            ],'')
            ->then()
            ->retrieve();
    }

    /**
     * Login as an API partner
     *
     * @param string $refreshToken refresh token
     * @param array $client API Client
     * @return ActionResponse
     * @throws \runner\athena\AutomationException
     */
    public function refreshTokenAction($refreshToken, $client)
    {
        return $this->client()
            ->post(self::ENDPOINT)
            ->withOption('exceptions', FALSE)
            ->withBasicAuth($client['id'], $client['secret'])
            ->withBody([
                'grant_type' => self::GRANT_TYPE_REFRESH,
                'refresh_token'   => $refreshToken,
            ],'')
            ->then()
            ->retrieve();
    }
    
    /** Sinon Action **/
    public function getFromSinonOAuthClientData()
    {
        return (new Sinon($this->getModule()))->oAuthClientData();
    }
    
    public function getFromSinonApiPartner()
    {
        return (new Sinon($this->getModule()))->createApiPartner();
    }
    
}
