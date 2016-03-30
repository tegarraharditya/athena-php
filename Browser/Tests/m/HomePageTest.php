<?php

namespace Tests\Browser\Tests\m;

use Tests\Atlas\Sinon;
use Athena\Athena;
use Tests\Pages\m\AdPage;
use Athena\Test\AthenaBrowserTestCase;

class HomePageTest extends AthenaBrowserTestCase
{
    CONST ELEMENT_INPUT_SEARCH = 'search_query';
    CONST ELEMENT_BUTTON_SEARCH = '.submit';
    CONST ELEMENT_WRAP_LISTING = 'bd';
    CONST ELEMENT_TEXT_TITLE = '.lt-title';
    CONST TIMEOUT = 10;

    public function testSearch_byKeyword_shouldReturnAtLeastOneAd()
    {
        $randomTitleText = (new AdPage())->randomText();
        $bind = [
            'title' => 'Random title with '. $randomTitleText,
            'description' => 'Random description with '.(new AdPage())->randomText(300)
        ];
        (new Sinon())->createAd($bind);
        
        $browser = Athena::browser();
        $browser->manage()->deleteAllCookies();
        $page = $browser->get('/');
        
        $page->find()->elementWithId(static::ELEMENT_INPUT_SEARCH)->sendKeys($bind['title']);
        $page->find()->elementWithCss(static::ELEMENT_BUTTON_SEARCH)->click();
        $page->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_WRAP_LISTING);
        $page->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(static::ELEMENT_TEXT_TITLE);
    }
}
