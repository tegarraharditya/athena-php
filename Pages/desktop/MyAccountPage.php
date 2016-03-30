<?php
namespace Tests\Pages\desktop;

use Athena\Page\AbstractPage;
use Athena\Athena;
use Tests\Atlas\Sinon;

class MyAccountPage extends AbstractPage
{
    CONST ELEMENT_USER_EMAIL = 'userEmail';
    CONST ELEMENT_USER_PASSWORD = 'userPass';
    CONST ELEMENT_USER_PASSWORD_CONFIRM = 'userPass-repeat';
    CONST ELEMENT_SUBMIT_BUTTON_LOGIN = 'se_userLogin';
    CONST ELEMENT_SUBMIT_BUTTON_CHANGE_PASS_REGISTER = 'se_userSignIn';
    CONST ELEMENT_EMAIL_ERROR = 'se_emailError';
    CONST ELEMENT_TOP_LOGIN = 'topLoginLink';
    CONST ELEMENT_LINK_CONFIRM = 'confirmLink';
    CONST ELEMENT_FORGOT_PASSWORD_LINK = 'newpassword';
    CONST ELEMENT_REGISTER_LINK = '.register-link';
    CONST ELEMENT_ERROR_CONTAINER = '.error';
    CONST ELEMENT_SUCCESS_CONTAINER = '.successbox';
    CONST ELEMENT_ACCEPT_CHECKBOX = 'acceptCheck';
    CONST TEXT_FORGOT_PASSWORD_ERROR = 'Akun tidak terdaftar';
    CONST TEXT_FORGOT_PASSWORD_SUCCESS = 'Sekarang Anda harus mengaktifkan password baru Anda!';
    CONST TIMEOUT = 10;
    
    public function __construct() 
    {
        parent::__construct(Athena::browser(), 'login');
    }
    
    public function loginAction($email, $password)
    {
        $this->page()->find()->elementWithId(static::ELEMENT_USER_EMAIL)
                ->sendKeys($email);
        $this->page()->find()->elementWithId(static::ELEMENT_USER_PASSWORD)
                ->sendKeys($password);
        $this->page()->find()->elementWithId(static::ELEMENT_SUBMIT_BUTTON_LOGIN)->click();
        
        return $this->page();
        
    }
    
    public function registerAction($email, $password)
    {
        $this->page()->find()->elementWithCss(static::ELEMENT_REGISTER_LINK)
                ->click();
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_ACCEPT_CHECKBOX);
        $this->page()->find()->elementWithId(static::ELEMENT_USER_EMAIL)
                ->sendKeys($email);
        $this->page()->find()->elementWithId(static::ELEMENT_USER_PASSWORD)
                ->sendKeys($password);
        $this->page()->find()->elementWithId(static::ELEMENT_USER_PASSWORD_CONFIRM)
                ->sendKeys($password);      
        $this->page()->find()->elementWithId(static::ELEMENT_ACCEPT_CHECKBOX)
                ->click();
        $this->page()->find()->elementWithId(static::ELEMENT_SUBMIT_BUTTON_CHANGE_PASS_REGISTER)
                ->click();
        
        return $this;
    }
    
    public function forgotPasswordAction($email, $newPassword)
    {
        $this->page()->find()->elementWithId(static::ELEMENT_FORGOT_PASSWORD_LINK)
                ->click();
        $this->page()->wait(static::TIMEOUT)->untilPresenceOf()->elementWithId(static::ELEMENT_USER_EMAIL)
                ->sendKeys($email);
        $this->page()->find()->elementWithId(static::ELEMENT_USER_PASSWORD)
                ->sendKeys($newPassword);
        $this->page()->find()->elementWithId(static::ELEMENT_USER_PASSWORD_CONFIRM)
                ->sendKeys($newPassword);
        $this->page()->find()->elementWithId(static::ELEMENT_SUBMIT_BUTTON_CHANGE_PASS_REGISTER)
                ->click();
        return $this->page();
    }
    
    public function openEmail()
    {
        $settings = Athena::settings()->getAll();
        $base_url = $settings['urls']['/'];
        $emails = (new Sinon())->getEmails();
        $result = Athena::browser()->get($base_url . ":1080/messages/" .$emails[0]->getId(). ".html");
        
        return $result;
    }
    
    public function openLastWindow()
    {
        parent::openLastWindow();
    }
    
}
