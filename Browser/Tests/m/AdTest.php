<?php

namespace Tests\Browser\Tests\m;

use Tests\Pages\m\AdPage;
use Athena\Test\AthenaBrowserTestCase;
use Tests\Atlas\Sinon;

class AdTest extends AthenaBrowserTestCase
{
    CONST ELEMENT_TEXT_SUCCESS = 'Selamat! Iklan Anda telah disimpan';
            
    public function testPostAd_AsGuest_AllDataCorrect_ReturnSuccessPage()
    {
        $page = new AdPage(true);
        $page->open();
        $result = $page->postingAdAction(Sinon::generateEmail());
        $result->findAndAssertThat()->textEquals(static::ELEMENT_TEXT_SUCCESS)->elementWithXpath('//h3');
    }
}