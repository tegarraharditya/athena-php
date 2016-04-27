<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/22/16
 * Time: 2:01 PM
 */

namespace Tests\Browser\Tests\desktop\Oneweb;


use Athena\Test\AthenaAPITestCase;
use Athena\Test\AthenaBrowserTestCase;
use Tests\Tracker\LeanTesting;
use Tests\Atlas\Sinon2;
use Tests\Pages\bdd\Homepage;


class DummyTest extends  AthenaBrowserTestCase
{
    public function testCoba(){
       $test = new LeanTesting('13466');
        $hasil2 = $test->getBugTypeScheme();
        var_dump('bug type');
        var_dump($hasil2);
    }
}