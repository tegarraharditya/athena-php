<?php
namespace Tests\Pages\bdd;

use Athena\Athena;
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
    private $MYADS_CONF = 'Konfirmasi pasang Iklan - OLX.co.id';
    public function __construct()
    {
        parent::__construct(Athena::browser(),'myads');
    }

    public function verifyMyAdsTitle()
    {
        PHPUnit_Framework_Assert::assertEquals($this->MYADS_CONF, $this->getBrowser()->getTitle());
    }
}
