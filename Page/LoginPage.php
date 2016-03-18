<?php
namespace Tests\Page;
use Athena\Browser\BrowserInterface;
use Athena\Page\BasePage;
use Facebook\WebDriver\WebDriverBy;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 2/24/16
 * Time: 8:24 PM
 */
class LoginPage extends BasePage
{
    public function __construct()
    {
        parent::__construct('login');
    }

    /*
     * Actions
     */

    public function gotoLoginPage()
    {
        $this->elementTopLoginLink()->thenFind()->asHtmlElement()->click();
    }

    public function fillLoginEmail($email)
    {
        $this->elementEmailField()->thenFind()->asHtmlElement()->sendKeys($email);
    }

    public function fillLoginPassword($password)
    {
        $this->elementPasswordField()->thenFind()->asHtmlElement()->sendKeys($password);
    }

    /**
     * @return MyAds
     */
    public function submitLoginForm()
    {
        $this->elementLoginButton()->thenFind()->asHtmlElement()->click();

        return new MyAds();
    }

    public function verifyFormLoginIsDisplayed(){
        $this->elementLoginForm()->assertThat()->isDisplayed();
    }

    public function Login($email, $password)
    {

    }

    /*
     * Selectors
     */

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    private function elementTopLoginLink()
    {
        return $this->getBrowser()->getCurrentPage()->getElement()->withId('topLoginLink');
    }

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    private function elementEmailField()
    {
        return $this->getBrowser()->getCurrentPage()->getElement()->withId('userEmail');
    }

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    private function elementPasswordField()
    {
        return $this->getBrowser()->getCurrentPage()->getElement()->withId('userPass');
    }

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    private function elementLoginButton()
    {
        return $this->getBrowser()->getCurrentPage()->getElement()->withId('se_userLogin');
    }

    private function elementLoginForm(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId('loginForm');
    }

}
