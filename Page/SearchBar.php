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
    private $ID_SEARCH_BAR = 'js-field-search';
    private $SEARCH_BUTTON = 'submit';
    private $PILIH_LOKASI = '';
    private $ID_LOCATION_LIST = 'location-list__metro';

    public function open($url){}

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    private function getElementSearchBar(){
        return $this->getElement()->withId($this->ID_SEARCH_BAR);
    }

    private function getElementSearchButton(){
        return $this->getElementWithOther('type',$this->SEARCH_BUTTON);
    }

    private function getPilihLokasiButton(){
        return $this->getElement()->withId('');
    }

    private function getLokasi($index){
        return $this->getElement()->withXpath("//*[@id='location-list__metro']/li[".$index."]/a");
    }

    private function getElementLocationList(){
        return $this->getElement()->withId($this->ID_LOCATION_LIST);
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

    /**
     * @param $index
     */
    public function clickLokasi($index){
        //$this->waitLoacationListVisible();
        $this->getLokasi($index)->thenFind()->asHtmlElement()->click();
        $this->waitLocationListinVisible();
    }





}