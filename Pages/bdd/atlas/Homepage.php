<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 5/4/16
 * Time: 12:00 PM
 */

namespace Tests\Pages\bdd\atlas;


use Athena\Athena;
use Athena\Page\AbstractPage;

class Homepage extends AbstractPage
{
    public function __construct()
    {
        parent::__construct(Athena::browser(),'/');
    }

    public function verifyHomepage(){
        \PHPUnit_Framework_Assert::assertEquals("OLX.co.id - Cara Tepat Jual Cepat",$this->getBrowser()->getTitle());
    }

}