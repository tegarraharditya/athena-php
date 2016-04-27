<?php
namespace Tests\Browser\Tests\desktop\Oneweb;
use Athena\Athena;
use Athena\Test\AthenaBrowserTestCase;
use Tests\Pages\bdd\Homepage;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 4/21/16
 * Time: 10:01 AM
 */
class HomePageTest extends AthenaBrowserTestCase
{
    public function testOpenHomepage_ShoulOpenHomepage(){
        $homepage = new Homepage();
        $homepage->open(true);
        $homepage->verifyPage();
    }

    public function testOpenHomepage_ByClickingLogoHeader_ShouldBeBackToHomepage(){
        $homepage = new Homepage();
        $homepage->getBrowser()->get('mobil-bekas');
        $homepage->clickLogo();
        $homepage->verifyPage();
    }

    public function testOpenSubCategoryMobilBekas_ByClickFromHomepage_ShouldbeOnMobilBekasPage(){
        $homepage = new Homepage();
        $homepage->clickElementLevel1(\DataCatName::ID_MOBIL);
        $listings = $homepage->clickElementLevel2(\DataCatName::ID_MOBIL_MOBIL_BEKAS);
        $listings->verifyCategoryPage_Mobil_MobilBekas();
    }

    public function testOpenSubCategoryAksesorisMobil_ByClickFromHomepage_ShoulBeOnAksesorisMobilPage(){
        $homepage = new Homepage();
        $homepage->clickElementLevel1(\DataCatName::ID_MOBIL);
        $listings = $homepage->clickElementLevel2(\DataCatName::ID_MOBIL_AKSESORIS);
        $listings->verifyCategoryPage_Mobil_AksesorisMobil();
    }

}