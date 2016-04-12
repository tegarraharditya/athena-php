<?php

namespace Tests\Api\v1\pages;

use Tests\Atlas\Sinon;
use Athena\Page\BaseApiPage;

class BasePage extends BaseApiPage {
    
    private $module = "api_v1";
    private $accessToken;
    private $user;
    private $oauthData;
    
    public function __construct() {
        parent::__construct();
        if (empty($this->accessToken))
        {
            $rdata = (new Sinon($this->module))->createUserWithOAuthToken();
            $oauth_data = $rdata['oauth'];
            $tokens = $oauth_data['tokens'];
            $this->accessToken = $tokens['access_token'];
            $this->user = $rdata['user'];
            $this->oauthData = $oauth_data;
        }
    }
    
    public function getAccessToken()
    {
        return $this->accessToken;
    }
    
    public function getUserData()
    {
        return $this->user;
    }
    
    public function getOauthData()
    {
        return $this->oauthData;
    }
    
    public function getModule()
    {
        return $this->module;
    }
}