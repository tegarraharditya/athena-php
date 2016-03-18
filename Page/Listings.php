<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 3/8/16
 * Time: 10:07 AM
 */

namespace Tests\Page;


class Listings extends OneWeb
{
    private $MOBIL_MOBIL_BEKAS ='';
    private $MOBIL_AKSESORIS_MOBIL = '';
    private $MOBIL_AUDIO_MOBIL = '';
    private $MOBIL_SPAREPART = '';
    private $MOBIL_VELG_AND_BAN = '';

    private $MOTOR_MOTOR_BEKAS = '';
    private $MOTOR_AKSESORIS = '';
    private $MOTOR_HELM = '';
    private $MOTOR_SPAREPART = '';

    private $PROPERTY_RUMAH = '';
    private $PROPERTY_APARTMENT = '';
    private $PROPERTY_INDEKOS = '';
    private $PROPERTY_BANGUNAN_KOMERSIL = '';
    private $PROPERTY_TANAH = '';
    private $PROPERTY_LAINNYA = '';

    private $PRIBADI_FASHION_WANITA = '';
    private $PRIBADI_FASHION_PRIA = '';
    private $PRIBADI_JAM_TANGAN = '';
    private $PRIBADI_PAKAIAN_OR = '';
    private $PRIBADI_PERHIASAN = '';
    private $PRIBADI_MAKEUP_PARFUME = '';
    private $PRIBADI_TERAPI_PENGOBATAN = '';
    private $PRIBADI_PERAWATAN = '';
    private $PRIBADI_NUTRISI_SUPLEMEN = '';
    private $PRIBADI_LAINNYA = '';

    private $ENG_HANDPHONE = '';
    private $ENG_TABLET = '';
    private $ENG_AKSESORIS_HP_TABLET = '';
    private $ENG_FOTOGRAFI = '';
    private $ENG_RUMAH_TANGGA = '';
    private $ENG_GAMES_CONSOLE = '';
    private $ENG_KOMPUTER = '';
    private $ENG_LAMPU = '';
    private $ENG_TV_AUDIO_VIDEO = '';

    private $HO_ALAT_MUSIK = '';
    private $HO_OLAHRAGA = '';
    private $HO_SEPEDA_AKSESORIS = '';
    private $HO_HANDICRAFTS = '';
    private $HO_BARANG_ANTIK = '';
    private $HO_BUKU_MAJALAH = '';
    private $HO_KOLEKSI = '';
    private $HO_MAINAN_HOBI = '';
    private $HO_MUSIK_FILM = '';
    private $HO_HEWAN_PELIHARAAN = '';

    private $RT_MAKANAN_MINUMAN = '';
    private $RT_FURNITURE = '';
    private $RT_DEKORASI_RUMAH = '';
    private $RT_KONSTRUKSI_TAMAN = '';
    private $RT_JAM = '';
    private $RT_LAMPU = '';
    private $RT_PERLENGKAPAN_RUMAH = '';
    private $RT_LAINNYA = '';

    private $PBA_PAKAIAN = '';
    private $PBA_PERLENGKAPAN_BAYI = '';
    private $PBA_PERLENGKAPAN_IBU_BAYI = '';
    private $PBA_BONEKA_MAINAN_ANAK = '';
    private $PBA_BUKU_ANAK = '';
    private $PBA_STROLLER = '';
    private $PBA_LAINNYA = '';

    private $KI_PERALATAN_KANTOR = '';
    private $KI_PERLENGKAPAN_USAHA = '';
    private $KI_MESIN_KEPERLUAN_INDUSTRI = '';
    private $KI_STATIONARY = '';
    private $KI_LAINNYA = '';

    private $LOKER_CARI_PEKERJAAN = '';
    private $LOKER_JASA = '';


    public function __construct()
    {
        parent::__construct('listings');
    }

    public function clickPage($page){
        $index = $page-1;
        $this->getElementPage($index)->thenFind()->asHtmlElement()->click();
    }

    private function getElementPage($index){
        //return $this->getElement()->withXpath("//*[@id='page_nav_pagination']//li[".$index."]/a");
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath("//*[@id='page_nav_pagination']//li[".$index."]/a");
    }

    public function verifyCategoryPage_Mobil_MobilBekas(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOBIL_MOBIL_BEKAS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Mobil_AksesorisMobil(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOBIL_AKSESORIS_MOBIL,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Mobil_AudioMobil(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOBIL_AUDIO_MOBIL,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Mobil_Sparepart(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOBIL_SPAREPART,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Mobil_VelgAndBan(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOBIL_VELG_AND_BAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Motor_MotorBekas(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOTOR_MOTOR_BEKAS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Motor_Aksesoris(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOTOR_AKSESORIS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Motor_Helm(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOTOR_HELM,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Motor_SparePart(){
        \PHPUnit_Framework_Assert::assertEquals($this->MOTOR_SPAREPART,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_Rumah(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_RUMAH,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_Apartment(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_APARTMENT,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_Indekos(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_INDEKOS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_BangunanKomersil(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_BANGUNAN_KOMERSIL,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_Tanah(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_TANAH,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Property_Lainnya(){
        \PHPUnit_Framework_Assert::assertEquals($this->PROPERTY_LAINNYA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_FashionWanita(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_FASHION_WANITA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_FashionPria(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_FASHION_PRIA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_JamTangan(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_JAM_TANGAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_PakaianOR(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_PAKAIAN_OR,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_Perhiasan(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_PERHIASAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_MakeUp_Parfume(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_MAKEUP_PARFUME,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_Terapi_Pengobatan(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_TERAPI_PENGOBATAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_Perawatan(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_PERAWATAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_Nutrisi_Suplemen(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_NUTRISI_SUPLEMEN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Pribadi_Lainnya(){
        \PHPUnit_Framework_Assert::assertEquals($this->PRIBADI_LAINNYA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Handphone(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_HANDPHONE,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Tablet(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_TABLET,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Aksesoris_HP_Tablet(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_AKSESORIS_HP_TABLET,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Fotografi(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_FOTOGRAFI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_RumahTangga(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_RUMAH_TANGGA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Games_Console(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_GAMES_CONSOLE,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Komputer(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_KOMPUTER,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_Lampu(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_LAMPU,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_ENG_TV_Audio_Video(){
        \PHPUnit_Framework_Assert::assertEquals($this->ENG_TV_AUDIO_VIDEO,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_Alatmusik(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_ALAT_MUSIK,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_Olahraga(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_OLAHRAGA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_SepedaAksesoris(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_SEPEDA_AKSESORIS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_Handicrafts(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_HANDICRAFTS,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_BarangAntik(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_BARANG_ANTIK,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_BukuMajalah(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_BUKU_MAJALAH,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_Koleksi(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_KOLEKSI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_MainanHobi(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_MAINAN_HOBI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_MusikFilm(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_MUSIK_FILM,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_HO_HewanPeliharaan(){
        \PHPUnit_Framework_Assert::assertEquals($this->HO_HEWAN_PELIHARAAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_MakananMinuman(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_MAKANAN_MINUMAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_Furniture(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_FURNITURE,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_DekorasiRumah(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_DEKORASI_RUMAH,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_KontruksiTaman(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_KONSTRUKSI_TAMAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_Jam(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_JAM,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_Lampu(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_LAMPU,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_PerlengkapanRumah(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_PERLENGKAPAN_RUMAH,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_RT_Lainnya(){
        \PHPUnit_Framework_Assert::assertEquals($this->RT_LAINNYA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_KI_PeralatanKantor(){
        \PHPUnit_Framework_Assert::assertEquals($this->KI_PERALATAN_KANTOR,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_KI_PerlengkapanUsaha(){
        \PHPUnit_Framework_Assert::assertEquals($this->KI_PERLENGKAPAN_USAHA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_KI_MesinKeperluanIndustri(){
        \PHPUnit_Framework_Assert::assertEquals($this->KI_MESIN_KEPERLUAN_INDUSTRI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_KI_Stationary(){
        \PHPUnit_Framework_Assert::assertEquals($this->KI_STATIONARY,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_KI_Lainnya(){
        \PHPUnit_Framework_Assert::assertEquals($this->KI_LAINNYA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Loker_Lowongan(){
        \PHPUnit_Framework_Assert::assertEquals($this->LOKER_LOWONGAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Loker_CariPekerjaan(){
        \PHPUnit_Framework_Assert::assertEquals($this->LOKER_CARI_PEKERJAAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_Loker_Jasa(){
        \PHPUnit_Framework_Assert::assertEquals($this->LOKER_JASA,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_Pakaian(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_PAKAIAN,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_PerlengkapanBayi(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_PERLENGKAPAN_BAYI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_PerlengkapanIbuBayi(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_PERLENGKAPAN_IBU_BAYI,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_BonekaMainanAnak(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_BONEKA_MAINAN_ANAK,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_BukuAnak(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_BUKU_ANAK,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_Stroller(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_STROLLER,$this->getAttributeBodyPage());
    }

    public function verifyCategoryPage_PBA_Lainnya(){
        \PHPUnit_Framework_Assert::assertEquals($this->PBA_LAINNYA,$this->getAttributeBodyPage());
    }
}