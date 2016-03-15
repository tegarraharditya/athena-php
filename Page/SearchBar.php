<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 11:48 AM
 */

namespace Tests\Page;


class SearchBar extends AbstractPage
{
    private $SEARCH_BAR = '';
    private $SEARCH_BUTTON = '';

    public function open(){}

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    public function getElementSearchBar(){
        return $this->getElement()->withXpath($this->SEARCH_BAR);
    }

    public function getElementSearchButton(){
        return $this->getElement()->withXpath($this->SEARCH_BUTTON);
    }

    public function typeKeyword($keyword){
        $this->getElementSearchBar()->thenFind()->asHtmlElement()->sendKeys($keyword);
    }

    public function clickSearchButton(){
        $this->getElementSearchButton()->thenFind()->asHtmlElement()->click();
    }

}