<?php

namespace Tests\Pages\desktop;

use Athena\Page\AbstractPage;
use Athena\Athena;
use Facebook\WebDriver\Exception\UnexpectedAlertOpenException;
use Tests\Atlas\Sinon;

class AdPage extends AbstractPage
{
    
    CONST ELEMENT_INPUT_TITLE = 'add-title';
    CONST ELEMENT_INPUT_DESCRIPTION = 'add-description';
    CONST ELEMENT_INPUT_PERSON = 'add-person';
    CONST ELEMENT_INPUT_EMAIL = 'add-email';
    CONST ELEMENT_INPUT_PHONE = 'add-phone';
    CONST ELEMENT_INPUT_BBPIN = 'add-bb_pin';
    CONST ELEMENT_INPUT_SEARCH = 'headerSearch';
    CONST ELEMENT_INPUT_CITY = 'cityField';
    CONST ELEMENT_INPUT_PRICE = 'data[param_price][1]';
    
    CONST ELEMENT_LINK_DEACTIVATE = '.deactivateme%s';
    CONST ELEMENT_LINK_REMOVE = '.remove4';
    CONST ELEMENT_LINK_LOGIN = 'topLoginLink';
    CONST ELEMENT_LINK_OBSERVER = '.observelinkinfo';
    
    CONST ELEMENT_BUTTON_SUBMIT = 'save';
    CONST ELEMENT_BUTTON_DELETE = 'deleteButton';
    CONST ELEMENT_BUTTON_SEARCH = 'submit-searchmain';
    CONST ELEMENT_BUTTON_PROMOTE = 'promoteAdRow';
    CONST ELEMENT_BUTTON_SUBMIT_PROMOTE = 'submit-contact';
    
    CONST ELEMENT_CHECK_EMAIL = '//label[@relname="data[contactform]"]';
    CONST ELEMENT_CHECK_WHATSAPP = '//label[@relname="data[whatsapp]"]';
    CONST ELEMENT_CHECK_ACCEPT = '//label[@relname="data[accept]"]';
    
    CONST ELEMENT_SELECT_CATEGORY = 'targetrenderSelect1-0';
    CONST ELEMENT_SELECT_CONDITION = 'targetparam9';
    CONST ELEMENT_SELECT_CONDITION_VALUE = 'a-param9';
    CONST ELEMENT_SELECT_REGION = 'a-region-id-select';
    CONST ELEMENT_SELECT_SUBREGION = 'a-subregion-id-select';
    
    CONST ELEMENT_OPTION_SUBREGION = 'subregion-id-select-%s';
    CONST ELEMENT_OPTION_REGION = 'region-id-select-%s';
    CONST ELEMENT_OPTION_CONDITION = 'param9-%s';
    CONST ELEMENT_OPTION_REMOVEREASON = 'reason-%s';
    
    CONST ELEMENT_RADIO_REMOVEREASON = '.removeReason';
    CONST ELEMENT_ROOT_CATEGORY = 'cat-%s';
    CONST ELEMENT_CHILD_CATEGORY = '//a[@data-category="%s"]';
    CONST ELEMENT_SUCCESSBOX = '.successbox';
    CONST ELEMENT_TEXT_DESCRIPTION = 'textContent';
    CONST ELEMENT_TABLE_ADS = 'adsTable';
    CONST ELEMENT_CONTAINER_ADS = 'tabs-container';
    CONST ELEMENT_BOX_DETAIL = '.detailcloudbox';
    CONST ELEMENT_BOX_CONFIRMATION = '.stuffed';
    CONST ELEMENT_ROW_AD = '.offer';
    CONST ELEMENT_POPUP_ERROR_MESSAGE = 'message_system';
    
    CONST TIMEOUT = 20;
    CONST SET_POINT_EXPIRE = true;
    private $condition = ['baru', 'bekas'];
    private $bind = [];
    
    public function __construct() 
    {
        parent::__construct(Athena::browser(), 'posting');
    }
    
    public function openPage($url)
    {
        Athena::browser()->get($url);
    }
    
    public function prepareAdData()
    {
       $this->bind = [
            'title' => 'Random title with '. (new AdPage())->randomText(),
            'description' => 'Random description with '.(new AdPage())->randomText(300)
        ]; 
    }
    
    public function createAdThroughStubInDatabase()
    {
        return (new Sinon())->createAd($this->bind);
    }
    
    public function seeSameDetailWithPreparedData()
    {
        $this->page()->findAndAssertThat()->textEquals($this->bind['description'])->elementWithId(static::ELEMENT_TEXT_DESCRIPTION);
    }
    
    public function createSessionFrom($data = [])
    {
        $user_id = isset($data['ad']) ? $data['ad']['user_id'] : 0;
        return (new Sinon())->createUserSession($user_id);
    }
    
    public function setBrowserSessionWith($data = [])
    {
        $session_id = isset($data['sessionid']) ? $data['sessionid'] : NULL;
        $this->getBrowser()->setSession($session_id);
    }
    
    public function fillAllDetailsInPostingAdWithEmail($email = "random@email.com")
    {   
        $rand_key = array_rand($this->condition);
    
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_TITLE)->sendKeys("Random title with ". $this->randomText());
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_DESCRIPTION)->sendKeys("Random description with ". $this->randomText(50));
        $this->setCategory(98, 231, 5114);
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_SELECT_CONDITION);
        $this->page()->find()->elementWithId(static::ELEMENT_SELECT_CONDITION_VALUE)->click();
        $this->page()->find()->elementWithId(sprintf(static::ELEMENT_OPTION_CONDITION, $this->condition[$rand_key]))->click();
        $this->page()->find()->elementWithName(static::ELEMENT_INPUT_PRICE)->sendKeys($this->randomText(5, true));
        $this->page()->find()->elementWithId(static::ELEMENT_SELECT_REGION)->click();
        $this->page()->find()->elementWithId(sprintf(static::ELEMENT_OPTION_REGION, 7))->click();
        $this->page()->find()->elementWithId(static::ELEMENT_SELECT_SUBREGION)->click();
        $this->page()->find()->elementWithId(sprintf(static::ELEMENT_OPTION_SUBREGION, 29))->click();
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_PERSON)->sendKeys("random person ".$this->randomText(8));
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_EMAIL)->sendKeys($email);
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_PHONE)->sendKeys("081".$this->randomText(7, true));
        $this->page()->find()->elementWithXpath(static::ELEMENT_CHECK_ACCEPT)->click();
        
    }
    
    public function clickSubmitButton()
    {
        $this->page()->find()->elementWithId(static::ELEMENT_BUTTON_SUBMIT)->click();
    }
    
    public function clickLoginLink()
    {
        $this->page()->find()->elementWithId(static::ELEMENT_LINK_LOGIN)->click();
    }
    
    public function seePostAdSuccessPage()
    {
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithCss(static::ELEMENT_SUCCESSBOX);
        $this->page()->findAndAssertThat()->textEquals('Terima kasih, iklan Anda berhasil disimpan!')->elementWithCss(static::ELEMENT_SUCCESSBOX);
    }
    
    public function clickLinkDeleteForAd($data = [])
    {
        $ad = isset($data['ad']) ? $data['ad']['id'] : 0;
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_TABLE_ADS);
        $this->page()->find()->elementWithCss(sprintf(AdPage::ELEMENT_LINK_DEACTIVATE, $ad))->click();
        
    }
    
    public function chooseReasonForDeletingAd()
    {
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_BUTTON_DELETE);
        $id = $this->getRandomElementId($this->page()->find()->elementsWithCss(static::ELEMENT_RADIO_REMOVEREASON));
        $this->page()->find()->elementWithId(sprintf(static::ELEMENT_OPTION_REMOVEREASON, $id))->click();
    }
    
    public function clickSubmitForDelete()
    {
        $this->page()->find()->elementWithId(static::ELEMENT_BUTTON_DELETE)->click();
    }
    
    public function seeDeletedAdFrom($data = [])
    {
        $url = isset($data['url']) ? $data['url'] : '';
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithCss(static::ELEMENT_LINK_REMOVE);
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithXpath('//a[@href="'.$url.'"]');
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
    
    private function getRandomElementId($elements = [])
    {
        $rand = rand(1, count($elements));
        $i = $id = 1;
        foreach ($elements as $element)
        {
            $id = $element->getAttribute('value');
            if($i == $rand) break;
            $i++;
        }
        
        return $id;
        
    }

    public function seeInListAtLeastOneResult()
    {
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_CONTAINER_ADS);
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(static::ELEMENT_LINK_OBSERVER);
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(static::ELEMENT_BOX_DETAIL);
    }

    public function clickSearchButton()
    {
        $this->page()->find()->elementWithId(static::ELEMENT_BUTTON_SEARCH)->click();
    }

    public function doSearchByFillingKeywordBoxWith($title)
    {
        $this->page()->find()->elementWithId(static::ELEMENT_INPUT_SEARCH)->sendKeys($title);
    }

    public function addPointForUserWithAd($createdAd, $setExpire = false)
    {
        $bind['userid'] = isset($createdAd['ad']) ? $createdAd['ad']['user_id'] : 0;
        $bind['points'] = 50000;
        $addedPoint = (new Sinon())->addUserPoint($bind);
        
        if($setExpire)
        {
            $data['id'] = isset($addedPoint['id']) ? $addedPoint['id'] : 0;
            $addedPoint = (new Sinon())->setUserPointsToExpire($data);
        }

        return $addedPoint;
    }

    public function tryToPromoteMyAd()
    {
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_BUTTON_PROMOTE);
        $this->page()->find()->elementWithId(static::ELEMENT_BUTTON_PROMOTE)->click();
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_BUTTON_SUBMIT_PROMOTE);

        try {
            $this->page()->find()->elementWithId(static::ELEMENT_BUTTON_SUBMIT_PROMOTE)->click();
        } catch(UnexpectedAlertOpenException $e) {
            // Nothing needed to be done here
            // because selenium is closing the alert automatically
            //$this->page()->wait(35)->forExpectedCondition(WebDriverExpectedCondition::alertIsPresent());
            //$this->getBrowser()->switchTo()->alert()->dismiss();
        }
    }

    public function seeErrorPopupMessageFailedToPromote()
    {
        $this->page()->getElement()->withId(static::ELEMENT_POPUP_ERROR_MESSAGE)->wait(static::TIMEOUT)->toBeVisible();
        $this->page()->findAndAssertThat()->textEquals('  Saldo anda sudah habis masa aktifnya')->elementWithId(static::ELEMENT_POPUP_ERROR_MESSAGE);

    }

    public function seePromoteConfirmationPage()
    {
        $this->page()->getElement()->withCss(static::ELEMENT_BOX_CONFIRMATION)->wait(static::TIMEOUT)->toBeVisible();
        $this->page()->findAndAssertThat()->textEquals('Terima kasih telah mempromosikan iklan Anda!')->elementWithCss(static::ELEMENT_BOX_CONFIRMATION);
        
    }


}