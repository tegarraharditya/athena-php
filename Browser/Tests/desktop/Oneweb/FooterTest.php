<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/21/16
 * Time: 10:56 AM
 */

namespace Tests\Browser\Tests\desktop\Oneweb;


use Athena\Test\AthenaBrowserTestCase;
use Tests\Pages\bdd\Footer;

class FooterTest extends AthenaBrowserTestCase
{
    public function testVerifyFooterLink_ListFooterLink_VerifiedAndNotBroken(){
        $footer = new Footer();
        $footer->verifyAllFooterLink();
        $footer->verifyAllLinkNotBroken();
    }
}