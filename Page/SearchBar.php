<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 11:48 AM
 */

namespace Tests\Page;


use Facebook\WebDriver\WebDriverKeys;

class SearchBar extends OneWeb
{
    private $ID_SEARCH_BAR = 'js-field-search';
    private $SEARCH_BUTTON = 'submit';
    private $ID_PILIH_LOKASI = '';
    private $ID_LOCATION_LIST = 'location-list__metro';
    private $XPATH_PILIH_LOKASI = './/*[@id=\'main-search__form\']/div/div/div[2]/a';
    private $XPATH_SEARCH_BUTTON = './/*[@id=\'main-search__form\']/div/div/div[3]/a';

    public function __construct()
    {
        parent::__construct('search');
    }

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    private function getElementSearchBar(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_SEARCH_BAR);
    }

    private function getElementSearchButton(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withXpath($this->XPATH_SEARCH_BUTTON);
    }

    private function getPilihLokasiButton(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withXpath($this->XPATH_PILIH_LOKASI);
    }

    private function getLokasi($index){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath("//*[@id='location-list__metro']/li[".$index."]/a");
    }

    private function getElementLocationList(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_LOCATION_LIST);
    }

    public function typeKeyword($keyword){
        $this->getElementSearchBar()->thenFind()->asHtmlElement()->sendKeys($keyword);
    }

    public function clickSearchButton(){
        $this->getElementSearchButton()->thenFind()->asHtmlElement()->click();
    }

    public function clickPilihLokasiButton(){
        $this->getPilihLokasiButton()->thenFind()->asHtmlElement()->click();
        $this->waitLoacationListVisible();
    }

    private function waitLoacationListVisible(){
        $this->getElementLocationList()->wait(5)->toBeVisible();
    }

    private function waitLocationListinVisible(){
        $this->getElementLocationList()->wait(5)->toBeInvisible();
    }

    public function pressEnter(){
        $this->getElementSearchBar()->thenFind()->asHtmlElement()->sendKeys(WebDriverKeys::ENTER);
    }

    /**
     * @param $index
     */
    public function clickLokasi($index){
        $this->getLokasi($index)->thenFind()->asHtmlElement()->click();
        $this->waitLocationListinVisible();
    }





}