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
use Tests\Page\Homepage;
use Tests\Page\Listings;

class OpenHomepageContext extends AthenaTestContext
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
    private $ID_MOBIL_AKSESORIS = 'aksesoris_4760';
    private $ID_MOBIL_AUDIO_MOBIL = 'audio-mobil_4762';
    private $ID_MOBIL_SPAREPART = 'sparepart_4759';
    private $ID_MOBIL_VELG_AND_BAN = 'velg-dan-ban_4761';

    private $ID_MOTOR = 'motor_87';
    private $ID_MOTOR_VIEWALL = 'view_all_87';
    private $ID_MOTOR_BEKAS = 'motor-bekas_200';
    private $ID_MOTOR_HELM = 'helm_4824';
    private $ID_MOTOR_SPAREPART = 'sparepart_4822';
    private $ID_MOTOR_AKSESORIS = 'aksesoris_4823';

    private $ID_PROPERTY = 'properti_88';
    private $ID_PROPERTI_VIEWALL = 'view_all_88';
    private $ID_PROPERTY_RUMAH = 'rumah_4825';
    private $ID_PROPERTY_APARTMENT = 'apartment_4826';
    private $ID_PROPERTY_INDEKOS = 'indekos_4833';
    private $ID_PROPERTY_BANGUNAN_KOMERSIL = 'bangunan-komersil_5094';
    private $ID_PROPERTY_TANAH = 'tanah_4827';
    private $ID_PROPERTY_LAINNYA = 'properti-lainnya_4834';

    private $ID_PRIBADI = 'keperluan-pribadi_98';
    private $ID_PRIBADI_VIEWALL = 'view_all_98';
    private $ID_PRIBADI_FASHION_WANITA = 'fashion-wanita_230';
    private $ID_PRIBADI_FASHION_PRIA = 'fashion-pria_229';
    private $ID_PRIBADI_JAM_TANGAN = 'jam-tangan_231';
    private $ID_PRIBADI_PAKAIAN_OR = 'pakaian-olahraga_5095';
    private $ID_PRIBADI_PERHIASAN = 'perhiasan_232';
    private $ID_PRIBADI_MAKEUP_PARFUM = 'make-up-parfum_233';
    private $ID_PRIBADI_TERAPI_PENGOBATAN = 'terapi-pengobatan_5123';
    private $ID_PRIBADI_PERAWATAN = 'perawatan_234';
    private $ID_PRIBADI_NUTRISI_SUPLEMEN = 'nutrisi-suplemen_5126';
    private $ID_PRIBADI_LAINNYA = 'lainnya_5124';

    private $ID_ENG = 'elektronik-gadget_92';
    private $ID_ENG_VIEWALL = 'view_all_92';
    private $ID_ENG_HANDPHONE = 'handphone_208';
    private $ID_ENG_TABLET = 'tablet_209';
    private $ID_ENG_AKSESORIS_HP_TABLET = 'aksesoris-hp-tablet_215';
    private $ID_ENG_FOTOGRAFI = 'fotografi_211';
    private $ID_ENG_RUMAH_TANGGA = 'elektronik-rumah-tangga_214';
    private $ID_ENG_GAMES_CONSOLE = 'games-console_212';
    private $ID_ENG_KOMPUTER = 'komputer_213';
    private $ID_ENG_LAMPU = 'lampu_4952';
    private $ID_ENG_TV_AUDIO_VIDEO = 'tv-audio-video_210';

    private $ID_HO = 'hobi-olahraga_94';
    private $ID_HO_VIEWALL = 'view_all_217';
    private $ID_HO_ALAT_MUSIK = 'alat-musik';
    private $ID_HO_OLAH_RAGA = 'olahraga_218';
    private $ID_HO_SEPEDA_AKSESORIS = 'sepeda-aksesoris_219';
    private $ID_HO_HANDICRAFTS = 'handicrafts_222';
    private $ID_HO_BARANG_ANTIK = 'barang-antik_4964';
    private $ID_HO_BUKU_MAJALAH = 'buku-majalah_220';
    private $ID_HO_KOLEKSI = 'koleksi_221';
    private $ID_HO_MAINAN_HOBI = 'mainan-hobi_223';
    private $ID_HO_MUSIK_FILM = 'musik-film_4975';
    private $ID_HO_HEWAN_PELIHARAAN = 'hewan-peliharaan_235';

    private $ID_RT = 'rumah-tangga_89';
    private $ID_RT_VIEWALL = 'view_all_89';
    private $ID_RT_MAKANAN_MINUMAN = 'makanan-minuman_4845';
    private $ID_RT_FURNITURE = 'furniture_4835';
    private $ID_RT_DEKORASI_RUMAH = 'dekorasi-rumah_4836';
    private $ID_RT_KONSTRUKSI_TAMAN = 'konstruksi-dan-taman_4842';
    private $ID_RT_JAM = 'jam_4841';
    private $ID_RT_LAMPU = 'lampu_4844';
    private $ID_RT_PERLENGKAPAN_RUMAH_TANGGA = 'perlengkapan-rumah_202';
    private $ID_RT_LAINNYA = 'lain_4843';

    private $ID_PBA = 'perlengkapan-bayi-anak_96';
    private $ID_PB_VIEWALL = 'view_all_96';
    private $ID_PBA_PAKAIAN = 'pakaian_5049';
    private $ID_PBA_PERLENGKAPAN_BAYI = 'perlengkapan-bayi_224';
    private $ID_PBA_PERLENGKAPAN_IBU_BAYI = 'perlengkapan-ibu-bayi_5048';
    private $ID_PBA_BONEKA_MAINAN_ANAK = 'boneka-mainan-anak_5142';
    private $ID_PBA_BUKU_ANAK = 'buku-anak_5046';
    private $ID_PBA_STROLLER  = 'stroller_5053';
    private $ID_PBA_LAINNYA = 'lain-lain_5047';

    private $ID_KINDUSTRI = 'kantor-industri_90';
    private $ID_KINDUSTRI_VIEWALL = 'view_all_90';
    private $ID_KINDUSTRI_PERALATAN_KANTOR = 'peralatan-kantor_203';//kembar dengan yg all
    private $ID_KINDUSTRI_PERLENGKAPAN_USAHA = 'perlengkapan-usaha_5090';
    private $ID_KINDUSTRI_MESIN_KEPERLUAN_INDUSTRI = 'mesin-keperluan-industri_4846';
    private $ID_KINDUSTRY_STATIONERY = 'stationery_4852';
    private $ID_KINDUSTRI_LAINNYA = 'lain-lain_4853';

    private $ID_JASA = 'jasa-lowongan-kerja_97';
    private $ID_JASA_VIEWALL = 'view_all_226';
    private $ID_JASA_LOWONGAN = 'lowongan_226';
    private $ID_JASA_CARI_PEKERJAAN = 'cari-pekerjaan_227';
    private $ID_JASA_JASA = 'jasa_228';

    public function __construct(){
        $this->homepage = new Homepage(Athena::browser());
    }

    /**
     * @When /^I open olx homepage$/
     */
    public function iOpenUrl(){
        $this->homepage->open("http://olxindonesia.github.io/apollo/home.html");
        sleep(10);
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
     * @And /^I click Mobil Bekas sub-category$/
     */
    public function iClickMobilBekasSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_MOBIL_MOBIL_BEKAS);
    }

    /**
     * @Then /^I am in Mobil Bekas Page$/
     */
    public function iAmInSubCategoryMobilBekasPage(){
        $this->iClickMobilBekasSubCategory()->verifyCategoryPage_Mobil_MobilBekas();
    }

    /**
     * @And /^I click Aksesoris Mobil sub category$/
     */
    public function iclickAksesorisMobilSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_MOBIL_AKSESORIS);
    }

    /**
     * @Then /^I am in Aksesoris Mobil page$/
     */
    public function iAmInSubCategoryAksesorisMobilPage(){
        $this->iclickAksesorisMobilSubCategory()->verifyCategoryPage_Mobil_AksesorisMobil();
    }

    /**
     * @And /^I click Audio Mobil sub-category$/
     */
    public function iClickAudioMobilSubcategory(){
        return $this->homepage->clickElementLevel2($this->ID_MOBIL_AUDIO_MOBIL);
    }

    /**
     * @Then /^I am in Audio Mobil page$/
     */
    public function iAmInSubCategoryAudioMobilPage(){
        $this->iClickAudioMobilSubcategory()->verifyCategoryPage_Mobil_AudioMobil();
    }

    /**
     * @And /^I click Sparepat Mobil sub-category$/
     */
    public function iClickSparepartMobilSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_MOBIL_SPAREPART);
    }

    /**
     * @Then /^I am in Sparepart page$/
     */
    public function iAmInSubCategorySparepartMobilPage(){
        $this->iClickSparepartMobilSubCategory()->verifyCategoryPage_Mobil_Sparepart();
    }

    /**
     * @And /^I click Velg and Ban Mobil sub-category$/
     */
    public function iClickVelgAndBanMobilSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_MOBIL_VELG_AND_BAN);
    }

    /**
     * @Then /^I am in Velg and Ban Mobil page$/
     */
    public function iAmInSubCategoryVelgAndBanMobilPage(){
        $this->iClickVelgAndBanMobilSubCategory()->verifyCategoryPage_Mobil_VelgAndBan();
    }

    /**
     * @When /^I click Motor category$/
     */
    public function iClickMotorCategory(){
        $this->homepage->clickElementLevel1($this->ID_MOTOR);
    }

    /**
     * @And /^I click Motor Bekas sub-category$/
     */
    public function iClickMotorBekasSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_MOTOR_BEKAS);
    }

    /**
     * @Then /^I am in Motor Bekas page$/
     */
    public function iAmInSubCategoryMotorBekasPage(){
        $this->iClickMotorBekasSubCategory()->verifyCategoryPage_Motor_MotorBekas();
    }

    /**
     * @And /^I click Helm category$/
     */
    public function iClickHelmSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_MOTOR_HELM);
    }

    /**
     * @Then /^I am in Helm page$/
     */
    public function iAminSubCategoryHelmPage(){
        $this->iClickHelmSubCategory()->verifyCategoryPage_Motor_Helm();
    }

    /**
     * @And /^I click Aksesoris Motor sub-category$/
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
     * @And /^I click Sparepart Motor sub\-category$/
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
     * @And /^I click Rumah sub-category$/
     */
    public function iClickRumahSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PROPERTY_RUMAH);
    }

    /**
     * @Then /^I am in Rumah page$/
     */
    public function iAmInSubCategoryRumahPage(){
        $this->iClickRumahSubCategory()->verifyCategoryPage_Property_Rumah();
    }

    /**
     * @And /^I click Apartment sub-category$/
     */
    public function iClickApartmentSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PROPERTY_APARTMENT);
    }

    /**
     * @Then /^I am in Apartment page$/
     */
    public function iAmInSubCategoryApartmentPage(){
        $this->iClickApartmentSubCategory()->verifyCategoryPage_Property_Apartment();
    }

    /**
     * @And /^I click Indekos sub-category$/
     */
    public function iClickIndekosSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PROPERTY_INDEKOS);
    }

    /**
     * @Then /^I am in Indekos page$/
     */
    public function iAmInSubCategoryIndekosPage(){
        $this->iClickIndekosSubCategory()->verifyCategoryPage_Property_Indekos();
    }

    /**
     * @And /^I click Bangunan Komersil sub-category$/
     */
    public function iClickBangunanKomersilSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PROPERTY_BANGUNAN_KOMERSIL);
    }

    /**
     * @Then /^I am in Bangunan Komersil page$/
     */
    public function iAmInSubCategoryBangunanKomersilPage(){
        $this->iClickBangunanKomersilSubCategory()->verifyCategoryPage_Property_BangunanKomersil();
    }

    /**
     * @And /^I click Tanah sub-category$/
     */
    public function iClickTanahSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PROPERTY_TANAH);
    }

    /**
     * @Then /^I am in Tanah page$/
     */
    public function iAmInSubCategoryTanahPage(){
        $this->iClickTanahSubCategory()->verifyCategoryPage_Property_Tanah();
    }

    /**
     * @And /^I click Property Lainnya sub-category$/
     */
    public function iClickPropertyLainnyaSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PROPERTY_LAINNYA);
    }

    /**
     * @Then /^I am in Propery Lainnya page$/
     */
    public function iAmInSubCategoryPropertyLainnyaPage(){
        $this->iClickPropertyLainnyaSubCategory()->verifyCategoryPage_Property_Lainnya();
    }

    /**
     * @When /^I click Keperluan Pribady category$/
     */
    public function iClickKeperluanPribadiCategory(){
        $this->homepage->clickElementLevel1($this->ID_PRIBADI);
    }

    /**
     * @And /^I click Fashion Wanita sub-category$/
     */
    public function iClickFashionWanitaSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PRIBADI_FASHION_WANITA);
    }

    /**
     * @Then /^I am in Fashion Wanita page$/
     */
    public function iAmInSubCategoryFashionWanitaPage(){
        $this->iClickFashionWanitaSubCategory()->verifyCategoryPage_Pribadi_FashionWanita();
    }

    /**
     * @And /^I click Fashion Pria sub-category$/
     */
    public function iClickFashionPriaSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PRIBADI_FASHION_PRIA);
    }

    /**
     * @Then /^I am in Keperluan Pribadi page$/
     */
    public function iAmInSubCategoryFashionPriaPage(){
        $this->iClickFashionPriaSubCategory()->verifyCategoryPage_Pribadi_FashionPria();
    }

    /**
     * @And /^I click Jam Tangan sub-category$/
     */
    public function iClickJamTanganSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PRIBADI_JAM_TANGAN);
    }

    /**
     * @Then /^I am in Jam Tangan page$/
     */
    public function iAmInSubCategoryJamTanganPage(){
        $this->iClickJamTanganSubCategory()->verifyCategoryPage_Pribadi_JamTangan();
    }

    /**
     * @And /^I click Pakaian Olahraga sub-category$/
     */
    public function iClickPakaianORSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PRIBADI_PAKAIAN_OR);
    }

    /**
     * @Then /^I am in Keperluan Olahraga page$/
     */
    public function iAmInSubCategoryKeperluanORPage(){
        $this->iClickPakaianORSubCategory()->verifyCategoryPage_Pribadi_PakaianOR();
    }

    /**
     * @And /^I click Perhiasan sub-category$/
     */
    public function iClickPerhiasanSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PRIBADI_PERHIASAN);
    }

    /**
     * @Then /^I am in Perhiasan page$/
     */
    public function iAmInSubCategoryPerhiasanPage(){
        $this->iClickPerhiasanSubCategory()->verifyCategoryPage_Pribadi_Perhiasan();
    }

    /**
     * @And /^I click Make Up and Parfume sub-category$/
     */
    public function iClickMakeUpAndParfumeSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PRIBADI_MAKEUP_PARFUM);
    }

    /**
     * @Then /^I am in Make Up and Parfume page$/
     */
    public function iAmInSubCategoryMakeUpAndParfumePage(){
        $this->iClickMakeUpAndParfumeSubCategory()->verifyCategoryPage_Pribadi_MakeUp_Parfume();
    }

    /**
     * @And /^I click Terapi Pengobatan sub-category$/
     */
    public function iClickTerapiPengobatanSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PRIBADI_TERAPI_PENGOBATAN);
    }

    /**
     * @Then /^I am in Terapi Pengobatan page$/
     */
    public function iAmSubCategoryTerapiPengobatanPage(){
        $this->iClickTerapiPengobatanSubCategory()->verifyCategoryPage_Pribadi_Terapi_Pengobatan();
    }

    /**
     * @And /^I click Perawatan sub-category$/
     */
    public function iClickPerawatanSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PRIBADI_PERAWATAN);
    }

    /**
     * @Then /^I am in Perawatan page$/
     */
    public function iAmInSubCategoryPerawatanPage(){
        $this->iClickPerawatanSubCategory()->verifyCategoryPage_Pribadi_Perawatan();
    }

    /**
     * @And /^I click Nutrisi Suplemen sub-category$/
     */
    public function iClickNutrisiSuplemenSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PRIBADI_NUTRISI_SUPLEMEN);
    }

    /**
     * @Then /^I am in Nutrisi Suplemen page$/
     */
    public function iAmInSubCategoryNutrisiSuplemenPage(){
        $this->iClickNutrisiSuplemenSubCategory()->verifyCategoryPage_Pribadi_Nutrisi_Suplemen();
    }

    /**
     * @And /^I click Keperluan Pribadi Lainnya sun-category$/
     */
    public function iClickKeperluanPribadiLainnyaSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_PRIBADI_LAINNYA);
    }

    /**
     * @Then /^I am in Keperluan pribadi Lainnya page$/
     */
    public function iAmInSubCategoryKeperluanPribadiLainnyaPage(){
        $this->iClickKeperluanPribadiLainnyaSubCategory()->verifyCategoryPage_Pribadi_Lainnya();
    }

    /**
     * @When /^I click Electronic Gadget category$/
     */
    public function iClickElectronicCategory(){
        $this->homepage->clickElementLevel1($this->ID_ENG);
    }

    /**
     * @And /^I click Handphone sub-category$/
     */
    public function iClickHandphoneSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_ENG_HANDPHONE);
    }

    /**
     * @Then /^I am in Handphone page$/
     */
    public function iAmInSubCategoryHanphonePage(){
        $this->iClickHandphoneSubCategory()->verifyCategoryPage_ENG_Handphone();
    }

    /**
     * @And /^I click Tablet sub-category$/
     */
    public function iClickTabletSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_ENG_TABLET);
    }

    /**
     * @Then /^I am in Tablet page$/
     */
    public function iAmInSubCategoryTabletPage(){
        $this->iClickTabletSubCategory()->verifyCategoryPage_ENG_Tablet();
    }

    /**
     * @And /^I click Aksesoris HP and Tablet sub-category$/
     */
    public function iClickAksesorisHPTabletSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_ENG_AKSESORIS_HP_TABLET);
    }

    /**
     * @Then /^I am in Aksesoris HP and Tablet page$/
     */
    public function iAmInSubCategoryAksesorisHpTabletPage(){
        $this->iClickAksesorisHPTabletSubCategory()->verifyCategoryPage_ENG_Aksesoris_HP_Tablet();
    }

    /**
     * @And /^I click Fotografi sub-category$/
     */
    public function iClickFotografiSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_ENG_FOTOGRAFI);
    }

    /**
     * @Then /^I am in Fotografi page$/
     */
    public function iAmInSubCategoryFotografiPage(){
        $this->iClickFotografiSubCategory()->verifyCategoryPage_ENG_Fotografi();
    }

    /**
     * @And /^I click Rumah Tangga sub-category$/
     */
    public function iClickRumahTanggaSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_ENG_RUMAH_TANGGA);
    }

    /**
     * @Then /^I am in Rumah Tangga page$/
     */
    public function iAmInSubCategoryRumahTanggaPage(){
        $this->iClickRumahTanggaSubCategory()->verifyCategoryPage_ENG_RumahTangga();
    }

    /**
     * @And /^I click Games Console sub-category$/
     */
    public function iClickGamesConsoleSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_ENG_GAMES_CONSOLE);
    }

    /**
     * @Then /^I am in Games Console page$/
     */
    public function iAmInSubCategoryGamesConsolePage(){
        $this->iClickGamesConsoleSubCategory()->verifyCategoryPage_ENG_Games_Console();
    }

    /**
     * @And /^I click Komputer sub-category$/
     */
    public function iClickKomputerSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_ENG_KOMPUTER);
    }

    /**
     * @Then /^I am in Komputer page$/
     */
    public function iAmInSubCategoryKomputerPage(){
        $this->iClickKomputerSubCategory()->verifyCategoryPage_ENG_Komputer();
    }

    /**
     * @And /^I click Lampu sub-category$/
     */
    public function iClickLampuSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_ENG_LAMPU);
    }

    /**
     * @Then /^I am in Lampu page$/
     */
    public function iAmInSubCategoryLampuPage(){
        $this->iClickLampuSubCategory()->verifyCategoryPage_ENG_Lampu();
    }

    /**
     * @And /^I click TV and Audio, Video sub-category$/
     */
    public function iClickTVAudioVideoSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_ENG_TV_AUDIO_VIDEO);
    }

    /**
     * @Then /^I am in TV and Audio, Video page$/
     */
    public function iAmInSubCategoryTVAudioVideoPage(){
        $this->iClickTVAudioVideoSubCategory()->verifyCategoryPage_ENG_TV_Audio_Video();
    }

    /**
     * @When /^I click Hobi & Olahraga category$/
     */
    public function iClickHobiOlahragaCategory(){
        $this->homepage->clickElementLevel1($this->ID_HO);
    }

    /**
     * @And /^I click Alat Musik sub-category$/
     */
    public function iClickAlatMasukSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_HO_ALAT_MUSIK);
    }

    /**
     * @Then /^I am in Alat Musik page$/
     */
    public function iAmInSubCategoryAlatMusikPage(){
        $this->iClickAlatMasukSubCategory()->verifyCategoryPage_HO_Alatmusik();
    }

    /**
     * @And /^I click Hobi Olahraga sub-category$/
     */
    public function iClickHobiOlahragaSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_HO_OLAH_RAGA);
    }

    /**
     * @Then /^I am in Hobi Olahraga page$/
     */
    public function iAmInSubCategoryHobiOlahragaPage(){
        $this->iClickHobiOlahragaSubCategory()->verifyCategoryPage_HO_Olahraga();
    }

    /**
     * @And /^I click Sepeda & Aksesoris sub-category$/
     */
    public function iClickSepedaAsesorisSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_HO_SEPEDA_AKSESORIS);
    }

    /**
     * @Then /^I am in Sepeda & Aksesoris page$/
     */
    public function iAmInSunCategorySepedaAksesorisPage(){
        $this->iClickSepedaAsesorisSubCategory()->verifyCategoryPage_HO_SepedaAksesoris();
    }

    /**
     * @And /^I click Handicrafts sub-category$/
     */
    public function iClickHandicraftsSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_HO_HANDICRAFTS);
    }

    /**
     * @Then /^I am in Handicrafts page$/
     */
    public function iAmInSubCategoryHandicraftsPage(){
        $this->iClickHandicraftsSubCategory()->verifyCategoryPage_HO_Handicrafts();
    }

    /**
     * @And /^I click Barang Antik sub-category$/
     */
    public function iClickBarangAntikSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_HO_BARANG_ANTIK);
    }

    /**
     * @Then /^I am in Barang Antik page$/
     */
    public function iAmInSubCategoryBarangAntikPage(){
        $this->iClickBarangAntikSubCategory()->verifyCategoryPage_HO_BarangAntik();
    }

    /**
     * @And /^I click Buku & Majalah sub-category$/
     */
    public function iClickBukuMajalahSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_HO_BUKU_MAJALAH);
    }

    /**
     * @Then /^I am in Buku & Majalah page$/
     */
    public function iAmInSUbCategoryBukuMajalahPage(){
        $this->iClickBukuMajalahSubCategory()->verifyCategoryPage_HO_BukuMajalah();
    }

    /**
     * @And /^I click Koleksi sub-category$/
     */
    public function iClickKoleksiSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_HO_KOLEKSI);
    }

    /**
     * @Then /^I am in Koleksi page$/
     */
    public function iAmInSubCategoryKolekasiPage(){
        $this->iClickKoleksiSubCategory()->verifyCategoryPage_HO_Koleksi();
    }

    /**
     * @And /^I click Mainan Hobi sub-category$/
     */
    public function iClickMainanHobiSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_HO_MAINAN_HOBI);
    }

    /**
     * @Then /^I am in Mainan Hobi page$/
     */
    public function iAmInSubCategoryMainanHobiPage(){
        $this->iClickMainanHobiSubCategory()->verifyCategoryPage_HO_MainanHobi();
    }

    /**
     * @And /^I click Musik & Film sub-category$/
     */
    public function iClickMusikAndFilmSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_HO_MUSIK_FILM);
    }

    /**
     * @Then /^I am in Musik & Film page$/
     */
    public function iAmInSubCategoryMusikAndFilmPage(){
        $this->iClickMusikAndFilmSubCategory()->verifyCategoryPage_HO_MusikFilm();
    }

    /**
     * @And /^I click Hewan Peliharaan sub-category$/
     */
    public function iClickHewanPeliharaanSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_HO_HEWAN_PELIHARAAN);
    }

    /**
     * @Then /^I am in Hewan Peliharaan page$/
     */
    public function iAmInSubCategoryHewanPeliharaanPage(){
        $this->iClickHewanPeliharaanSubCategory();
    }

    /**
     * @When /^I click Rumah Tangga category$/
     */
    public function iClickRumahTanggaCategory(){
        $this->homepage->clickElementLevel1($this->ID_RT);
    }

    /**
     * @And /^I click Makanan & Minuman sub-category$/
     */
    public function iClickMakananMinumanSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_RT_MAKANAN_MINUMAN);
    }

    /**
     * @Then /^I am in Makanan & Minuman page$/
     */
    public function iAmInSubCategoryMakananMinumanPage(){
        $this->iClickMakananMinumanSubCategory()->verifyCategoryPage_RT_MakananMinuman();
    }

    /**
     * @And /^I click Furniture sub-category$/
     */
    public function iClickFurnitureSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_RT_FURNITURE);
    }

    /**
     * @Then /^I am in Furniture page$/
     */
    public function iAmInSubCategoryFurniturePage(){
        $this->iClickFurnitureSubCategory()->verifyCategoryPage_RT_Furniture();
    }

    /**
     * @And /^I click Dekorasi Rumah sub-category$/
     */
    public function iClickDekorasiRumahSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_RT_DEKORASI_RUMAH);
    }

    /**
     * @Then /^I am in Dekorasi Rumah page$/
     */
    public function iAmInSubCategoryDekorasiRumahPage(){
        $this->iClickDekorasiRumahSubCategory()->verifyCategoryPage_RT_DekorasiRumah();
    }

    /**
     * @And /^I click Konstruksi dan Taman sub-category$/
     */
    public function iClickKonstruksiDanTamanSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_RT_KONSTRUKSI_TAMAN);
    }

    /**
     * @Then /^I am in Kontruksi dan Taman page$/
     */
    public function iAmInSubCategoryKonstruksiDanTamanPage(){
        $this->iClickKonstruksiDanTamanSubCategory()->verifyCategoryPage_RT_KontruksiTaman();
    }

    /**
     * @And /^I click Jam sub-category$/
     */
    public function iClickJamSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_RT_JAM);
    }

    /**
     * @Then /^I am in Jam page$/
     */
    public function iAmInSubCategoryJamPage(){
        $this->iClickJamSubCategory()->verifyCategoryPage_RT_Jam();
    }

    /**
     * @And /^I click Lampu Rumah Tangga sub-category$/
     */
    public function iClickLampuRumahTanggaSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_RT_LAMPU);
    }

    /**
     * @Then /^I am in Lampu Rumah Tangga page$/
     */
    public function iAmInSubCategoryLampuRumahTanggaPage(){
        $this->iClickLampuRumahTanggaSubCategory();
    }

    /**
     * @And /^I click Perlengkapan Rumah sub-category$/
     */
    public function iClickPerlengkapanRumahSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_RT_PERLENGKAPAN_RUMAH_TANGGA);
    }

    /**
     * @Then /^I am in Perlengkapan Rumah page$/
     */
    public function iAmInSubCategoryPerlengkapanRumahPage(){
        $this->iClickPerlengkapanRumahSubCategory()->verifyCategoryPage_RT_PerlengkapanRumah();
    }

    /**
     * @And /^I click Rumah Tangga Lainnya sub-category$/
     */
    public function iClickRumahTanggaLainnyaSubCategory(){
        return $this->homepage->clickElementLevel2($this->ID_RT_LAINNYA);
    }

    /**
     * @Then /^I am in Rumah Tangga Lainnya page$/
     */
    public function iAmInSubCategoryRumahTanggaLainnyaPage(){
        $this->iClickRumahTanggaLainnyaSubCategory()->verifyCategoryPage_RT_Lainnya();
    }

    /**
     * @When /^I click Perlengkapan Bayi & Anak category$/
     */
    public function iClickPerlengkapanBayiAnakSubCategory(){
        $this->homepage->clickElementLevel1($this->ID_PBA);
    }

    /**
     * @And /^I click Pakaian Bayi sub-category$/
     */
    public function iClickPakaianBayiSubCategory()
    {
        return $this->homepage->clickElementLevel2($this->ID_PBA_PAKAIAN);
    }

    /**
     * @Then /^I am in Pakaian Bayi page$/
     */
    public function iAmInPakaianBayiPage()
    {
        $this->iClickPakaianBayiSubCategory()->verifyCategoryPage_PBA_Pakaian();
    }


    /**
     * @And /^I click Perlengkapan Bayi sub-category$/
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
     * @And /^I click Perlengkapan Ibu Bayi sub-category$/
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
     * @And /^I click Boneka & Mainan Anak sub\-ctegory$/
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
     * @And /^I click Buku Anak\-anak sub\-category$/
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
     * @And /^I click Stroller sub\-category$/
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
     * @And /^I click Perlengkapan Bayi & Anak Lainnya sub\-category$/
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
     * @And /^I click Peralatan Kantor sub\-category$/
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
     * @And /^I click Perlengkapan Usaha sub\-category$/
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
     * @And /^I click Mesin & Keperluan Industri sub\-category$/
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
     * @And /^I click Stationery sub\-category$/
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
     * @And /^I click Kantor & Industri Lainnya sub\-category$/
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
     * @And /^I click Lowongan sub\-category$/
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
     * @And /^I click Cari Pekerjaan sub\-category$/
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
     * @And /^I click Jasa sub\-category$/
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


}
