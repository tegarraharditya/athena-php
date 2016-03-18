<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/4/16
 * Time: 10:47 AM
 */

namespace Tests\Page;


use Athena\Athena;
use Athena\Page\BasePage;

class Homepage extends OneWeb
{

    public function __construct()
    {
        parent::__construct('/');
    }

    public function verifyPage(){
        \PHPUnit_Framework_Assert::assertEquals('home',$this->getAttributeBodyPage());
    }

    private function getElementCategory($attribute,$value){
        return $this->getElementWithOther($attribute, $value);
    }

    private function getElementCategoryViewAll($id){
        //return $this->getElement()->withId($id);
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($id);
    }

    public function clickElementLevel2($level2){
        $this->getElementCategory('data-cat-name',$level2)->thenFind()->asHtmlElement()->click();
        return new Listings(Athena::browser());
    }

    public function clickElementLevel1($level1){
        $this->getElementCategory('data-cat-name', $level1)->thenFind()->asHtmlElement()->click();
    }

    public function clickElementCategoryViewAll($viewall){
        $this->getElementCategoryViewAll($viewall)->thenFind()->asHtmlElement()->click();
    }


}