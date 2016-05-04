<?php
namespace Tests\Api\v1\pages;

class AccountPage extends BasePage {
    
    CONST URI_CHANGE_PASSWORD = '/api/v1/account/password/';
    CONST URI_CHANGE_PROFILE = '/api/v1/account/profile/';
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
            ->get(static::URI_CHANGE_PROFILE . '?access_token=' . $accessToken)
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
            'new_password' => $newPassword
        ];
        
        return $this->client()->put(static::URI_CHANGE_PASSWORD."?access_token=".$accessToken)
                ->withBody($data,'')
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

