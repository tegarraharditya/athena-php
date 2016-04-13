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
        $result = $page->loginAction(Sinon::generateEmail(), Sinon::generatePassword());
        $result->findAndAssertThat()->existsAtLeastOnce()->elementWithXpath(static::ELEMENT_MESSAGE_ERROR);
    }
    
    public function testLogin_correctCredentials_shouldReturnToHomePageWithLogoutLinkExist()
    {
        $data = (new Sinon())->createUserWithPassword();
        $page = new AccountPage();
        $page->open();
        
        $result = $page->loginAction($data['email'], $data['password']);
        $result->findAndAssertThat()->existsOnlyOnce()->elementWithCss(static::ELEMENT_LINK_LOGOUT);
    }
    
    public function testRegister_correctData_shouldSuccessConfirmEmailAndDirectlyLoggedIn()
    {
        $page = new AccountPage(true);
        $page->open();
        $page->registerAction(Sinon::generateEmail(), Sinon::generatePassword());
        
        $confirmEmail = $page->openEmail();
        $confirmEmail->wait(AccountPage::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_LINK_CONFIRM);
        $confirmEmail->find()->elementWithId(static::ELEMENT_LINK_CONFIRM)->click();
        
        $page->openLastWindow();
        
        $confirmEmail->wait(AccountPage::TIMEOUT)->untilPresenceOf()->elementWithCss(static::ELEMENT_LINK_LOGOUT);
        
    }
}

