<?php

namespace Tests\Browser\Tests\m;

use Tests\Pages\m\AdPage;
use Athena\Test\AthenaBrowserTestCase;

class AdTest extends AthenaBrowserTestCase
{
    CONST ELEMENT_TEXT_SUCCESS = 'Selamat! Iklan Anda telah disimpan';
            
    public function testPostAd_AsGuest_AllDataCorrect_ReturnSuccessPage()
    {
        $page = new AdPage();
        $result = $page->postingAdAction(User::generateEmail());
        $result->findAndAssertThat()->textEquals(static::ELEMENT_TEXT_SUCCESS)->elementWithXpath('//h3');
    }
}