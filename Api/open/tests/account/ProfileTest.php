<?php
namespace Tests\Api\open\tests\account;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\open\pages\AccountPage;

class ProfileTest extends AthenaAPITestCase {
    
    public function testAccountProfile_UserIsLoggedInAndDataIsCorrect_ReturnJsonAndHttpCode200()
    {
        // arrange
        $accPage = new AccountPage();
        $user = $accPage->getUserData();
        
        //act
        $profileJson = $accPage->getProfile($accPage->getAccessToken());

        // assert
        $this->assertAttributeEquals($user['id'], 'id', $profileJson->fromJson(false));
        $this->assertEquals(200, $profileJson->getResponse()->getStatusCode());
    }

    /**
     * @expectedExceptionCode 401
     */
    public function testAccountProfile_UserIsNotLoggedAndDataIsCorrect_ReturnHttpCode401()
    {
        // act
        $page = new AccountPage();
        $page->getProfile(null);
        
    }
    
}