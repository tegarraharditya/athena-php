<?php

namespace Tests\Browser\Tests\desktop;

use Tests\Pages\desktop\MyAccountPage;
use Tests\Atlas\Sinon;
use Athena\Test\AthenaBrowserTestCase;

class MyAccountTest extends AthenaBrowserTestCase
{  
    public function setUp()
    {
        \Athena\Athena::getInstance()->setBrowser(null);
    }

    public function testLogin_UserDoesNotExist_ShouldAppearErrorMessageElement()
    {
        $page = new MyAccountPage();
        $page->open();
        $result = $page->loginAction(Sinon::generateEmail(), Sinon::generatePassword());
        $result->findAndAssertThat()->existsOnlyOnce()->elementsWithId(MyAccountPage::ELEMENT_EMAIL_ERROR);
    }
    
    public function testLogin_UserDoesExist_CorrectCredentials_ReturnMyAccountPage()
    {
        $data = (new Sinon())->createUserWithPassword();
        $email = $data['email'];
        $emails = explode('@', $email);
        
        $page = new MyAccountPage();
        $page->open();
        $result = $page->loginAction($email, $data['password']);
        $result->wait(MyAccountPage::TIMEOUT)->untilAbsenceOf(MyAccountPage::ELEMENT_TOP_LOGIN);
        $result->findAndAssertThat()->existsOnlyOnce()->elementWithId(MyAccountPage::ELEMENT_TOP_LOGIN);
        $result->findAndAssertThat()->textEquals(reset($emails))->elementWithId(MyAccountPage::ELEMENT_TOP_LOGIN);   
    }
    
    public function testForgotPassword_EmailDoesNotExist_shouldAppearErrorMessageElement()
    {
        $page = new MyAccountPage();
        $page->open();
        
        $result = $page->forgotPasswordAction(Sinon::generateEmail(), Sinon::generatePassword(20));
        $result->wait(MyAccountPage::TIMEOUT)->untilVisibilityOf()->elementWithCss(MyAccountPage::ELEMENT_ERROR_CONTAINER);
    }
    
    public function testForgotPassword_EmailDoesExist_shouldAppearErrorMessageElement()
    {
        $data = (new Sinon())->createUserWithoutPassword();
        $page = new MyAccountPage();
        $page->open();
         
        $result = $page->forgotPasswordAction($data['email'], Sinon::generatePassword(20));
        $result->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(MyAccountPage::ELEMENT_SUCCESS_CONTAINER);
        $result->findAndAssertThat()->textEquals(MyAccountPage::TEXT_FORGOT_PASSWORD_SUCCESS)->elementWithCss(MyAccountPage::ELEMENT_SUCCESS_CONTAINER);
    }
    
    public function testRegister_AllDataCorrect_SuccessWhenConfirmEmail()
    {
        $email = Sinon::generateEmail();
        $emails = explode('@', $email);
        
        $page = new MyAccountPage();
        $page->open();
        $page->registerAction($email, Sinon::generatePassword());
        
        $confirmEmail = $page->openEmail();
        $confirmEmail->wait(MyAccountPage::TIMEOUT)->untilPresenceOf()->elementWithId(MyAccountPage::ELEMENT_LINK_CONFIRM);
        $confirmEmail->find()->elementWithId(MyAccountPage::ELEMENT_LINK_CONFIRM)->click();
        
        $page->openLastWindow();
        
        $confirmEmail->wait(MyAccountPage::TIMEOUT)->untilPresenceOf()->elementWithId(MyAccountPage::ELEMENT_TOP_LOGIN);
        $confirmEmail->findAndAssertThat()->textEquals(reset($emails))->elementWithId(MyAccountPage::ELEMENT_TOP_LOGIN);
    }
}