<?php

namespace Tests\browser\Tests\m;

use Athena\Test\AthenaBrowserTestCase;
use Tests\Pages\m\AccountPage;
use Tests\Atlas\Sinon;

class AccountTest extends AthenaBrowserTestCase
{
    CONST ELEMENT_MESSAGE_ERROR = '//p[@class="error"]';
    CONST ELEMENT_LINK_LOGOUT = '.logout';
    CONST ELEMENT_LINK_CONFIRM = 'confirmLink';
    
    public function testLogin_wrongCredentials_shouldReturnErrorMessageInElement()
    {
        $page = new AccountPage();
        $page->open();
        $result = $page->loginAction(User::generateEmail(), User::generatePassword());
        $result->findAndAssertThat()->existsAtLeastOnce()->elementWithXpath(static::ELEMENT_MESSAGE_ERROR);
    }
    
    public function testLogin_correctCredentials_shouldReturnToHomePageWithLogoutLinkExist()
    {
        $data = (new Sinon())->createUserWithPassword();
        $page = new AccountPage();
        $page->open();
        
        $result = $page->loginAction($data->getEmail(), $data->getPassword());
        $result->findAndAssertThat()->existsOnlyOnce()->elementWithCss(static::ELEMENT_LINK_LOGOUT);
    }
    
    public function testRegister_correctData_shouldSuccessConfirmEmailAndDirectlyLoggedIn()
    {
        $page = new AccountPage();
        $page->open();
        $page->registerAction(User::generateEmail(), User::generatePassword());
        
        $confirmEmail = $page->openEmail();
        $confirmEmail->wait(AccountPage::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_LINK_CONFIRM);
        $confirmEmail->find()->elementWithId(static::ELEMENT_LINK_CONFIRM)->click();
        
        $page->openLastWindow();
        
        $confirmEmail->wait(AccountPage::TIMEOUT)->untilPresenceOf()->elementWithCss(static::ELEMENT_LINK_LOGOUT);
        
    }
}

