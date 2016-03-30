<?php

namespace Tests\Api\open\tests\account;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\open\pages\AccountPage;

class PasswordTest extends AthenaAPITestCase {
    
    
    /**
     * @expectedException GuzzleHttp\Exception\ClientException
     * @expectedExceptionCode 403
     */
    public function testAccountPassword_changePasswordWrongOldPassword_shouldReturn403HttpCode()
    {
        $page = new AccountPage();
        $page->changePasswordAction('123456','123456', $page->getAccessToken());
    }
    
    public function testAccountPassword_changePasswordCorrectOldPassword_shouldReturn200HttpCode()
    {   
        $page = new AccountPage();
        $result = $page->changePasswordAction($page->getUserData()['password'],'123456', $page->getAccessToken());
        $this->assertArrayHasKey('result', $result);
        $this->assertEquals($result['result'], 'OK');
    }
}