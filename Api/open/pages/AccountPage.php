<?php
namespace Tests\Api\open\pages;

class AccountPage extends BasePage {
    
    CONST URI_CHANGE_PASSWORD = '/api/open/account/password';
    CONST URI_CREATE_AD = '';
    
    
    private $accessToken;
    
    public function __construct() 
    {
        parent::__construct();
        $this->accessToken = $this->getAccessToken();
    }
    
    /**
     * Retrieve current authorized user profile data.
     *
     * @param string $accessToken Request authentication token
     *
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function getProfile($accessToken)
    {
        return $this->client()
            ->get('/api/open/account/profile?access_token=' . $accessToken)
            ->then()
            ->retrieve();
    }
    
    /**
     * Change user password.
     *
     * @param string $oldPassword Old password
     * @param string $newPassword New password
     * @param string $accessToken Request authentication token
     *
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function changePasswordAction($oldPassword = '', $newPassword = '', $accessToken = '')
    {
        $data = [
            'old_password' => $oldPassword,
            'new_password' => $newPassword,
            'access_token' => $accessToken
        ];
        
        return $this->client()->put(static::URI_CHANGE_PASSWORD)
                ->withParameters($data)
                ->then()
                ->retrieve()
                ->fromJson();
    }
    
    public function setAccessToken($token = '')
    {
        if(!empty($token))
        {
            $this->accessToken = $token;
        }
    }
}

