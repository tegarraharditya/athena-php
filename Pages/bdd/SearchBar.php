<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 11:48 AM
 */

namespace Tests\Pages\bdd;


use Athena\Athena;
use Facebook\WebDriver\WebDriverKeys;

class SearchBar extends OneWeb
{
    private $ID_SEARCH_BAR = 'js-field-search';
    private $ID_SEARCH_BUTTON = 'btn-submit-search';
    private $ID_PILIH_LOKASI = 'btn-location-head';
    private $ID_LOCATION_LIST = 'location-list__metro';

    public function __construct()
    {
        parent::__construct(Athena::browser(),'/');
    }

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    private function getElementSearchBar(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_SEARCH_BAR);
    }

    private function getElementSearchButton(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_SEARCH_BUTTON);
    }

    private function getPilihLokasiButton(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_PILIH_LOKASI);
    }

    private function getLokasi($index){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath(".//*[@class='inner is-active']//*[@id='location-list__metro']/li[".$index."]/a");
    }

    private function getElementLocationList(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_LOCATION_LIST);
    }

    public function typeKeyword($keyword){
        $this->getElementSearchBar()->thenFind()->asHtmlElement()->sendKeys($keyword);
    }

    public function clickSearchButton(){
        $this->getElementSearchButton()->thenFind()->asHtmlElement()->click();
        return new SearchResult(Athena::browser());
    }

    public function clickPilihLokasiButton(){
        $this->getPilihLokasiButton()->thenFind()->asHtmlElement()->click();
        $this->waitLoacationListVisible();
    }

    public function waitLoacationListVisible(){
        $this->getElementLocationList()->wait(5)->toBeVisible();
    }

    public function waitLocationListinVisible(){
        $this->getElementLocationList()->wait(5)->toBeInvisible();
    }

    public function pressEnter(){
        $this->getElementSearchBar()->thenFind()->asHtmlElement()->sendKeys(WebDriverKeys::ENTER);
        return new SearchResult();
    }

    public function clickLokasiProvince($index){
        $this->getLokasi($index)->wait(3)->toBeVisible();
        $this->getLokasi($index)->thenFind()->asHtmlElement()->click();
    }

    public function clickLokasiCity($index){
        $this->getLokasi($index)->wait(3)->toBeVisible();
        $this->getLokasi($index)->thenFind()->asHtmlElement()->click();
        return new SearchResult(Athena::browser());
    }

    public function getCityNameFromIndex($index){
        $element = $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath('.//*[@class=\'inner is-active\']//*[@id=\'location-list__metro\']/li['.$index.']/a/div/p');
        return $element->thenFind()->asHtmlElement()->getText();
    }

}