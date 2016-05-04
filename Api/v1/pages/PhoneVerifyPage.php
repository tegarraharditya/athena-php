<?php

namespace Tests\Api\v1\pages;

use Tests\Atlas\Sinon;

class PhoneVerifyPage extends BasePage {
    
    private $token;
    private $user;
    private static $valid_phones = [
                                '628123456789',
                                '628134567890',
                                '628112233445',
                                '628156789101',
                                '628167891011',
                                '628178910111',
                                '628189101112',
                                '628567891011',
                                '628578910111',
                                '628589101112',
                                '628789101112',
                                '628212345678',
                                '628234567891'
                            ];
    
    public function __construct() 
    {
        parent::__construct();
        $this->token = $this->getAccessToken();
        $this->user = $this->getUserData();
    }
    
    /**
     * Check if phone number already verified
     * @param string $phone  String in mobile phone number format
     * 
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function isVerified($phone = '')
    {
        $data = [
               'user_id' => $this->user['id'],
                'mobile_phone_number' => $phone
            ];
        
        return $this->client()
                ->post('/api/v1/phone/isverified/?access_token=' . $this->token)
                ->withBody($data, '')
                ->then()
                ->retrieve();
    }
    
    /**
     * Request token to verify specific mobile phone number
     * @param string $phone  String in mobile phone number format
     * 
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function requestToken($phone = '')
    {
        $data = [
               'user_id' => $this->user['id'],
                'mobile_phone_number' => $phone
            ];
        
        return $this->client()
                ->post('/api/v1/phone/requestToken/?access_token=' . $this->token)
                ->withBody($data, '')
                ->then()
                ->retrieve();
    }
    
    /**
     * Verify phone number with requested SMS Token
     * @param string $phone  String in mobile phone number format
     * @param int    $token  Token with 4 Digit integer 
     * 
     * @return \Athena\Api\Response\ResponseFormatter
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function verifyPhoneNumber($phone = '', $token = 0000)
    {
        $data = [
            'mobile_phone_number' => $phone,
            'sms_token' => $token,
            'user_id' => $this->user['id']
        ];
        
        return $this->client()
                ->post('/api/v1/phone/verify/?access_token=' . $this->token)
                ->withBody($data, '')
                ->then()
                ->retrieve();
    }
    
    /** Sinon Action **/
    public function getTokenFromSinon($phone)
    {
        return (new Sinon($this->getModule()))->getSmsToken($phone, $this->user['id']);
    }
    
    public static function generatePhoneNumber() 
    {
        shuffle(self::$valid_phones);
        return array_pop(self::$valid_phones);
    }
}
