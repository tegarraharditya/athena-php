<?php

namespace Tests\Browser\Tests\desktop;

use Tests\Pages\desktop\AdPage;
use Athena\Test\AthenaBrowserTestCase;

class AdTest extends AthenaBrowserTestCase
{  
    
    public function testPostAd_AsGuest_AllDataCorrect_ReturnSuccessPage()
    {
        $I = new AdPage();
        $I->openPage('posting');
        $I->fillAllDetailsInPostingAdWithEmail();
        $I->clickSubmitButton();
        $I->seePostAdSuccessPage();
    }
        
    public function testAdDetailPage_CreateActiveAdWithSinon_AdDetailPageAvailable()
    {
        $I = new AdPage();
        $I->prepareAdData();
        $createdAd = $I->createAdThroughStubInDatabase();
        $I->openPage($createdAd['url']);
        $I->seeSameDetailWithPreparedData();
    }
    
    public function testDeleteAd_CreateActiveAdWithSinon_DeleteCreatedAdSuccess()
    {
        $I = new AdPage();
        $createdAd = $I->createAdThroughStubInDatabase();
        $createdSession = $I->createSessionFrom($createdAd);
        $I->openPage('/');
        $I->setBrowserSessionWith($createdSession);
        $I->clickLoginLink();
        
        #inside page "Iklan Saya"
        $I->clickLinkDeleteForAd($createdAd);
        $I->chooseReasonForDeletingAd();
        $I->clickSubmitForDelete();
        $I->openPage('archive');
        $I->seeDeletedAdFrom($createdAd);
    }
    
    
}