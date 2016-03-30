<?php
namespace Tests\Pages\bdd;

use Athena\Page\BasePage;
use Exception;
use PHPUnit_Framework_Assert;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 2/24/16
 * Time: 8:40 PM
 */
class MyAds extends OneWeb
{
    public function __construct()
    {
        parent::__construct('myads');
    }


    public function verifyMyAdsTitle()
    {
        PHPUnit_Framework_Assert::assertEquals('OLX.co.id - Cara Tepat Jual Cepat', $this->getBrowser()->getTitle());
    }
}
