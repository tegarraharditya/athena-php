<?php

namespace Tests\Browser\Tests\desktop;

use Athena\Test\AthenaBrowserTestCase;
use Tests\Pages\desktop\AdPage;

class HomePageTest extends AthenaBrowserTestCase
{
    
    public function testSearch_byKeyword_shouldReturnAtLeastOneAdInResultTable()
    {
        $I = new AdPage();
        $I->prepareAdData();
        $createdAd = $I->createAdThroughStubInDatabase();
        $I->openPage('/');
        $I->doSearchByFillingKeywordBoxWith($createdAd['ad']['title']);
        $I->clickSearchButton();
        $I->seeInListAtLeastOneResult();
    }
}
