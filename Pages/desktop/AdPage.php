<?php

namespace Tests\Pages\desktop;

use Athena\Page\AbstractPage;
use Athena\Athena;

class AdPage extends AbstractPage
{
    
    CONST ELEMENT_INPUT_TITLE = 'add-title';
    CONST ELEMENT_INPUT_DESCRIPTION = 'add-description';
    CONST ELEMENT_INPUT_PERSON = 'add-person';
    CONST ELEMENT_INPUT_EMAIL = 'add-email';
    CONST ELEMENT_INPUT_PHONE = 'add-phone';
    CONST ELEMENT_INPUT_BBPIN = 'add-bb_pin';
    
    CONST ELEMENT_LINK_DEACTIVATE = '.deactivateme%s';
    CONST ELEMENT_LINK_REMOVE = '.remove4';
    CONST ELEMENT_LINK_LOGIN = 'topLoginLink';
    
    CONST ELEMENT_BUTTON_SUBMIT = 'save';
    CONST ELEMENT_BUTTON_DELETE = 'deleteButton';
    
    CONST ELEMENT_CHECK_EMAIL = '//label[@relname="data[contactform]"]';
    CONST ELEMENT_CHECK_WHATSAPP = '//label[@relname="data[whatsapp]"]';
    CONST ELEMENT_CHECK_ACCEPT = '//label[@relname="data[accept]"]';
    
    CONST ELEMENT_SELECT_CATEGORY = 'targetrenderSelect1-0';
    CONST ELEMENT_SELECT_CONDITION = 'a-param9';
    CONST ELEMENT_SELECT_REGION = 'a-region-id-select';
    CONST ELEMENT_SELECT_SUBREGION = 'a-subregion-id-select';
    
    CONST ELEMENT_OPTION_SUBREGION = 'subregion-id-select-%s';
    CONST ELEMENT_OPTION_REGION = 'region-id-select-%s';
    CONST ELEMENT_OPTION_CONDITION = 'param9-%s';
    CONST ELEMENT_OPTION_REMOVEREASON = 'reason-%s';
    
    CONST ELEMENT_RADIO_REMOVEREASON = '.removeReason';
    CONST ELEMENT_ROOT_CATEGORY = 'cat-%s';
    CONST ELEMENT_CHILD_CATEGORY = '//a[@data-category="%s"]';
    CONST ELEMENT_INPUT_PRICE = '//input[@name="data[param_price][1]"]';
    CONST ELEMENT_SUCCESSBOX = '.successbox';
    CONST ELEMENT_TEXT_DESCRIPTION = 'textContent';
    CONST ELEMENT_TABLE_ADS = 'adsTable';
    CONST TIMEOUT = 10;
    private $condition = ['baru', 'bekas'];
    
    public function __construct() 
    {
        parent::__construct(Athena::browser(), 'posting');
    }
    
    public function postingAdAction($email = "random@email.com")
    {   
        $rand_key = array_rand($this->condition);
    
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_TITLE)->sendKeys("Random title with ". $this->randomText());
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_DESCRIPTION)->sendKeys("Random description with ". $this->randomText(50));
        $this->setCategory(98, 231, 5114);
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithXpath(static::ELEMENT_INPUT_PRICE);
        $this->page()->find()->elementWithXpath(static::ELEMENT_INPUT_PRICE)->sendKeys($this->randomText(5, true));
        $this->page()->find()->elementWithId(static::ELEMENT_SELECT_CONDITION)->click();
        $this->page()->find()->elementWithId(sprintf(static::ELEMENT_OPTION_CONDITION, $this->condition[$rand_key]))->click();
        $this->page()->find()->elementWithId(static::ELEMENT_SELECT_REGION)->click();
        $this->page()->find()->elementWithId(sprintf(static::ELEMENT_OPTION_REGION, 7))->click();
        $this->page()->find()->elementWithId(static::ELEMENT_SELECT_SUBREGION)->click();
        $this->page()->find()->elementWithId(sprintf(static::ELEMENT_OPTION_SUBREGION, 29))->click();
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_PERSON)->sendKeys("random person ".$this->randomText(8));
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_EMAIL)->sendKeys($email);
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_PHONE)->sendKeys("0".$this->randomText(9, true));
        $this->page()->find()->elementWithXpath(static::ELEMENT_CHECK_ACCEPT)->click();
        $this->page()->find()->elementWithId(static::ELEMENT_BUTTON_SUBMIT)->click();
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithCss(static::ELEMENT_SUCCESSBOX);
        return $this->page();
    }
    
    public function randomText($length = 15, $numOnly = false) 
    {
        $possibleChars = "1234567890";
        if(!$numOnly)
        {
            $possibleChars .= " abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }
        $text = '';

        for($i = 0; $i < $length; $i++) {
            $rand = rand(0, strlen($possibleChars) - 1);
            $text .= substr($possibleChars, $rand, 1);
        }

        return $text;
    }
    
    private function setCategory($catLevel1, $catLevel2 = null, $catLevel3 = null)
    {
        $this->page()->find()->elementWithId(static::ELEMENT_SELECT_CATEGORY)->click();
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(sprintf(static::ELEMENT_ROOT_CATEGORY, $catLevel1));
        $this->page()->find()->elementWithId(sprintf(static::ELEMENT_ROOT_CATEGORY, $catLevel1))->click();
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithXpath(sprintf(static::ELEMENT_CHILD_CATEGORY, $catLevel2));
        $this->page()->find()->elementWithXpath(sprintf(static::ELEMENT_CHILD_CATEGORY, $catLevel2))->click();
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithXpath(sprintf(static::ELEMENT_CHILD_CATEGORY, $catLevel3));
        $this->page()->find()->elementWithXpath(sprintf(static::ELEMENT_CHILD_CATEGORY, $catLevel3))->click();    
    }
}