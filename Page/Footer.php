<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 9:52 AM
 */

namespace Tests\Page;


class Footer extends AbstractPage
{
    //body attribute
    private $PUSAT_BANTUAN_ATRR = '';
    private $CARA_MENGGUNAKAN_OLX_ATRR = '';
    private $IKLAN_BERDASARKAN_OLX_ATRR = '';
    private $FACEBOOK_OLX_INDONESIA_ATRR = '';
    private $KETENTUAN_UMUM_ATRR = '';
    private $TIPS_JUAL_BELI_AMAN_ATRR = '';
    private $PENCARIAN_POPULER_ATRR = '';
    private $TWITTER_OLX_INDONESIA_ATRR = '';
    private $KEBIJAKAN_PRIVASI_ATRR = '';
    private $PETA_SITUS_ATRR = '';
    private $JOIN_OLX_ATRR = '';
    private $BLOG_OLX_INDONESIA_ATRR = '';
    /**
     *
     */
    public function open()
    {
        $this->getBrowser()->get('/');
    }


    private function getElementFooterById($id){
        return $this->getElement()->withId($id);
    }

    private function getElementBodyFooterByXpath(){
        return $this->getElement()->withXpath('//body');
    }

    public function clickFooterLink($footer){
        $this->getElementFooterById($footer)->thenFind()->asHtmlElement()->click();
    }

    /**
     * @return null|string
     */
    public function getAttributeFooterPage(){
        return $this->getElementBodyFooterByXpath()->thenFind()->asHtmlElement()->getAttribute('class');
    }

    public function verifyPusatBantuanPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->PUSAT_BANTUAN_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyCaraMenggunakanOLXPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->CARA_MENGGUNAKAN_OLX_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyIklanBedasarkanLokasiPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->IKLAN_BERDASARKAN_OLX_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyFacebookOLXIndonesiaPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->FACEBOOK_OLX_INDONESIA_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyKetentuanUmumPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->KETENTUAN_UMUM_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyTipsJualBeliAmanPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->TIPS_JUAL_BELI_AMAN_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyPencarianPopulerPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->PENCARIAN_POPULER_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyTwitterOlxIndonesiaPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->TWITTER_OLX_INDONESIA_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyKebijakanPrivasiPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->KEBIJAKAN_PRIVASI_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyPetaSitusPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->PETA_SITUS_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyJoinOlxPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->JOIN_OLX_ATRR,$this->getAttributeFooterPage());
    }

    public function verifyBlogOlxIndonesiaPage(){
        \PHPUnit_Framework_Assert::assertEquals($this->BLOG_OLX_INDONESIA_ATRR,$this->getAttributeFooterPage());
    }

}