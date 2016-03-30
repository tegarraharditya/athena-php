<?php
/**
 * Created by PhpStorm.
 * User: Tegar
 * Date: 3/29/16
 * Time: 10:10 AM
 */

namespace Tests\Context;


use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\bdd\Footer;

class FooterContext extends BaseContext
{
    /**
     * @var Footer
     */
    private $footer;

    //element
    private $PUSAT_BANTUAN = 'aux_link_help';
    private $CARA_MENGGUNAKAN_OLX = 'aux_link_howto';
    private $IKLAN_BERDASARKAN_OLX = 'aux_link_location';
    private $FACEBOOK_OLX_INDONESIA = 'aux_link_fb';
    private $KETENTUAN_UMUM = 'aux_link_toc';
    private $TIPS_JUAL_BELI_AMAN = 'aux_link_tips';
    private $PENCARIAN_POPULER = 'aux_link_popular';
    private $TWITTER_OLX_INDONESIA = 'aux_link_tw';
    private $KEBIJAKAN_PRIVASI = 'aux_link_privacy';
    private $PETA_SITUS = 'aux_link_sitemap';
    private $JOIN_OLX = 'aux_link_join';
    private $BLOG_OLX_INDONESIA = 'aux_link_blog';

    public function __construct()
    {
        $this->footer = new Footer();
    }

    /**
     * @Then /^I found Pusat Bantuan link page$/
     */
    public function verifyLinkPusatBantuanPageOnFooter()
    {
        $this->footer->verifyLinkPusatBantuanPage();
    }

    /**
     * @Then /^I found Iklan Berdasarkan Lokasi link page$/
     */
    public function verifyLinkMenggunakanOlxLinkOnFooter()
    {
        $this->footer->verifyLinkPusatBantuanPage();
    }

    /**
     * @Then /^I found Facebook OLX Indonesia link page$/
     */
    public function verifyLinkFacebookOLXIndonesiaOnFooter()
    {
        $this->footer->verifyLinkFacebookOLXIndonesiaPage();
    }


    /**
     * @Then /^I found Ketentuan Umum link page$/
     */
    public function verifyKetentuanUmumLinkOnFooter()
    {
        $this->footer->verifyLinkKetentuanUmumPage();
    }


    /**
     * @Then /^I found Tips Jual Beli Aman link page$/
     */
    public function verifyToTipsJualBeliAmanLinkOnFooter()
    {
       $this->footer->verifyLinkTipsJualBeliAmanPage();
    }

    /**
     * @Then /^I found Pencarian Populer link page$/
     */
    public function verifyPencarianPopulerLinkOnFooter()
    {
        $this->footer->verifyLinkPencarianPopulerPage();
    }


    /**
     * @Then /^I found Twitter link page$/
     */
    public function verifyTwitterOlxIndonesiaLinkOnFooter()
    {
        $this->footer->verifyLinkTwitterOlxIndonesiaPage();
    }

    /**
     * @Then /^I found Kebijakan Privasi link page$/
     */
    public function verifyKebijakanPrivasiLinkOnFooter()
    {
        $this->footer->verifyLinkKebijakanPrivasiPage();
    }


    /**
     * @Then /^I found Peta Situs link page$/
     */
    public function verifyPetaSitusLinkOnFooter()
    {
        $this->footer->verifyLinkPetaSitusPage();
    }


    /**
     * @Then /^I found Join OLX link page$/
     */
    public function verifyJoinOLXLinkOnFooter()
    {
        $this->footer->verifyLinkJoinOLXPage();
    }


    /**
     * @Then /^I found Blog OLX link page$/
     */
    public function verifyBlogOLXLinkOnFooter()
    {
        $this->footer->verifyLinkBlogOlxIndonesiaPage();
    }
}