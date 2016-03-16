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

    public function open(){}

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    public function getElementSearchBar(){
        return $this->getElement()->withId($this->ID_SEARCH_BAR);
    }

    public function getElementSearchButton(){
        return $this->getElementWithOther('type',$this->SEARCH_BUTTON);
    }

    public function getPilihLokasiButton(){
        return $this->getElement()->withId('');
    }

    public function getLokasi(){
        return $this->getElement()->withId('');
    }

    public function getElementLocationList(){
        return $this->getElement()->withId($this->ID_LOCATION_LIST);
    }

    public function typeKeyword($keyword){
        $this->getElementSearchBar()->thenFind()->asHtmlElement()->sendKeys($keyword);
    }

    public function clickSearchButton(){
        $this->getElementSearchButton()->thenFind()->asHtmlElement()->click();
    }

    public function waitLoacationListVisible(){
        $this->getElementLocationList()->wait(5)->toBeVisible();
    }

    public function clickLokasi(){
        $this->getLokasi()->thenFind()->asHtmlElement()->click();
    }



}