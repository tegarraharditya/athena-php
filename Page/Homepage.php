<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/4/16
 * Time: 10:47 AM
 */

namespace Tests\Page;


class Homepage extends AbstractPage
{
    public function open()
    {
        // TODO: Implement open() method.
        $this->getBrowser()->get('/');
    }

    public function verifyPage(){
        \PHPUnit_Framework_Assert::assertEquals('OLX.co.id - Cara Tepat Jual Cepat',$this->getBrowser()->getTitle());
    }

}