<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/4/16
 * Time: 10:47 AM
 */

namespace Tests\Page;


use Athena\Athena;

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

    private function getElementCategoryById($id){
        return $this->getElement()->withId($id);
    }

    public function clickElementLevel2($level2){
        $this->getElementCategoryById($level2)->thenFind()->asHtmlElement()->click();
        return new Listings(Athena::browser());
    }

    public function clickElementLevel1($level1){
        $this->getElementCategoryById($level1)->thenFind()->asHtmlElement()->click();
    }


}