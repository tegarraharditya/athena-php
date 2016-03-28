@homepage
Feature: Homepage
  As a user of OLX
  I want to open Homepage
  And verify category link


  @parallel-scenario
  Scenario:
    When I open olx homepage
    Then I should see homepage

  @parallel-scenario
  Scenario: TC_OW_001_002 - Be able to back to homepage by clicking OLX Header Logo
    Given I am in a page
    When I click logo OLX
    Then I am navigated to homepage

  @parallel-scenario
  Scenario: TC_OW_001_002 - verify link category of Mobil Bekas
    Given I am in homepage
    When I click Mobil category
    And I click Mobil Bekas sub-category
    Then I am in Mobil Bekas Page

  @parallel-scenario
  Scenario: TC_OW_001_002 - verify link category of Aksesoris Mobil
    Given I am in homepage
    When I click Mobil category
    And I click Aksesoris Mobil sub category
    Then I am in Aksesoris Mobil page

  @parallel-scenario
   Scenario: TC_OW_001_002 - verify link category of Audio Mobil
     Given I am in homepage
     When I click Mobil category
     And I click Audio Mobil sub-category
     Then I am in Audio Mobil page

  @parallel-scenario
  Scenario: TC_OW_001_002 - verify link category of Sparepart Mobil
    Given I am in homepage
    When I click Mobil category
    And I click Sparepat Mobil sub-category
    Then I am in Sparepart page

  @parallel-scenario
  Scenario: TC_OW_001_002 - verify link category of Velg and Ban Mobil
    Given I am in homepage
    When I click Mobil category
    And I click Velg and Ban Mobil sub-category
    Then I am in Velg and Ban Mobil page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Motor category
    And I click Motor Bekas sub-category
    Then I am in Motor Bekas page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Motor category
    And I click Aksesoris Motor sub-category
    Then I am in Aksesoris Motor page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Motor category
    And I click Helm category
    Then I am in Helm page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Motor category
    And I click Sparepart Motor sub-category
    Then I am in Sparepart Motor page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Property category
    And I click Rumah sub-category
    Then I am in Rumah page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Property category
    And I click Apartment sub-category
    Then I am in Apartment page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Property category
    And I click Indekos sub-category
    Then I am in Indekos page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Property category
    And I click Bangunan Komersil sub-category
    Then I am in Bangunan Komersil page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Property category
    And I click Tanah sub-category
    Then I am in Tanah page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Property category
    And I click Property Lainnya sub-category
    Then I am in Propery Lainnya page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Fashion Wanita sub-category
    Then I am in Fashion Wanita page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Fashion Pria sub-category
    Then I am in Keperluan Pribadi page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Jam Tangan sub-category
    Then I am in Jam Tangan page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Pakaian Olahraga sub-category
    Then I am in Keperluan Olahraga page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Perhiasan sub-category
    Then I am in Perhiasan page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Make Up and Parfume sub-category
    Then I am in Make Up and Parfume page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Terapi Pengobatan sub-category
    Then I am in Terapi Pengobatan page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Perawatan sub-category
    Then I am in Perawatan page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Nutrisi Suplemen sub-category
    Then I am in Nutrisi Suplemen page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Keperluan Pribadi Lainnya sun-category
    Then I am in Keperluan pribadi Lainnya page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Handphone sub-category
    Then I am in Handphone page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Tablet sub-category
    Then I am in Tablet page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Aksesoris HP and Tablet sub-category
    Then I am in Aksesoris HP and Tablet page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Fotografi sub-category
    Then I am in Fotografi page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Rumah Tangga sub-category
    Then I am in Rumah Tangga page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Games Console sub-category
    Then I am in Games Console page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Komputer sub-category
    Then I am in Komputer page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Lampu sub-category
    Then I am in Lampu page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Electronic Gadget category
    And I click TV and Audio, Video sub-category
    Then I am in TV and Audio, Video page

  @parallel-scenario
  Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Alat Musik sub-category
    Then I am in Alat Musik page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Hobi Olahraga sub-category
    Then I am in Hobi Olahraga page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Sepeda & Aksesoris sub-category
    Then I am in Sepeda & Aksesoris page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Handicrafts sub-category
    Then I am in Handicrafts page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Barang Antik sub-category
    Then I am in Barang Antik page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Buku & Majalah sub-category
    Then I am in Buku & Majalah page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Koleksi sub-category
    Then I am in Koleksi page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Mainan Hobi sub-category
    Then I am in Mainan Hobi page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Musik & Film sub-category
    Then I am in Musik & Film page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Hewan Peliharaan sub-category
    Then I am in Hewan Peliharaan page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Makanan & Minuman sub-category
    Then I am in Makanan & Minuman page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Furniture sub-category
    Then I am in Furniture page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Dekorasi Rumah sub-category
    Then I am in Dekorasi Rumah page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Konstruksi dan Taman sub-category
    Then I am in Kontruksi dan Taman page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Jam sub-category
    Then I am in Jam page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Lampu Rumah Tangga sub-category
    Then I am in Lampu Rumah Tangga page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Perlengkapan Rumah sub-category
    Then I am in Perlengkapan Rumah page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Rumah Tangga Lainnya sub-category
    Then I am in Rumah Tangga Lainnya page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Pakaian Bayi sub-category
    Then I am in Pakaian Bayi page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Perlengkapan Bayi sub-category
    Then I am in Perlengkapan Bayi page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Perlengkapan Ibu Bayi sub-category
    Then I am in Perlengkapan Ibu Bayi page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Boneka & Mainan Anak sub-ctegory
    Then I am in Boneka & Mainan Anak page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Buku Anak-anak sub-category
    Then I am in Buku Anak-anak Page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Stroller sub-category
    Then I am in Stroller page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Perlengkapan Bayi & Anak Lainnya sub-category
    Then I am in Perlengkapan Bayi & Anak Lainnya page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Kantor & Industri category
    And I click Peralatan Kantor sub-category
    Then I am in Peralatan Kantor page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Kantor & Industri category
    And I click Perlengkapan Usaha sub-category
    Then I am in Perlengkapan Usaha page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Kantor & Industri category
    And I click Mesin & Keperluan Industri sub-category
    Then I am in Mesin & Keperluan Industri page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Kantor & Industri category
    And I click Stationery sub-category
    Then I am in Stationery page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Kantor & Industri category
    And I click Kantor & Industri Lainnya sub-category
    Then I am in Kantor & Industri Lainnya page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Jasa & Lowongan Kerja category
    And I click Lowongan sub-category
    Then I am in Lowongan page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Jasa & Lowongan Kerja category
    And I click Cari Pekerjaan sub-category
    Then I am in Cari Pekerjaan page

  @parallel-scenario
   Scenario: TC_OW_001_002
    Given I am in homepage
    When I click Jasa & Lowongan Kerja category
    And I click Jasa sub-category
    Then I am in Jasa page

  @parallel-scenario
  Scenario: TC_OW_001_004
    Given I am in homepage
    When I click Electronic Gadget category
    Then I still can click Hobi & Olahraga category
    And I still can click Jasa & Lowongan Kerja category
    And I still can click Kantor & Industri category
    And I still can click Motor category
    And I still can click Mobil category
    And I still can click Property category
    And I still can click Rumah Tangga category
    And I still can click Keperluan Pribadi category
    And I still can click Perlengkapan Bayi & Anak category
