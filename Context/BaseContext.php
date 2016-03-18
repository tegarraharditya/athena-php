<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/18/16
 * Time: 3:53 PM
 */

namespace Tests\Context;


use Athena\Test\AthenaTestContext;

class BaseContext extends AthenaTestContext
{
    /**
     * @BeforeScenario
     */
    protected function startup()
    {
        $this->browser = Athena::browser(true);
    }

    /**
     * @AfterScenario
     */
    protected function cleanup()
    {
        $this->browser->cleanup();
    }

}