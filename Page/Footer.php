<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/14/16
 * Time: 9:52 AM
 */

namespace Tests\Page;


use Athena\Page\BasePage;

 class Footer extends OneWeb
{
    //body attribute
    private $PUSAT_BANTUAN_ATRR = 'aux_link_help';
    private $CARA_MENGGUNAKAN_OLX_ATRR = 'aux_link_howto';
    private $IKLAN_BERDASARKAN_OLX_ATRR = 'aux_link_location';
    private $FACEBOOK_OLX_INDONESIA_ATRR = 'aux_link_fb';
    private $KETENTUAN_UMUM_ATRR = 'aux_link_toc';
    private $TIPS_JUAL_BELI_AMAN_ATRR = 'aux_link_tips';
    private $PENCARIAN_POPULER_ATRR = 'aux_link_popular';
    private $TWITTER_OLX_INDONESIA_ATRR = 'aux_link_tw';
    private $KEBIJAKAN_PRIVASI_ATRR = 'aux_link_privacy';
    private $PETA_SITUS_ATRR = 'aux_link_sitemap';
    private $JOIN_OLX_ATRR = 'aux_link_join';
    private $BLOG_OLX_INDONESIA_ATRR = 'aux_link_blog';

    public function __construct()
    {
        parent::__construct('/');
    }

    private function getElementFooterById($id){
        //return $this->getElement()->withId($id);
        return $this->getBrowser()->getCurrentPage()->getElement()->withId($id);
    }

    private function getElementBodyFooterByXpath(){
        //return $this->getElement()->withXpath('//body');
        return $this->getBrowser()->getCurrentPage()->getElement()->withXpath('//body');
    }

    public function clickFooterLink($footer){
        $this->getElementFooterById($footer)->thenFind()->asHtmlElement()->click();
    }


    public function isElementExistById($id){
        $this->getBrowser()->getCurrentPage()->getElement()->withId($id)->assertThat()->isDisplayed();
    }

    /**
     * @return null|string
     */
    public function getAttributeFooterPage(){
        return $this->getElementBodyFooterByXpath()->thenFind()->asHtmlElement()->getAttribute('class');
    }

     public function verifyLinkPusatBantuanPage(){
         $this->isElementExistById($this->PUSAT_BANTUAN_ATRR);
     }

     public function verifyLinkCaraMenggunakanOLXPage(){
         $this->isElementExistById($this->CARA_MENGGUNAKAN_OLX_ATRR);
     }

     public function verifyLinkIklanBerdasarkanLokasiPage(){
        $this->isElementExistById($this->IKLAN_BERDASARKAN_OLX_ATRR);
     }

     public function verifyLinkFacebookOLXIndonesiaPage(){
         $this->isElementExistById($this->FACEBOOK_OLX_INDONESIA_ATRR);
     }

     public function verifyLinkTipsJualBeliAmanPage(){
         $this->isElementExistById($this->TIPS_JUAL_BELI_AMAN_ATRR);
     }

     public function verifyLinkPencarianPopulerPage(){
         $this->isElementExistById($this->PENCARIAN_POPULER_ATRR);
     }

     public function verifyLinkTwitterOLXIndonesiaPage(){
         $this->isElementExistById($this->TWITTER_OLX_INDONESIA_ATRR);
     }

     public function verifyLinkKebijakanPrivacyPage(){
         $this->isElementExistById($this->KEBIJAKAN_PRIVASI_ATRR);
     }

     public function verifyLinkPetaSitusPage(){
         $this->isElementExistById($this->PETA_SITUS_ATRR);
     }

     public function verifyLinkJoinOLXPage(){
         $this->isElementExistById($this->JOIN_OLX_ATRR);
     }

     public function verifyLinkBlogOLXIndonesiaPage(){
         $this->isElementExistById($this->BLOG_OLX_INDONESIA_ATRR);
     }

     public function verifyLinkKetentuanUmumPage(){
         $this->isElementExistById($this->KETENTUAN_UMUM_ATRR);
     }

     public function verifyLinkKebijakanPrivasiPage(){
         $this->isElementExistById($this->KEBIJAKAN_PRIVASI_ATRR);
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