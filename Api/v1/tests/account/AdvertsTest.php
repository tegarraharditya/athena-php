<?php
namespace Tests\Api\v1\tests\account;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\v1\pages\AdvertPage;

class AdvertsTest extends AthenaAPITestCase {
    
    /**
     * @expectedExceptionCode 401
     */
    public function testAdverts_createAsUserUnloggedAndDataIsCorrect_returnHttpStatus401()
    {
        $adPage = new AdvertPage();
        $adPage->createAdvertAction($adPage->getSampleAdvertData(), '');
    }
    
    public function testAdvertsCreate_UserIsLoggedAndDataIsCorrect_ReturnHttpStatus201()
    {
        $accAdPage  = new AdvertPage();
        $advertResp = $accAdPage->createAdvertAction($accAdPage->getSampleAdvertData(), $accAdPage->getAccessToken());

        $this->assertEquals(201, $advertResp->getResponse()->getStatusCode());
    }
    
    public function testAdvertsCreate_UserIsLoggedAndLocationIsMissing_ReturnFieldErrorAndHttpCode400()
    {
        $accAdPage  = new AdvertPage();
        $errorsResp = $accAdPage->createAdvertAndReturnErrors($accAdPage->getSampleAdvertDataWithoutLocation(), $accAdPage->getAccessToken());

        $errorsList = $errorsResp->fromJson();
        $this->assertArrayHasKey('error', $errorsList);

        $errorDetails = $errorsList['error']['details'];
        $this->assertEquals(400, $errorsResp->getResponse()->getStatusCode());
        $this->assertArrayHasKey('region_id', $errorDetails);
        $this->assertArrayHasKey('subregion_id', $errorDetails);
    }
    
    public function testAdvertsCreate_UserIsLoggedAndCategoryIsMissing_ReturnFieldErrorAndHttpCode400()
    {
        $accAdPage  = new AdvertPage();
        $errorsResp = $accAdPage->createAdvertAndReturnErrors($accAdPage->getSampleAdvertDataWithoutCategory(), $accAdPage->getAccessToken());

        $this->assertEquals(400, $errorsResp->getResponse()->getStatusCode());
        
        $errorsList = $errorsResp->fromJson();
        $this->assertArrayHasKey('error', $errorsList);
        
        $errorDetails = $errorsList['error']['details'];
        $this->assertArrayHasKey('category_id', $errorDetails);
    }
    
    public function testAdvertsModify_IdIsGivenAndTitleAndDescriptionModified_ReturnJsonWithModifiedDataAndHttp200()
    {
        $this->markTestSkipped("Fixing...");
        $accAdPage  = new AdvertPage();
        $user       = $accAdPage->getUserData();
        $expectedAd = $accAdPage->getNewAdvertWithProperStructureForRequest($user['id']);

        $expectedAd['title'] = trim(str_shuffle($expectedAd['title']));
        $expectedAd['description'] = trim(str_shuffle($expectedAd['description']));

        $advertResp = $accAdPage->modifyAdvertWithIdAction($expectedAd['id'], $expectedAd, $accAdPage->getAccessToken());

        $actualAd = $advertResp->fromJson();

        $this->assertEquals(200, $advertResp->getResponse()->getStatusCode());
        
        $this->assertAttributeEquals($expectedAd, 'title', $actualAd);
        $this->assertAttributeEquals($expectedAd, 'description', $actualAd);
    }
    
    public function testAdvertsModify_IdIsGivenAndModifiedCityIdIsWrong_ReturnJsonWithFieldErrorAndHttpCode400()
    {
        $this->markTestSkipped("Fixing...");
        $accAdPage = new AdvertPage();
        $user  = $accAdPage->getUserData();
        $token = $accAdPage->getAccessToken();

        $ad = $accAdPage->getNewAdvertWithProperStructureForRequest($user['id']);
        $ad['city_id'] = 'bad_string';

        $advertResp = $accAdPage->modifyAdvertWithIdAction($ad['id'], $ad, $token);
        $this->assertEquals(400, $advertResp->getResponse()->getStatusCode());

        $errorsObj = $advertResp->fromJson();

        
        $this->assertObjectHasAttribute('error', $errorsObj);
        $this->assertObjectHasAttribute('details', $errorsObj->error);
        $this->assertObjectHasAttribute('city_id', $errorsObj->error->details);
    }
    
    /**
     * TODO fix atlas response to give back a 400 or 404
     */
    public function testAdvertsModify_WrongIdIsGiven_ReturnHttpCode503()
    {
        $this->markTestSkipped("Fixing..");
        $pageObj = new AdvertPage();
        $advert  = $pageObj->getSampleAdvertData();

        $advertResp = $pageObj->modifyAdvertWithIdAction(time(), $advert, $pageObj->getAccessToken(), false);

        $this->assertEquals(503, $advertResp->getResponse()->getStatusCode());
    }
    
}