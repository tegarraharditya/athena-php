<?php
/**
 * Created by PhpStorm.
 * User: Tegar
 * Date: 3/29/16
 * Time: 10:10 AM
 */

namespace Tests\Context;


use Athena\Athena;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\bdd\Footer;

class FooterContext extends BaseContext
{
    /**
    [0] => Logo
    [1] => Pusat Bantuan
    [2] => Ketentuan Umum
    [3] => Kebijakan Privasi
    [4] => Cara Menggunakan OLX
    [5] => Tips Jual Beli Aman
    [6] => Peta Situs
    [7] => Iklan Berdasarkan Lokasi
    [8] => Pencarian Populer
    [9] => Join OLX
    [10] => Facebook
    [11] => Twitter
    [12] => Blog
     **/

    private $footer;

    //element
    private $ID_PUSAT_BANTUAN = 'aux_link_help';
    private $ID_KETENTUAN_UMUM = 'aux_link_toc';
    private $ID_KEBIJAKAN_PRIVASI = 'aux_link_privacy';
    private $ID_CARA_MENGGUNAKAN_OLX = 'aux_link_howto';
    private $ID_TIPS_JUAL_BELI_AMAN = 'aux_link_tips';
    private $ID_PETA_SITUS = 'aux_link_sitemap';
    private $ID_IKLAN_BERDASARKAN_OLX = 'aux_link_location';
    private $ID_PENCARIAN_POPULER = 'aux_link_popular';
    private $ID_JOIN_OLX = 'aux_link_join';
    private $ID_FACEBOOK_OLX_INDONESIA = 'aux_link_fb';
    private $ID_TWITTER_OLX_INDONESIA = 'aux_link_tw';
    private $ID_BLOG_OLX_INDONESIA = 'aux_link_blog';

    public function __construct()
    {
        $this->footer = new Footer();
    }

    /**
     * @Then /^I can verify all link on footer$/
     */
    public function iCanVerifyAllLinkOnFooter()
    {
        $this->footer->verifyAllFooterLink();
    }

    /**
     * @Given /^I can verify that all link are not broken$/
     */
    public function iCanVerifyThatAllLinkAreNotBroken()
    {
        $this->footer->verifyAllLinkNotBroken();
    }

}