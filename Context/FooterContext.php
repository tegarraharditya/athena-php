<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 10:13 AM
 */

namespace Tests\Context;


use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Page\Footer;

class FooterContext extends AthenaTestContext
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
        $this->footer = new Footer(Athena::browser());
    }
    /**
     * @When /^I click Pusat Bantuan link on footer$/
     */
    public function iClickPusatBantuanLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->PUSAT_BANTUAN);
    }

    /**
     * @Then /^I am navigated to Pusat Bantuan page$/
     */
    public function iAmNavigatedToPusatBantuanPage()
    {
        $this->footer->verifyPusatBantuanPage();
    }

    /**
     * @When /^I click Cara Menggunakan Olx link on footer$/
     */
    public function iClickCaraMenggunakanOlxLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->CARA_MENGGUNAKAN_OLX);
    }

    /**
     * @Then /^I am navigated to Cara Menggunakan Olx page$/
     */
    public function iAmNavigatedToCaraMenggunakanOlxPage()
    {
        $this->footer->verifyCaraMenggunakanOLXPage();
    }

    /**
     * @When /^I click Iklan Berdasarkan Lokasi link on footer$/
     */
    public function iClickIklanBerdasarkanLokasiLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->IKLAN_BERDASARKAN_OLX);
    }

    /**
     * @Then /^I am navigated to Iklan Berdasarkan Lokasi page$/
     */
    public function iAmNavigatedToIklanBerdasarkanLokasiPage()
    {
        $this->footer->verifyIklanBedasarkanLokasiPage();
    }

    /**
     * @When /^I click Ketentuan Umum link on footer$/
     */
    public function iClickKetentuanUmumLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->KETENTUAN_UMUM);
    }

    /**
     * @Then /^I am navigated to Ketentuan Umum page$/
     */
    public function iAmNavigatedToKetentuanUmumPage()
    {
        $this->footer->verifyKetentuanUmumPage();
    }

    /**
     * @When /^I click Tips Jual Beli Aman link on footer$/
     */
    public function iClickTipsJualBeliAmanLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->TIPS_JUAL_BELI_AMAN);
    }

    /**
     * @Then /^I am navigated to Tips Jual Beli Aman page$/
     */
    public function iAmNavigatedToTipsJualBeliAmanPage()
    {
        $this->footer->verifyTipsJualBeliAmanPage();
    }

    /**
     * @When /^I click Pencarian Populer link on footer$/
     */
    public function iClickPencarianPopulerLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->PENCARIAN_POPULER);
    }

    /**
     * @Then /^I am navigated to Pencarian Populer page$/
     */
    public function iAmNavigatedToPencarianPopulerPage()
    {
        $this->footer->verifyPencarianPopulerPage();
    }

    /**
     * @When /^I click Twitter OLX Indonesia link on footer$/
     */
    public function iClickTwitterOLXIndonesiaLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->TWITTER_OLX_INDONESIA);
    }

    /**
     * @Then /^I am navigated to Twitter OLX Indonesia page$/
     */
    public function iAmNavigatedToTwitterOLXIndonesiaPage()
    {
        $this->footer->verifyTwitterOlxIndonesiaPage();
    }

    /**
     * @When /^I click Kebijakan Privasi link on footer$/
     */
    public function iClickKebijakanPrivasiLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->KEBIJAKAN_PRIVASI);
    }

    /**
     * @Then /^I am navigated to Kebijakan Privasi page$/
     */
    public function iAmNavigatedToKebijakanPrivasiPage()
    {
        $this->footer->verifyKebijakanPrivasiPage();
    }

    /**
     * @When /^I click Peta Situs link on footer$/
     */
    public function iClickPetaSitusLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->PETA_SITUS);
    }

    /**
     * @Then /^I am navigated to Peta Situs page$/
     */
    public function iAmNavigatedToPetaSitusPage()
    {
        $this->footer->verifyPetaSitusPage();
    }

    /**
     * @When /^I click Join OLX link on footer$/
     */
    public function iClickJoinOLXLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->JOIN_OLX);
    }

    /**
     * @Then /^I am navigated to Join Olx page$/
     */
    public function iAmNavigatedToJoinOlxPage()
    {
        $this->footer->verifyJoinOlxPage();
    }

    /**
     * @When /^I click Blog OLX Indonesia link on footer$/
     */
    public function iClickBlogOLXIndonesiaLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->BLOG_OLX_INDONESIA);
    }

    /**
     * @Then /^I am navigated to Blog OLX Indonesia page$/
     */
    public function iAmNavigatedToBlogOLXIndonesiaPage()
    {
        $this->footer->verifyBlogOlxIndonesiaPage();
    }

    /**
     * @When /^I click Facebook OLX Indonesia link on footer$/
     */
    public function iClickFacebookOLXIndonesiaLinkOnFooter()
    {
        $this->footer->clickFooterLink($this->FACEBOOK_OLX_INDONESIA);
    }

    /**
     * @Then /^I am navigated to Facebook OLX Indonesia page$/
     */
    public function iAmNavigatedToFacebookOLXIndonesiaPage()
    {
        $this->footer->verifyFacebookOLXIndonesiaPage();
    }
}