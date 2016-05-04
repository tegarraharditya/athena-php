<?php
namespace Tests\Api\v1\tests\plugin;

use Athena\Test\AthenaAPITestCase;
use \Tests\Api\v1\pages\PhoneVerifyPage;

class PhoneVerifyTest extends AthenaAPITestCase {
    
    public function testVerifyPhone_newPhoneNumber_inputCorrectToken_verifySucceed()
    {
        $phone_verify = new PhoneVerifyPage();
        $phone_num = $phone_verify->generatePhoneNumber();
        var_dump($phone_verify->requestToken($phone_num)->fromJson());
        $token = $phone_verify->getTokenFromSinon($phone_num);
        
        $result = $phone_verify->verifyPhoneNumber($phone_num, $token['sms_token'])->fromJson();
        $this->assertArrayHasKey('reason', $result);
        $this->assertEquals($result['reason'], 'Success');
        $this->assertEquals($result['status'], 6);
    }
    
    public function testVerifyPhone_newPhoneNumber_inputWrongToken_verifyFailed()
    {
        $phone_verify = new PhoneVerifyPage();
        $phone_num = $phone_verify->generatePhoneNumber();
        var_dump($phone_verify->requestToken($phone_num)->fromJson());
        $token = $phone_verify->getTokenFromSinon($phone_num);
        $stoken = str_shuffle($token['sms_token']);
        
        $result = $phone_verify->verifyPhoneNumber($phone_num, $stoken)->fromJson();
        
        $this->assertArrayHasKey('reason', $result);
        $this->assertEquals($result['reason'], 'Failed');
        $this->assertEquals($result['status'], 7);
    }
    
    public function testVerifyPhone_existingPhoneNumberTwice_inputFirstToken_verifyFailed()
    {
        $phone_verify = new PhoneVerifyPage();
        $phone_num = $phone_verify->generatePhoneNumber();
        var_dump($phone_verify->requestToken($phone_num)->fromJson());
        $token = $phone_verify->getTokenFromSinon($phone_num);
        $phone_verify->requestToken($phone_num);
        
        $result = $phone_verify->verifyPhoneNumber($phone_num, $token['sms_token'])->fromJson();
        
        $this->assertArrayHasKey('reason', $result);
        $this->assertEquals($result['reason'], 'Failed');
        $this->assertEquals($result['status'], 7);
        
    }
    
    public function testVerifyPhone_existingPhoneNumberTwice_inputLastToken_verifySucceed()
    {
        $phone_verify = new PhoneVerifyPage();
        $phone_num = $phone_verify->generatePhoneNumber();
        $phone_verify->requestToken($phone_num);
        var_dump($phone_verify->requestToken($phone_num)->fromJson());
        $token = $phone_verify->getTokenFromSinon($phone_num);
        
        $result = $phone_verify->verifyPhoneNumber($phone_num, $token['sms_token'])->fromJson();
        
        $this->assertArrayHasKey('reason', $result);
        $this->assertEquals($result['reason'], 'Success');
        $this->assertEquals($result['status'], 6);
    }
    
    public function testVerifyPhone_verifiedPhoneNumber_verifySucceed()
    {
        $phone_verify = new PhoneVerifyPage();
        $phone_num = $phone_verify->generatePhoneNumber();
        var_dump($phone_verify->requestToken($phone_num)->fromJson());
        $token = $phone_verify->getTokenFromSinon($phone_num);
        $phone_verify->verifyPhoneNumber($phone_num, $token['sms_token'])->fromJson();
        $result = $phone_verify->isVerified($phone_num)->fromJson();
        
        $this->assertArrayHasKey('reason', $result);
        $this->assertEquals($result['reason'], 'Verified');
        $this->assertEquals($result['status'], 1);
    }
    
    
    public function testVerifyPhone_unverifiedPhoneNumber_verifyFailed()
    {
        $phone_verify = new PhoneVerifyPage();
        $phone_num = $phone_verify->generatePhoneNumber();
        $result = $phone_verify->isVerified($phone_num)->fromJson();
        
        $this->assertArrayHasKey('reason', $result);
        $this->assertEquals($result['reason'], 'Unverified');
        $this->assertEquals($result['status'], 0);
    }
    
    public function thisIsNotATestCase()
    {
        for ($i=0; $i < 10; $i++)
        {
            echo PhoneVerifyPage::generatePhoneNumber()."\r\n";
        }
    }
}