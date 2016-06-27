<?php

namespace Tests\Pages\bdd;

/**
 * Created by PhpStorm.
 * User: tegar
 * Date: 6/15/16
 * Time: 11:24 AM
 */

use Athena\Athena;
use Athena\Browser\BrowserInterface;
use Athena\Browser\Page\Find\Decorator\CachedPageFinderDecorator;
use Athena\Browser\Page\Find\PageFinderInterface;
use Athena\Browser\Page\PageInterface;
use Athena\Page\AbstractPage;

class AdsAutoApprove extends  AbstractPage{

    private $admin_uri;
    private $ID_LOGIN_TEXT = 'login';
    private $XPATH_PASS_TEXT = './/*[@id=\'mainForm\']/fieldset/div[2]/div[2]/p/input';
    private $XPATH_SUBMIT_BUTTON = './/*[@id=\'mainForm\']/fieldset/div[4]/input';


    public function __construct() {
        $settings = (array) Athena::settings()->getAll();
        $this->admin_uri = $settings['admin-panel'];
        parent::__construct(Athena::browser(),$this->admin_uri);
    }

    public function openUrl(){
        $this->getBrowser()->get($this->admin_uri);
    }

    public function setUsername(String $username){
       $this->getBrowser()->getCurrentPage()->getElement()->withId($this->ID_LOGIN_TEXT)->thenFind()->asHtmlElement()->sendKeys($username);
    }

    public function setPassword(String $password){
        $this->getBrowser()->getCurrentPage()->getElement()->withXpath($this->XPATH_PASS_TEXT)->thenFind()->asHtmlElement()->sendKeys($password);
    }

    public function clickLogin(){
        $this->getBrowser()->getCurrentPage()->getElement()->withXpath($this->XPATH_SUBMIT_BUTTON)->thenFind()->asHtmlElement()->click();
    }

    public function clickMediasi(){
        $this->getBrowser()->getCurrentPage()->getElement()->withLinkText('Moderation Panel')->thenFind()->asHtmlElement()->click();
    }

    public function approveAllAds(){
        $elements = $this->getBrowser()->getCurrentPage()->find()->elementsWithXpath('OK BUTTON CLICK');
        foreach($elements as $element){
            $element->click();
        }
    }
}