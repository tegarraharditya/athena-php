<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/4/16
 * Time: 10:39 AM
 */

namespace Tests\Context;


use Athena\Athena;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Page\Homepage;
use Tests\Page\Listings;

class OpenHomepageContext extends BaseContext
{
    /**
     * @var Listings
     */
    private $listings;

    /**
     * @var Homepage
     */
    private $homepage;

    //ID
    private $ID_MOBIL = 'mobil_86';
    private $ID_MOBIL_VIEWALL = 'view_all_86';
    private $ID_MOBIL_MOBIL_BEKAS = 'mobil-bekas_198';
    private $ID_MOBIL_AKSESORIS = 'mobil-aksesoris_4760';
    private $ID_MOBIL_AUDIO_MOBIL = 'mobil-audio-mobil_4762';
    private $ID_MOBIL_SPAREPART = 'mobil-sparepart_4759';
    private $ID_MOBIL_VELG_AND_BAN = 'mobil-velg-dan-ban_4761';

    private $ID_MOTOR = 'motor_87';
    private $ID_MOTOR_VIEWALL = 'view_all_87';
    private $ID_MOTOR_BEKAS = 'motor-bekas_200';
    private $ID_MOTOR_HELM = 'motor-helm_4824';
    private $ID_MOTOR_SPAREPART = 'motor-sparepart_4822';
    private $ID_MOTOR_AKSESORIS = 'motor-aksesoris_4823';

    private $ID_PROPERTY = 'properti_88';
    private $ID_PROPERTI_VIEWALL = 'view_all_88';
    private $ID_PROPERTY_RUMAH = 'properti-rumah_4825';
    private $ID_PROPERTY_APARTMENT = 'properti-apartment_4826';
    private $ID_PROPERTY_INDEKOS = 'properti-indekos_4833';
    private $ID_PROPERTY_BANGUNAN_KOMERSIL = 'properti-bangunan-komersil_5094';
    private $ID_PROPERTY_TANAH = 'properti-tanah_4827';
    private $ID_PROPERTY_LAINNYA = 'properti-properti-lainnya_4834';

    private $ID_PRIBADI = 'keperluan-pribadi_98';
    private $ID_PRIBADI_VIEWALL = 'view_all_98';
    private $ID_PRIBADI_FASHION_WANITA = 'keperluan-pribadi-fashion-wanita_230';
    private $ID_PRIBADI_FASHION_PRIA = 'keperluan-pribadi-fashion-pria_229';
    private $ID_PRIBADI_JAM_TANGAN = 'keperluan-pribadi-jam-tangan_231';
    private $ID_PRIBADI_PAKAIAN_OR = 'keperluan-pribadi-pakaian-olahraga_5095';
    private $ID_PRIBADI_PERHIASAN = 'keperluan-pribadi-perhiasan_232';
    private $ID_PRIBADI_MAKEUP_PARFUM = 'keperluan-pribadi-make-up-parfum_233';
    private $ID_PRIBADI_TERAPI_PENGOBATAN = 'keperluan-pribadi-terapi-pengobatan_5123';
    private $ID_PRIBADI_PERAWATAN = 'keperluan-pribadi-perawatan_234';
    private $ID_PRIBADI_NUTRISI_SUPLEMEN = 'keperluan-pribadi-nutrisi-suplemen_5126';
    private $ID_PRIBADI_LAINNYA = 'keperluan-pribadi-lainnya_5124';

    private $ID_ENG = 'elektronik-gadget_92';
    private $ID_ENG_VIEWALL = 'view_all_92';
    private $ID_ENG_HANDPHONE = 'elektronik-gadget-handphone_208';
    private $ID_ENG_TABLET = 'elektronik-gadget-tablet_209';
    private $ID_ENG_AKSESORIS_HP_TABLET = 'elektronik-gadget-aksesoris-hp-tablet_215';
    private $ID_ENG_FOTOGRAFI = 'elektronik-gadget-fotografi_211';
    private $ID_ENG_RUMAH_TANGGA = 'elektronik-gadget-elektronik-rumah-tangga_214';
    private $ID_ENG_GAMES_CONSOLE = 'elektronik-gadget-games-console_212';
    private $ID_ENG_KOMPUTER = 'elektronik-gadget-komputer_213';
    private $ID_ENG_LAMPU = 'elektronik-gadget-lampu_4952';
    private $ID_ENG_TV_AUDIO_VIDEO = 'elektronik-gadget-tv-audio-video_210';

    private $ID_HO = 'hobi-olahraga_94';
    private $ID_HO_VIEWALL = 'view_all_217';
    private $ID_HO_ALAT_MUSIK = 'hobi-olahraga-alat-alat-musik_217';
    private $ID_HO_OLAH_RAGA = 'hobi-olahraga-olahraga_218';
    private $ID_HO_SEPEDA_AKSESORIS = 'hobi-olahraga-sepeda-aksesoris_219';
    private $ID_HO_HANDICRAFTS = 'hobi-olahraga-handicrafts_222';
    private $ID_HO_BARANG_ANTIK = 'hobi-olahraga-barang-antik_4964';
    private $ID_HO_BUKU_MAJALAH = 'hobi-olahraga-buku-majalah_220';
    private $ID_HO_KOLEKSI = 'hobi-olahraga-koleksi_221';
    private $ID_HO_MAINAN_HOBI = 'hobi-olahraga-mainan-hobi_223';
    private $ID_HO_MUSIK_FILM = 'hobi-olahraga-musik-film_4975';
    private $ID_HO_HEWAN_PELIHARAAN = 'hobi-olahraga-hewan-peliharaan_235';

    private $ID_RT = 'rumah-tangga_89';
    private $ID_RT_VIEWALL = 'view_all_89';
    private $ID_RT_MAKANAN_MINUMAN = 'rumah-tangga-makanan-minuman_4845';
    private $ID_RT_FURNITURE = 'rumah-tangga-furniture_4835';
    private $ID_RT_DEKORASI_RUMAH = 'rumah-tangga-dekorasi-rumah_4836';
    private $ID_RT_KONSTRUKSI_TAMAN = 'rumah-tangga-konstruksi-dan-taman_4842';
    private $ID_RT_JAM = 'rumah-tangga-jam_4841';
    private $ID_RT_LAMPU = 'rumah-tangga-lampu_4844';
    private $ID_RT_PERLENGKAPAN_RUMAH_TANGGA = 'rumah-tangga-perlengkapan-rumah_202';
    private $ID_RT_LAINNYA = 'rumah-tangga-lain-lain_4843';

    private $ID_PBA = 'perlengkapan-bayi-anak_96';
    private $ID_PB_VIEWALL = 'view_all_96';
    private $ID_PBA_PAKAIAN = 'perlengkapan-bayi-anak-pakaian_5049';
    private $ID_PBA_PERLENGKAPAN_BAYI = 'perlengkapan-bayi-anak-perlengkapan-bayi_224';
    private $ID_PBA_PERLENGKAPAN_IBU_BAYI = 'perlengkapan-bayi-anak-perlengkapan-ibu-bayi_5048';
    private $ID_PBA_BONEKA_MAINAN_ANAK = 'perlengkapan-bayi-anak-boneka-mainan-anak_5142';
    private $ID_PBA_BUKU_ANAK = 'perlengkapan-bayi-anak-buku-anak-anak_5046';
    private $ID_PBA_STROLLER  = 'perlengkapan-bayi-anak-stroller_5053';
    private $ID_PBA_LAINNYA = 'perlengkapan-bayi-anak-lain-lain_5047';

    private $ID_KINDUSTRI = 'kantor-industri_90';
    private $ID_KINDUSTRI_VIEWALL = 'view_all_90';
    private $ID_KINDUSTRI_PERALATAN_KANTOR = 'kantor-industri-peralatan-kantor_203';//kembar dengan yg all
    private $ID_KINDUSTRI_PERLENGKAPAN_USAHA = 'kantor-industri-perlengkapan-usaha_5090';
    private $ID_KINDUSTRI_MESIN_KEPERLUAN_INDUSTRI = 'kantor-industri-mesin-keperluan-industri_4846';
    private $ID_KINDUSTRY_STATIONERY = 'kantor-industri-stationery_4852';
    private $ID_KINDUSTRI_LAINNYA = 'kantor-industri-lain-lain_4853';

    private $ID_JASA = 'jasa-lowongan-kerja_97';
    private $ID_JASA_VIEWALL = 'view_all_226';
    private $ID_JASA_LOWONGAN = 'jasa-lowongan-kerja-lowongan_226';
    private $ID_JASA_CARI_PEKERJAAN = 'jasa-lowongan-kerja-cari-pekerjaan_227';
    private $ID_JASA_JASA = 'jasa-lowongan-kerja-jasa_228';

    public function __construct(){
        $this->homepage = new Homepage();
    }

    /**
     * @When /^I open olx homepage$/
     */
    public function iOpenUrl(){
        $this->homepage->open(true);
        //sleep(2000);
    }

    /**
     * @Then /^I should see homepage$/
     */
    public function iSeeHomepageTitle(){
        $this->homepage->verifyPage();
    }

    /**
     * @Given /^I am in homepage$/
     */
    public function iAmInHomePage(){
        $this->iOpenUrl();
        $this->iSeeHomepageTitle();
    }

    /**
     * @When /^I click Mobil category$/
     */
    public function iClickMobilCategory(){
        $this->homepage->clickElementLevel1($this->ID_MOBIL);
    }

    /**
     * @When /^I click Mobil Bekas sub-category$/
     */
    public function iClickMobilBekasSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_MOBIL_MOBIL_BEKAS);
    }

    /**
     * @Then /^I am in Mobil Bekas Page$/
     */
    public function iAmInSubCategoryMobilBekasPage(){
        $this->listings->verifyCategoryPage_Mobil_MobilBekas();
    }

    /**
     * @When /^I click Aksesoris Mobil sub category$/
     */
    public function iclickAksesorisMobilSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_MOBIL_AKSESORIS);
    }

    /**
     * @Then /^I am in Aksesoris Mobil page$/
     */
    public function iAmInSubCategoryAksesorisMobilPage(){
        $this->listings->verifyCategoryPage_Mobil_AksesorisMobil();
    }

    /**
     * @When /^I click Audio Mobil sub-category$/
     */
    public function iClickAudioMobilSubcategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_MOBIL_AUDIO_MOBIL);
    }

    /**
     * @Then /^I am in Audio Mobil page$/
     */
    public function iAmInSubCategoryAudioMobilPage(){
        $this->listings->verifyCategoryPage_Mobil_AudioMobil();
    }

    /**
     * @When /^I click Sparepat Mobil sub-category$/
     */
    public function iClickSparepartMobilSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_MOBIL_SPAREPART);
    }

    /**
     * @Then /^I am in Sparepart page$/
     */
    public function iAmInSubCategorySparepartMobilPage(){
        $this->listings->verifyCategoryPage_Mobil_Sparepart();
    }

    /**
     * @When /^I click Velg and Ban Mobil sub-category$/
     */
    public function iClickVelgAndBanMobilSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_MOBIL_VELG_AND_BAN);
    }

    /**
     * @Then /^I am in Velg and Ban Mobil page$/
     */
    public function iAmInSubCategoryVelgAndBanMobilPage(){
        $this->listings->verifyCategoryPage_Mobil_VelgAndBan();
    }

    /**
     * @When /^I click Motor category$/
     */
    public function iClickMotorCategory(){
        $this->homepage->clickElementLevel1($this->ID_MOTOR);
    }

    /**
     * @When /^I click Motor Bekas sub-category$/
     */
    public function iClickMotorBekasSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_MOTOR_BEKAS);
    }

    /**
     * @Then /^I am in Motor Bekas page$/
     */
    public function iAmInSubCategoryMotorBekasPage(){
        $this->listings->verifyCategoryPage_Motor_MotorBekas();
    }

    /**
     * @When /^I click Helm category$/
     */
    public function iClickHelmSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_MOTOR_HELM);
    }

    /**
     * @Then /^I am in Helm page$/
     */
    public function iAminSubCategoryHelmPage(){
        $this->listings->verifyCategoryPage_Motor_Helm();
    }

    /**
     * @When /^I click Aksesoris Motor sub-category$/
     */
    public function iClickAksesorisMotorSubCategory(){
        $this->listings=$this->homepage->clickElementLevel2($this->ID_MOTOR_AKSESORIS);
    }

    /**
     * @Then /^I am in Aksesoris Motor page$/
     */
    public function iAmInSubCategoryMotorSparepart(){
        $this->listings->verifyCategoryPage_Motor_Aksesoris();
    }

    /**
     * @When /^I click Sparepart Motor sub\-category$/
     */
    public function iClickSparepartMotorSubCategory1()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_MOTOR_SPAREPART);
    }

    /**
     * @Then /^I am in Sparepart Motor page$/
     */
    public function iAmInSparepartMotorPage()
    {
        $this->listings->verifyCategoryPage_Motor_SparePart();
    }

    /**
     * @When /^I click Property category$/
     */
    public function iClickPropertyCategory(){
        $this->homepage->clickElementLevel1($this->ID_PROPERTY);
    }

    /**
     * @When /^I click Rumah sub-category$/
     */
    public function iClickRumahSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PROPERTY_RUMAH);
    }

    /**
     * @Then /^I am in Rumah page$/
     */
    public function iAmInSubCategoryRumahPage(){
        $this->listings->verifyCategoryPage_Property_Rumah();
    }

    /**
     * @When /^I click Apartment sub-category$/
     */
    public function iClickApartmentSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PROPERTY_APARTMENT);
    }

    /**
     * @Then /^I am in Apartment page$/
     */
    public function iAmInSubCategoryApartmentPage(){
        $this->listings->verifyCategoryPage_Property_Apartment();
    }

    /**
     * @When /^I click Indekos sub-category$/
     */
    public function iClickIndekosSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PROPERTY_INDEKOS);
    }

    /**
     * @Then /^I am in Indekos page$/
     */
    public function iAmInSubCategoryIndekosPage(){
        $this->listings->verifyCategoryPage_Property_Indekos();
    }

    /**
     * @When /^I click Bangunan Komersil sub-category$/
     */
    public function iClickBangunanKomersilSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PROPERTY_BANGUNAN_KOMERSIL);
    }

    /**
     * @Then /^I am in Bangunan Komersil page$/
     */
    public function iAmInSubCategoryBangunanKomersilPage(){
        $this->listings->verifyCategoryPage_Property_BangunanKomersil();
    }

    /**
     * @When /^I click Tanah sub-category$/
     */
    public function iClickTanahSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PROPERTY_TANAH);
    }

    /**
     * @Then /^I am in Tanah page$/
     */
    public function iAmInSubCategoryTanahPage(){
        $this->listings->verifyCategoryPage_Property_Tanah();
    }

    /**
     * @When /^I click Property Lainnya sub-category$/
     */
    public function iClickPropertyLainnyaSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PROPERTY_LAINNYA);
    }

    /**
     * @Then /^I am in Propery Lainnya page$/
     */
    public function iAmInSubCategoryPropertyLainnyaPage(){
        $this->listings->verifyCategoryPage_Property_Lainnya();
    }

    /**
     * @When /^I click Keperluan Pribady category$/
     */
    public function iClickKeperluanPribadiCategory(){
        $this->homepage->clickElementLevel1($this->ID_PRIBADI);
    }

    /**
     * @When /^I click Fashion Wanita sub-category$/
     */
    public function iClickFashionWanitaSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PRIBADI_FASHION_WANITA);
    }

    /**
     * @Then /^I am in Fashion Wanita page$/
     */
    public function iAmInSubCategoryFashionWanitaPage(){
        $this->listings->verifyCategoryPage_Pribadi_FashionWanita();
    }

    /**
     * @When /^I click Fashion Pria sub-category$/
     */
    public function iClickFashionPriaSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PRIBADI_FASHION_PRIA);
    }

    /**
     * @Then /^I am in Keperluan Pribadi page$/
     */
    public function iAmInSubCategoryFashionPriaPage(){
        $this->listings->verifyCategoryPage_Pribadi_FashionPria();
    }

    /**
     * @When /^I click Jam Tangan sub-category$/
     */
    public function iClickJamTanganSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PRIBADI_JAM_TANGAN);
    }

    /**
     * @Then /^I am in Jam Tangan page$/
     */
    public function iAmInSubCategoryJamTanganPage(){
        $this->listings->verifyCategoryPage_Pribadi_JamTangan();
    }

    /**
     * @When /^I click Pakaian Olahraga sub-category$/
     */
    public function iClickPakaianORSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PRIBADI_PAKAIAN_OR);
    }

    /**
     * @Then /^I am in Keperluan Olahraga page$/
     */
    public function iAmInSubCategoryKeperluanORPage(){
        $this->listings->verifyCategoryPage_Pribadi_PakaianOR();
    }

    /**
     * @When /^I click Perhiasan sub-category$/
     */
    public function iClickPerhiasanSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PRIBADI_PERHIASAN);
    }

    /**
     * @Then /^I am in Perhiasan page$/
     */
    public function iAmInSubCategoryPerhiasanPage(){
        $this->listings->verifyCategoryPage_Pribadi_Perhiasan();
    }

    /**
     * @When /^I click Make Up and Parfume sub-category$/
     */
    public function iClickMakeUpAndParfumeSubCategory(){
        $this->listings =  $this->homepage->clickElementLevel2($this->ID_PRIBADI_MAKEUP_PARFUM);
    }

    /**
     * @Then /^I am in Make Up and Parfume page$/
     */
    public function iAmInSubCategoryMakeUpAndParfumePage(){
        $this->listings->verifyCategoryPage_Pribadi_MakeUp_Parfume();
    }

    /**
     * @When /^I click Terapi Pengobatan sub-category$/
     */
    public function iClickTerapiPengobatanSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PRIBADI_TERAPI_PENGOBATAN);
    }

    /**
     * @Then /^I am in Terapi Pengobatan page$/
     */
    public function iAmSubCategoryTerapiPengobatanPage(){
        $this->listings->verifyCategoryPage_Pribadi_Terapi_Pengobatan();
    }

    /**
     * @When /^I click Perawatan sub-category$/
     */
    public function iClickPerawatanSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PRIBADI_PERAWATAN);
    }

    /**
     * @Then /^I am in Perawatan page$/
     */
    public function iAmInSubCategoryPerawatanPage(){
        $this->listings->verifyCategoryPage_Pribadi_Perawatan();
    }

    /**
     * @When /^I click Nutrisi Suplemen sub-category$/
     */
    public function iClickNutrisiSuplemenSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PRIBADI_NUTRISI_SUPLEMEN);
    }

    /**
     * @Then /^I am in Nutrisi Suplemen page$/
     */
    public function iAmInSubCategoryNutrisiSuplemenPage(){
        $this->listings->verifyCategoryPage_Pribadi_Nutrisi_Suplemen();
    }

    /**
     * @When /^I click Keperluan Pribadi Lainnya sun-category$/
     */
    public function iClickKeperluanPribadiLainnyaSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PRIBADI_LAINNYA);
    }

    /**
     * @Then /^I am in Keperluan pribadi Lainnya page$/
     */
    public function iAmInSubCategoryKeperluanPribadiLainnyaPage(){
        $this->listings->verifyCategoryPage_Pribadi_Lainnya();
    }

    /**
     * @When /^I click Electronic Gadget category$/
     */
    public function iClickElectronicCategory(){
        $this->homepage->clickElementLevel1($this->ID_ENG);
    }

    /**
     * @When /^I click Handphone sub-category$/
     */
    public function iClickHandphoneSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_ENG_HANDPHONE);
    }

    /**
     * @Then /^I am in Handphone page$/
     */
    public function iAmInSubCategoryHanphonePage(){
        $this->listings->verifyCategoryPage_ENG_Handphone();
    }

    /**
     * @When /^I click Tablet sub-category$/
     */
    public function iClickTabletSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_ENG_TABLET);
    }

    /**
     * @Then /^I am in Tablet page$/
     */
    public function iAmInSubCategoryTabletPage(){
        $this->listings->verifyCategoryPage_ENG_Tablet();
    }

    /**
     * @When /^I click Aksesoris HP and Tablet sub-category$/
     */
    public function iClickAksesorisHPTabletSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_ENG_AKSESORIS_HP_TABLET);
    }

    /**
     * @Then /^I am in Aksesoris HP and Tablet page$/
     */
    public function iAmInSubCategoryAksesorisHpTabletPage(){
        $this->listings->verifyCategoryPage_ENG_Aksesoris_HP_Tablet();
    }

    /**
     * @When /^I click Fotografi sub-category$/
     */
    public function iClickFotografiSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_ENG_FOTOGRAFI);
    }

    /**
     * @Then /^I am in Fotografi page$/
     */
    public function iAmInSubCategoryFotografiPage(){
        $this->listings->verifyCategoryPage_ENG_Fotografi();
    }

    /**
     * @When /^I click Rumah Tangga sub-category$/
     */
    public function iClickRumahTanggaSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_ENG_RUMAH_TANGGA);
    }

    /**
     * @Then /^I am in Rumah Tangga page$/
     */
    public function iAmInSubCategoryRumahTanggaPage(){
        $this->listings->verifyCategoryPage_ENG_RumahTangga();
    }

    /**
     * @When /^I click Games Console sub-category$/
     */
    public function iClickGamesConsoleSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_ENG_GAMES_CONSOLE);
    }

    /**
     * @Then /^I am in Games Console page$/
     */
    public function iAmInSubCategoryGamesConsolePage(){
        $this->listings->verifyCategoryPage_ENG_Games_Console();
    }

    /**
     * @When /^I click Komputer sub-category$/
     */
    public function iClickKomputerSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_ENG_KOMPUTER);
    }

    /**
     * @Then /^I am in Komputer page$/
     */
    public function iAmInSubCategoryKomputerPage(){
        $this->listings->verifyCategoryPage_ENG_Komputer();
    }

    /**
     * @When /^I click Lampu sub-category$/
     */
    public function iClickLampuSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_ENG_LAMPU);
    }

    /**
     * @Then /^I am in Lampu page$/
     */
    public function iAmInSubCategoryLampuPage(){
        $this->listings->verifyCategoryPage_ENG_Lampu();
    }

    /**
     * @When /^I click TV and Audio, Video sub-category$/
     */
    public function iClickTVAudioVideoSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_ENG_TV_AUDIO_VIDEO);
    }

    /**
     * @Then /^I am in TV and Audio, Video page$/
     */
    public function iAmInSubCategoryTVAudioVideoPage(){
        $this->listings->verifyCategoryPage_ENG_TV_Audio_Video();
    }

    /**
     * @When /^I click Hobi & Olahraga category$/
     */
    public function iClickHobiOlahragaCategory(){
        $this->homepage->clickElementLevel1($this->ID_HO);
    }

    /**
     * @When /^I click Alat Musik sub-category$/
     */
    public function iClickAlatMasukSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_HO_ALAT_MUSIK);
    }

    /**
     * @Then /^I am in Alat Musik page$/
     */
    public function iAmInSubCategoryAlatMusikPage(){
        $this->listings->verifyCategoryPage_HO_Alatmusik();
    }

    /**
     * @When /^I click Hobi Olahraga sub-category$/
     */
    public function iClickHobiOlahragaSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_HO_OLAH_RAGA);
    }

    /**
     * @Then /^I am in Hobi Olahraga page$/
     */
    public function iAmInSubCategoryHobiOlahragaPage(){
        $this->listings->verifyCategoryPage_HO_Olahraga();
    }

    /**
     * @When /^I click Sepeda & Aksesoris sub-category$/
     */
    public function iClickSepedaAsesorisSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_HO_SEPEDA_AKSESORIS);
    }

    /**
     * @Then /^I am in Sepeda & Aksesoris page$/
     */
    public function iAmInSunCategorySepedaAksesorisPage(){
        $this->listings->verifyCategoryPage_HO_SepedaAksesoris();
    }

    /**
     * @When /^I click Handicrafts sub-category$/
     */
    public function iClickHandicraftsSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_HO_HANDICRAFTS);
    }

    /**
     * @Then /^I am in Handicrafts page$/
     */
    public function iAmInSubCategoryHandicraftsPage(){
        $this->listings ->verifyCategoryPage_HO_Handicrafts();
    }

    /**
     * @When /^I click Barang Antik sub-category$/
     */
    public function iClickBarangAntikSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_HO_BARANG_ANTIK);
    }

    /**
     * @Then /^I am in Barang Antik page$/
     */
    public function iAmInSubCategoryBarangAntikPage(){
        $this->listings->verifyCategoryPage_HO_BarangAntik();
    }

    /**
     * @When /^I click Buku & Majalah sub-category$/
     */
    public function iClickBukuMajalahSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_HO_BUKU_MAJALAH);
    }

    /**
     * @Then /^I am in Buku & Majalah page$/
     */
    public function iAmInSUbCategoryBukuMajalahPage(){
        $this->listings->verifyCategoryPage_HO_BukuMajalah();
    }

    /**
     * @When /^I click Koleksi sub-category$/
     */
    public function iClickKoleksiSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_HO_KOLEKSI);
    }

    /**
     * @Then /^I am in Koleksi page$/
     */
    public function iAmInSubCategoryKolekasiPage(){
        $this->listings->verifyCategoryPage_HO_Koleksi();
    }

    /**
     * @When /^I click Mainan Hobi sub-category$/
     */
    public function iClickMainanHobiSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_HO_MAINAN_HOBI);
    }

    /**
     * @Then /^I am in Mainan Hobi page$/
     */
    public function iAmInSubCategoryMainanHobiPage(){
        $this->listings->verifyCategoryPage_HO_MainanHobi();
    }

    /**
     * @When /^I click Musik & Film sub-category$/
     */
    public function iClickMusikAndFilmSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_HO_MUSIK_FILM);
    }

    /**
     * @Then /^I am in Musik & Film page$/
     */
    public function iAmInSubCategoryMusikAndFilmPage(){
        $this->listings->verifyCategoryPage_HO_MusikFilm();
    }

    /**
     * @When /^I click Hewan Peliharaan sub-category$/
     */
    public function iClickHewanPeliharaanSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_HO_HEWAN_PELIHARAAN);
    }

    /**
     * @Then /^I am in Hewan Peliharaan page$/
     */
    public function iAmInSubCategoryHewanPeliharaanPage(){
        $this->listings->verifyCategoryPage_HO_HewanPeliharaan();
    }

    /**
     * @When /^I click Rumah Tangga category$/
     */
    public function iClickRumahTanggaCategory(){
        $this->homepage->clickElementLevel1($this->ID_RT);
    }

    /**
     * @When /^I click Makanan & Minuman sub-category$/
     */
    public function iClickMakananMinumanSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_RT_MAKANAN_MINUMAN);
    }

    /**
     * @Then /^I am in Makanan & Minuman page$/
     */
    public function iAmInSubCategoryMakananMinumanPage(){
        $this->listings->verifyCategoryPage_RT_MakananMinuman();
    }

    /**
     * @When /^I click Furniture sub-category$/
     */
    public function iClickFurnitureSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_RT_FURNITURE);
    }

    /**
     * @Then /^I am in Furniture page$/
     */
    public function iAmInSubCategoryFurniturePage(){
        $this->listings->verifyCategoryPage_RT_Furniture();
    }

    /**
     * @When /^I click Dekorasi Rumah sub-category$/
     */
    public function iClickDekorasiRumahSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_RT_DEKORASI_RUMAH);
    }

    /**
     * @Then /^I am in Dekorasi Rumah page$/
     */
    public function iAmInSubCategoryDekorasiRumahPage(){
        $this->listings->verifyCategoryPage_RT_DekorasiRumah();
    }

    /**
     * @When /^I click Konstruksi dan Taman sub-category$/
     */
    public function iClickKonstruksiDanTamanSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_RT_KONSTRUKSI_TAMAN);
    }

    /**
     * @Then /^I am in Kontruksi dan Taman page$/
     */
    public function iAmInSubCategoryKonstruksiDanTamanPage(){
        $this->listings->verifyCategoryPage_RT_KontruksiTaman();
    }

    /**
     * @When /^I click Jam sub-category$/
     */
    public function iClickJamSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_RT_JAM);
    }

    /**
     * @Then /^I am in Jam page$/
     */
    public function iAmInSubCategoryJamPage(){
        $this->listings->verifyCategoryPage_RT_Jam();
    }

    /**
     * @When /^I click Lampu Rumah Tangga sub-category$/
     */
    public function iClickLampuRumahTanggaSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_RT_LAMPU);
    }

    /**
     * @Then /^I am in Lampu Rumah Tangga page$/
     */
    public function iAmInSubCategoryLampuRumahTanggaPage(){
        $this->listings->verifyCategoryPage_RT_Lampu();
    }

    /**
     * @When /^I click Perlengkapan Rumah sub-category$/
     */
    public function iClickPerlengkapanRumahSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_RT_PERLENGKAPAN_RUMAH_TANGGA);
    }

    /**
     * @Then /^I am in Perlengkapan Rumah page$/
     */
    public function iAmInSubCategoryPerlengkapanRumahPage(){
        $this->listings->verifyCategoryPage_RT_PerlengkapanRumah();
    }

    /**
     * @When /^I click Rumah Tangga Lainnya sub-category$/
     */
    public function iClickRumahTanggaLainnyaSubCategory(){
        $this->listings = $this->homepage->clickElementLevel2($this->ID_RT_LAINNYA);
    }

    /**
     * @Then /^I am in Rumah Tangga Lainnya page$/
     */
    public function iAmInSubCategoryRumahTanggaLainnyaPage(){
        $this->listings->verifyCategoryPage_RT_Lainnya();
    }

    /**
     * @When /^I click Perlengkapan Bayi & Anak category$/
     */
    public function iClickPerlengkapanBayiAnakSubCategory(){
        $this->homepage->clickElementLevel1($this->ID_PBA);
    }

    /**
     * @When /^I click Pakaian Bayi sub-category$/
     */
    public function iClickPakaianBayiSubCategory()
    {
        $this->listings = $this->homepage->clickElementLevel2($this->ID_PBA_PAKAIAN);
    }

    /**
     * @Then /^I am in Pakaian Bayi page$/
     */
    public function iAmInPakaianBayiPage()
    {
        $this->listings->verifyCategoryPage_PBA_Pakaian();
    }


    /**
     * @When /^I click Perlengkapan Bayi sub-category$/
     */
    public function iClickPerlengkapanBayiSubCategory(){
        $this->listings=$this->homepage->clickElementLevel2($this->ID_PBA_PERLENGKAPAN_BAYI);
    }

    /**
     * @Then /^I am in Perlengkapan Bayi page$/
     */
    public function iAmInSubCategoryPerlengkapanBayiPage(){
        $this->listings->verifyCategoryPage_PBA_PerlengkapanBayi();
    }

    /**
     * @When /^I click Perlengkapan Ibu Bayi sub-category$/
     */
    public function iClickPerlengkapanIbuBayiSubCategory(){
        $this->listings=$this->homepage->clickElementLevel2($this->ID_PBA_PERLENGKAPAN_IBU_BAYI);
    }

    /**
     * @Then /^I am in Perlengkapan Ibu Bayi page$/
     */
    public function iAmInSubCategoryPerlengkapanIbuBayiPage(){
        $this->listings->verifyCategoryPage_PBA_PerlengkapanIbuBayi();
    }

    /**
     * @When /^I click Boneka & Mainan Anak sub\-ctegory$/
     */
    public function iClickBonekaMainanAnakSubCtegory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_PBA_BONEKA_MAINAN_ANAK);
    }

    /**
     * @Then /^I am in Boneka & Mainan Anak page$/
     */
    public function iAmInBonekaMainanAnakPage()
    {
        $this->listings->verifyCategoryPage_PBA_BonekaMainanAnak();
    }

    /**
     * @When /^I click Buku Anak\-anak sub\-category$/
     */
    public function iClickBukuAnakAnakSubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_PBA_BUKU_ANAK);
    }

    /**
     * @Then /^I am in Buku Anak\-anak Page$/
     */
    public function iAmInBukuAnakAnakPage()
    {
        $this->listings->verifyCategoryPage_PBA_BukuAnak();
    }

    /**
     * @When /^I click Stroller sub\-category$/
     */
    public function iClickStrollerSubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_PBA_STROLLER);
    }

    /**
     * @Then /^I am in Stroller page$/
     */
    public function iAmInStrollerPage()
    {
       $this->listings->verifyCategoryPage_PBA_Stroller();
    }

    /**
     * @When /^I click Perlengkapan Bayi & Anak Lainnya sub\-category$/
     */
    public function iClickPerlengkapanBayiAnakLainnyaSubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_PBA_LAINNYA);
    }

    /**
     * @Then /^I am in Perlengkapan Bayi & Anak Lainnya page$/
     */
    public function iAmInPerlengkapanBayiAnakLainnyaPage()
    {
        $this->listings->verifyCategoryPage_PBA_Lainnya();
    }

    /**
     * @When /^I click Kantor & Industri category$/
     */
    public function iClickKantorIndustriCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_KINDUSTRI);
    }

    /**
     * @When /^I click Peralatan Kantor sub\-category$/
     */
    public function iClickPeralatanKantorSubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_KINDUSTRI_PERALATAN_KANTOR);
    }

    /**
     * @Then /^I am in Peralatan Kantor page$/
     */
    public function iAmInPeralatanKantorPage()
    {
        $this->listings->verifyCategoryPage_KI_PeralatanKantor();
    }

    /**
     * @When /^I click Perlengkapan Usaha sub\-category$/
     */
    public function iClickPerlengkapanUsahaSubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_KINDUSTRI_PERLENGKAPAN_USAHA);
    }

    /**
     * @Then /^I am in Perlengkapan Usaha page$/
     */
    public function iAmInPerlengkapanUsahaPage()
    {
        $this->listings->verifyCategoryPage_KI_PerlengkapanUsaha();
    }

    /**
     * @When /^I click Mesin & Keperluan Industri sub\-category$/
     */
    public function iClickMesinKeperluanIndustriSubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_KINDUSTRI_MESIN_KEPERLUAN_INDUSTRI);
    }

    /**
     * @Then /^I am in Mesin & Keperluan Industri page$/
     */
    public function iAmInMesinKeperluanIndustriPage()
    {
        $this->listings->verifyCategoryPage_KI_MesinKeperluanIndustri();
    }

    /**
     * @When /^I click Stationery sub\-category$/
     */
    public function iClickStationerySubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_KINDUSTRY_STATIONERY);
    }

    /**
     * @Then /^I am in Stationery page$/
     */
    public function iAmInStationeryPage()
    {
        $this->listings->verifyCategoryPage_KI_Stationary();
    }

    /**
     * @When /^I click Kantor & Industri Lainnya sub\-category$/
     */
    public function iClickKantorIndustriLainnyaSubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_KINDUSTRI_LAINNYA);
    }

    /**
     * @Then /^I am in Kantor & Industri Lainnya page$/
     */
    public function iAmInKantorIndustriLainnyaPage()
    {
        $this->listings->verifyCategoryPage_KI_Lainnya();
    }

    /**
     * @When /^I click Jasa & Lowongan Kerja category$/
     */
    public function iClickJasaLowonganKerjaCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_JASA);
    }

    /**
     * @When /^I click Lowongan sub\-category$/
     */
    public function iClickLowonganSubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_JASA_LOWONGAN);
    }

    /**
     * @Then /^I am in Lowongan page$/
     */
    public function iAmInLowonganPage()
    {
        $this->listings->verifyCategoryPage_Loker_Lowongan();
    }

    /**
     * @When /^I click Cari Pekerjaan sub\-category$/
     */
    public function iClickCariPekerjaanSubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_JASA_CARI_PEKERJAAN);
    }

    /**
     * @Then /^I am in Cari Pekerjaan page$/
     */
    public function iAmInCariPekerjaanPage()
    {
        $this->listings->verifyCategoryPage_Loker_CariPekerjaan();
    }

    /**
     * @When /^I click Jasa sub\-category$/
     */
    public function iClickJasaSubCategory()
    {
        $this->listings=$this->homepage->clickElementLevel2($this->ID_JASA_JASA);
    }

    /**
     * @Then /^I am in Jasa page$/
     */
    public function iAmInJasaPage()
    {
        $this->listings->verifyCategoryPage_Loker_Jasa();
    }

    /**
     * @Given /^I am in a page$/
     */
    public function iAmInAPage()
    {
        $this->homepage->clickElementLevel1($this->ID_MOBIL);
        $categoryPage = $this->homepage->clickElementLevel2($this->ID_MOBIL_MOBIL_BEKAS);
        $categoryPage->verifyCategoryPage_Mobil_MobilBekas();
    }

    /**
     * @When /^I click logo OLX$/
     */
    public function iClickLogoOLX()
    {
        $this->homepage->clickLogo();
    }

    /**
     * @Then /^I am navigated to homepage$/
     */
    public function iAmNavigatedToHomepage()
    {
        $this->homepage->verifyPage();
    }

    /**
     * @Then /^I still can click Hobi & Olahraga category$/
     */
    public function iStillCanClickHobiOlahragaCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_HO);
    }

    /**
     * @Given /^I still can click Jasa & Lowongan Kerja category$/
     */
    public function iStillCanClickJasaLowonganKerjaCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_JASA);
    }

    /**
     * @Given /^I still can click Kantor & Industri category$/
     */
    public function iStillCanClickKantorIndustriCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_KINDUSTRI);
    }

    /**
     * @Given /^I still can click Motor category$/
     */
    public function iStillCanClickMotorCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_MOTOR);
    }

    /**
     * @Given /^I still can click Mobil category$/
     */
    public function iStillCanClickMobilCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_MOBIL);
    }

    /**
     * @Given /^I still can click Property category$/
     */
    public function iStillCanClickPropertyCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_PROPERTY);
    }

    /**
     * @Given /^I still can click Rumah Tangga category$/
     */
    public function iStillCanClickRumahTanggaCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_RT);
    }

    /**
     * @Given /^I still can click Keperluan Pribadi category$/
     */
    public function iStillCanClickKeperluanPribadiCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_PRIBADI);
    }

    /**
     * @Given /^I still can click Perlengkapan Bayi & Anak category$/
     */
    public function iStillCanClickPerlengkapanBayiAnakCategory()
    {
        $this->homepage->clickElementLevel1($this->ID_PBA);
    }


}
