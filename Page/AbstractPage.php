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
     * Open page.
     *
     * @return void
     */
    abstract function open();
}
