<?php

namespace Tests\Browser\Tests\desktop;

use Tests\Atlas\Sinon;
use Tests\Pages\desktop\AdPage;
use Athena\Athena;
use Athena\Test\AthenaBrowserTestCase;

class HomePageTest extends AthenaBrowserTestCase
{
    
    CONST ELEMENT_INPUT_SEARCH = 'headerSearch';
    CONST ELEMENT_INPUT_CITY = 'cityField';
    CONST ELEMENT_BUTTON_SEARCH = 'submit-searchmain';
    CONST ELEMENT_CONTAINER_ADS = 'tabs-container';
    CONST ELEMENT_LINK_OBSERVER = '.observelinkinfo';
    CONST ELEMENT_BOX_DETAIL = '.detailcloudbox';
    CONST ELEMENT_ROW_AD = '.offer';
    CONST TIMEOUT = 10;
    
    public function testSearch_byKeyword_shouldReturnAtLeastOneAdInResultTable()
    {
        $randomTitleText = (new AdPage())->randomText();
        $bind = [
            'title' => 'Random title with '. $randomTitleText,
            'description' => 'Random description with '.(new AdPage())->randomText(300)
        ];
        (new Sinon())->createAd($bind);
        
        $page = Athena::browser()->get('/');
        $page->find()->elementWithId(static::ELEMENT_INPUT_SEARCH)->sendKeys($bind['title']);
        $page->find()->elementWithId(static::ELEMENT_BUTTON_SEARCH)->click();
        $page->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_CONTAINER_ADS);
        $page->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(static::ELEMENT_LINK_OBSERVER);
        $page->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(static::ELEMENT_BOX_DETAIL);
    }
}
