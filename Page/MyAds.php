<?php
namespace Tests\Page;

use Exception;
use PHPUnit_Framework_Assert;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 2/24/16
 * Time: 8:40 PM
 */
class MyAds extends AbstractPage
{
    public function verifyMyAdsTitle()
    {
        PHPUnit_Framework_Assert::assertEquals('OLX.co.id - Cara Tepat Jual Cepat', $this->getBrowser()->getTitle());
    }

    /**
     * Open page.
     *
     * @return void
     */
    public function open()
    {
        throw new Exception('method not implemented.');
    }
}
