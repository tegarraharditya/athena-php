<?php

namespace Tests\Pages\m;

use Athena\Page\AbstractPage;
use Athena\Athena;

class AdPage extends AbstractPage
{
    CONST ELEMENT_INPUT_PERSON = 'data[person]';
    CONST ELEMENT_INPUT_EMAIL = 'data[email]';
    CONST ELEMENT_INPUT_PHONE = 'data[phone]';
    CONST ELEMENT_INPUT_TITLE = 'data[title]';
    CONST ELEMENT_INPUT_DESCRIPTION = 'data[description]';
    CONST ELEMENT_INPUT_PRICE = 'data[param_price][1]';
    
    CONST ELEMENT_BUTTON_NEXT = '//input[contains(@value,"Selanjutnya")]';
    CONST ELEMENT_BUTTON_SAVE = '//input[contains(@value,"Simpan")]';
    
    CONST ELEMENT_FORM_LOCATION = 'addingformlocation';
    CONST ELEMENT_FORM_DETAILS = 'addingformdetails';
    
    CONST ELEMENT_OPTION_REGION = 'region%s';
    CONST ELEMENT_OPTION_DISTRICT = 'district%s';
    CONST ELEMENT_OPTION_CATEGORY = '//a[contains(@href,"category_id=%s")]';
    CONST ELEMENT_OPTION_ANY = '//option[@value="%s"]';
    
    CONST ELEMENT_SELECT_CATEGORY = '.choose-category';
    CONST ELEMENT_SELECT_CONDITION = 'parameter-condition';
    
    CONST TIMEOUT = 10;
    private $condition = ['baru','bekas'];
    
    public function __construct() 
    {
        parent::__construct(Athena::browser(), 'posting');
    }
    
    public function postingAdAction($mail = 'random@email.com')
    {
        $this->fillDetails();
        $this->fillLocations();
        $this->page()->wait(static::TIMEOUT)->untilVisibilityOf()->elementWithName(static::ELEMENT_INPUT_PERSON);
        $this->page()->find()->elementWithName(static::ELEMENT_INPUT_PERSON)->sendKeys('random user');
        $this->page()->find()->elementWithName(static::ELEMENT_INPUT_EMAIL)->sendKeys($mail);
        $this->page()->find()->elementWithName(static::ELEMENT_INPUT_PHONE)->sendKeys('0'.$this->randomText(10, true));
        $this->page()->find()->elementWithXpath(static::ELEMENT_BUTTON_NEXT)->click();
        $this->page()->wait(static::TIMEOUT)->untilVisibilityOf(static::ELEMENT_BUTTON_SAVE)->elementWithXpath(static::ELEMENT_BUTTON_SAVE);
        $this->page()->find()->elementWithXpath(static::ELEMENT_BUTTON_SAVE)->click();
        return $this->page();
    }
    
    private function fillLocations()
    {
        $location = [
            'region' => 4,
            'district' => 73
        ];
        $this->page()->wait(static::TIMEOUT)->elementsWithId(static::ELEMENT_FORM_LOCATION);
        $this->page()->find()->elementWithId(sprintf(static::ELEMENT_OPTION_REGION, $location['region']))->click();
        $this->page()->find()->elementWithXpath(static::ELEMENT_BUTTON_NEXT)->click();
        $this->page()->wait(static::TIMEOUT)->elementsWithId(static::ELEMENT_FORM_LOCATION);
        $this->page()->find()->elementWithId(sprintf(static::ELEMENT_OPTION_DISTRICT, $location['district']))->click();
        $this->page()->find()->elementWithXpath(static::ELEMENT_BUTTON_NEXT)->click();
    }
    
    private function fillDetails()
    {
        $category = [98,229,5100];
        $rand_key = array_rand($this->condition);
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementsWithCss(static::ELEMENT_SELECT_CATEGORY);
        $this->page()->find()->elementWithXpath(sprintf(static::ELEMENT_OPTION_CATEGORY, $category[0]))->click();
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementsWithCss(static::ELEMENT_SELECT_CATEGORY);
        $this->page()->find()->elementWithXpath(sprintf(static::ELEMENT_OPTION_CATEGORY, $category[1]))->click();
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementsWithCss(static::ELEMENT_SELECT_CATEGORY);
        $this->page()->find()->elementWithXpath(sprintf(static::ELEMENT_OPTION_CATEGORY, $category[2]))->click();
        $this->page()->wait(static::TIMEOUT)->elementsWithId(static::ELEMENT_FORM_DETAILS);
        $this->page()->find()->elementWithName(static::ELEMENT_INPUT_TITLE)->sendKeys('Random title with '.$this->randomText());
        $this->page()->find()->elementWithName(static::ELEMENT_INPUT_DESCRIPTION)->sendKeys('Random description with '.$this->randomText(300));
        $this->page()->find()->elementWithName(static::ELEMENT_INPUT_PRICE)->sendKeys($this->randomText(6, true));
        $this->page()->find()->elementWithId(static::ELEMENT_SELECT_CONDITION)->click();
        $this->page()->find()->elementWithXpath(sprintf(static::ELEMENT_OPTION_ANY, $this->condition[$rand_key]))->click();
        $this->page()->find()->elementWithXpath(static::ELEMENT_BUTTON_NEXT)->click();
    }
    
    public function randomText($length = 15, $numOnly = false) 
    {
        $possibleChars = "1234567890";
        if(!$numOnly)
        {
            $possibleChars .= " abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ ";
        }
        $text = '';

        for($i = 0; $i < $length; $i++) {
            $rand = rand(0, strlen($possibleChars) - 1);
            $text .= substr($possibleChars, $rand, 1);
        }

        return $text;
    }
    
}