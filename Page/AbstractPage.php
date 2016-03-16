<?php

namespace Tests\Page;

use Athena\Browser\BrowserInterface;

abstract class AbstractPage
{
    /**
     * @var \Athena\Browser\BrowserInterface
     */
    private $browser;

    /**
     * Page constructor.
     *
     * @param \Athena\Browser\BrowserInterface $browser
     */
    public function __construct(BrowserInterface $browser)
    {
        $this->browser = $browser;
    }

    /**
     * @return BrowserInterface
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @return \Athena\Browser\Page\PageInterface
     */
    public function getCurrentPage()
    {
        return $this->browser->getCurrentPage();
    }

    /**
     * @return \Athena\Browser\Page\Element\ElementSelector
     */
    public function getElement(){
        return $this->getCurrentPage()->getElement();
    }

    /**
     * @param $locatortype : id, class, etc
     * @param $locator : value of locator
     * @return \Athena\Browser\Page\Element\ElementAction
     */
    public function getElementWithOther($locatortype,$locator){
        return $this->getCurrentPage()->getElement()->withXpath("//*[@".$locatortype."='".$locator."']");
    }

    /**
     * @return null|string
     */
    public function getAttributeBodyPage(){
        return $this->getElement()->withXpath('//body')->thenFind()->asHtmlElement()->getAttribute('class');
    }


    /**
     * Open page.
     *
     * @return void
     */
    abstract function open();
}
