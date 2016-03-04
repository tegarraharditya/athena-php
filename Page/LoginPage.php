<?php
namespace Tests\Page;
use Facebook\WebDriver\WebDriverBy;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 2/24/16
 * Time: 8:24 PM
 */
class LoginPage extends AbstractPage
{
    /**
     * Open page.
     *
     * @return void
     */
    public function open()
    {
        // account page gets mapped from athena.json file (check it out)
        $this->getBrowser()->get('account-page');
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

        return new MyAds($this->getBrowser());
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
        return $this->getCurrentPage()->getElement()->withId('topLoginLink');
    }

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    private function elementEmailField()
    {
        return $this->getCurrentPage()->getElement()->withId('userEmail');
    }

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    private function elementPasswordField()
    {
        return $this->getCurrentPage()->getElement()->withId('userPass');
    }

    /**
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    private function elementLoginButton()
    {
        return $this->getCurrentPage()->getElement()->withId('se_userLogin');
    }
}
