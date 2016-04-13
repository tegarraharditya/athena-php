<?php

namespace Tests\Pages\m;

use Athena\Page\AbstractPage;
use Athena\Athena;
use Tests\Atlas\Sinon;

class AccountPage extends AbstractPage
{
    CONST ELEMENT_INPUT_EMAIL = '%s[email]';
    CONST ELEMENT_INPUT_PASSWORD = '%s[password]';
    CONST ELEMENT_INPUT_PASSWORD_CONFIRM = '%s[password2]';
    CONST ELEMENT_BUTTON_LOGIN = '//input[contains(@value,"Masuk")]';
    CONST ELEMENT_LINK_REGISTER = '//a[contains(@href,"/daftar/")]';
    CONST ELEMENT_CHECK_RULES = '%s[rules]';
    CONST ELEMENT_BUTTON_SUBMIT = '.submit';
    CONST TIMEOUT = 10;
    
    public function __construct($reset = false) 
    {
        parent::__construct(Athena::browser($reset), 'login');
    }
    
    public function loginAction($email, $password)
    {
        $action = 'login';
        $this->page()->find()->elementWithName(sprintf(static::ELEMENT_INPUT_EMAIL, $action))->sendKeys($email);
        $this->page()->find()->elementWithName(sprintf(static::ELEMENT_INPUT_PASSWORD,$action))->sendKeys($password);
        $this->page()->find()->elementWithXpath(static::ELEMENT_BUTTON_LOGIN)->click();
        
        return $this->page();
    }
    
    public function registerAction($email, $password)
    {
        $action = 'register';
        $this->page()->find()->elementWithXpath(static::ELEMENT_LINK_REGISTER)->click();
        $this->page()->wait(static::TIMEOUT)->untilVisibilityOf()->elementWithName(sprintf(static::ELEMENT_INPUT_EMAIL, $action));
        $this->page()->find()->elementWithName(sprintf(static::ELEMENT_INPUT_EMAIL, $action))->sendKeys($email);
        $this->page()->find()->elementWithName(sprintf(static::ELEMENT_INPUT_PASSWORD, $action))->sendKeys($password);
        $this->page()->find()->elementWithName(sprintf(static::ELEMENT_INPUT_PASSWORD_CONFIRM, $action))->sendKeys($password);
        $this->page()->find()->elementWithName(sprintf(static::ELEMENT_CHECK_RULES, $action))->click();
        $this->page()->find()->elementWithCss(static::ELEMENT_BUTTON_SUBMIT)->click();
        
        return $this->page();
    }
    
    public function openEmail()
    {
        $settings = Athena::settings()->getAll();
        $base_url = $settings['urls']['/'];
        $emails = (new Sinon())->getEmails();
        $result = Athena::browser()->get($base_url . ":1080/messages/" .$emails[0]['id']. ".html");
        
        return $result;
    }
    
    public function openLastWindow()
    {
        parent::openLastWindow();
    }
}
