<?php

namespace Tests\Api\open\pages;

use Tests\Atlas\Sinon;
use Athena\Page\BaseApiPage;

class BasePage extends BaseApiPage {
    
    private $accessToken;
    private $user;
    private $oauthData;
    
    public function __construct() {
        parent::__construct();
        if (empty($this->accessToken))
        {
            $rdata = (new Sinon())->createUserWithOAuthToken();
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
}