@homepage
Feature: Homepage
  As a user of OLX
  I want to open Homepage
  And verify category link
  
  @parallel-scenario
  Scenario: open Homepage of OLX
    When I open olx homepage
    Then I should see homepage

  @parallel-scenario
  Scenario: verify link category of Mobil Bekas
    Given I am in homepage
    When I click Mobil category
    And I click Mobil Bekas sub-category
    Then I am in Mobil Bekas Page

  @parallel-scenario
  Scenario: verify link category of Aksesoris Mobil
    Given I am in homepage
    When I click Mobil category
    And I click Aksesoris Mobil sub category
    Then I am in Aksesoris Mobil page

  @parallel-scenario
   Scenario: verify link category of Audio Mobil
     Given I am in homepage
     When I click Mobil category
     And I click Audio Mobil sub-category
     Then I am in Audio Mobil page

  @parallel-scenario
  Scenario: verify link category of Sparepart Mobil
    Given I am in homepage
    When I click Mobil category
    And I click Sparepat Mobil sub-category
    Then I am in Sparepart page

  Scenario: verify link category of Velg and Ban Mobil
    Given I am in homepage
    When I click Mobil category
    And I click Velg and Ban Mobil sub-category
    Then I am in Velg and Ban Mobil page

  Scenario:
    Given I am in homepage
    When I click Motor category
    And I click Motor Bekas sub-category
    Then I am in Motor Bekas page

  Scenario:
    Given I am in homepage
    When I click Motor category
    And I click Aksesoris Motor sub-category
    Then I am in Aksesoris Motor page

  Scenario:
    Given I am in homepage
    When I click Motor category
    And I click Helm category
    Then I am in Helm page

  Scenario:
    Given I am in homepage
    When I click Motor category
    And I click Sparepart Motor sub-category
    Then I am in Sparepart Motor page

  Scenario:
    Given I am in homepage
    When I click Property category
    And I click Rumah sub-category
    Then I am in Rumah page

  Scenario:
    Given I am in homepage
    When I click Property category
    And I click Apartment sub-category
    Then I am in Apartment page

  Scenario:
    Given I am in homepage
    When I click Property category
    And I click Indekos sub-category
    Then I am in Indekos page

  Scenario:
    Given I am in homepage
    When I click Property category
    And I click Bangunan Komersil sub-category
    Then I am in Bangunan Komersil page

  Scenario:
    Given I am in homepage
    When I click Property category
    And I click Tanah sub-category
    Then I am in Tanah page

  Scenario:
    Given I am in homepage
    When I click Property category
    And I click Property Lainnya sub-category
    Then I am in Propery Lainnya page

  Scenario:
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Fashion Wanita sub-category
    Then I am in Fashion Wanita page

  Scenario:
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Fashion Pria sub-category
    Then I am in Keperluan Pribadi page

  Scenario:
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Jam Tangan sub-category
    Then I am in Jam Tangan page

  Scenario:
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Pakaian Olahraga sub-category
    Then I am in Keperluan Olahraga page

  Scenario:
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Perhiasan sub-category
    Then I am in Perhiasan page

  Scenario:
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Make Up and Parfume sub-category
    Then I am in Make Up and Parfume page

  Scenario:
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Terapi Pengobatan sub-category
    Then I am in Terapi Pengobatan page

  Scenario:
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Perawatan sub-category
    Then I am in Perawatan page

  Scenario:
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Nutrisi Suplemen sub-category
    Then I am in Nutrisi Suplemen page

  Scenario:
    Given I am in homepage
    When I click Keperluan Pribady category
    And I click Keperluan Pribadi Lainnya sun-category
    Then I am in Keperluan pribadi Lainnya page

  Scenario:
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Handphone sub-category
    Then I am in Handphone page

  Scenario:
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Tablet sub-category
    Then I am in Tablet page

  Scenario:
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Aksesoris HP and Tablet sub-category
    Then I am in Aksesoris HP and Tablet page

  Scenario:
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Fotografi sub-category
    Then I am in Fotografi page

  Scenario:
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Rumah Tangga sub-category
    Then I am in Rumah Tangga page

  Scenario:
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Games Console sub-category
    Then I am in Games Console page

  Scenario:
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Komputer sub-category
    Then I am in Komputer page

  Scenario:
    Given I am in homepage
    When I click Electronic Gadget category
    And I click Lampu sub-category
    Then I am in Lampu page

  Scenario:
    Given I am in homepage
    When I click Electronic Gadget category
    And I click TV and Audio, Video sub-category
    Then I am in TV and Audio, Video page

  Scenario:
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Alat Musik sub-category
    Then I am in Alat Musik page

  Scenario:
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Hobi Olahraga sub-category
    Then I am in Hobi Olahraga page

  Scenario:
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Sepeda & Aksesoris sub-category
    Then I am in Sepeda & Aksesoris page

  Scenario:
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Handicrafts sub-category
    Then I am in Handicrafts page

  Scenario:
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Barang Antik sub-category
    Then I am in Barang Antik page

  Scenario:
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Buku & Majalah sub-category
    Then I am in Buku & Majalah page

  Scenario:
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Koleksi sub-category
    Then I am in Koleksi page

  Scenario:
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Mainan Hobi sub-category
    Then I am in Mainan Hobi page

  Scenario:
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Musik & Film sub-category
    Then I am in Musik & Film page

  Scenario:
    Given I am in homepage
    When I click Hobi & Olahraga category
    And I click Hewan Peliharaan sub-category
    Then I am in Hewan Peliharaan page

  Scenario:
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Makanan & Minuman sub-category
    Then I am in Makanan & Minuman page

  Scenario:
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Furniture sub-category
    Then I am in Furniture page

  Scenario:
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Dekorasi Rumah sub-category
    Then I am in Dekorasi Rumah page

  Scenario:
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Konstruksi dan Taman sub-category
    Then I am in Kontruksi dan Taman page

  Scenario:
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Jam sub-category
    Then I am in Jam page

  Scenario:
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Lampu Rumah Tangga sub-category
    Then I am in Lampu Rumah Tangga page

  Scenario:
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Perlengkapan Rumah sub-category
    Then I am in Perlengkapan Rumah page

  Scenario:
    Given I am in homepage
    When I click Rumah Tangga category
    And I click Rumah Tangga Lainnya sub-category
    Then I am in Rumah Tangga Lainnya page

  Scenario:
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Pakaian Bayi sub-category
    Then I am in Pakaian Bayi page

  Scenario:
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Perlengkapan Bayi sub-category
    Then I am in Perlengkapan Bayi page

  Scenario:
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Perlengkapan Ibu Bayi sub-category
    Then I am in Perlengkapan Ibu Bayi page

  Scenario:
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Boneka & Mainan Anak sub-ctegory
    Then I am in Boneka & Mainan Anak page

  Scenario:
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Buku Anak-anak sub-category
    Then I am in Buku Anak-anak Page

  Scenario:
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Stroller sub-category
    Then I am in Stroller page

  Scenario:
    Given I am in homepage
    When I click Perlengkapan Bayi & Anak category
    And I click Perlengkapan Bayi & Anak Lainnya sub-category
    Then I am in Perlengkapan Bayi & Anak Lainnya page

  Scenario:
    Given I am in homepage
    When I click Kantor & Industri category
    And I click Peralatan Kantor sub-category
    Then I am in Peralatan Kantor page

  Scenario:
    Given I am in homepage
    When I click Kantor & Industri category
    And I click Perlengkapan Usaha sub-category
    Then I am in Perlengkapan Usaha page

  Scenario:
    Given I am in homepage
    When I click Kantor & Industri category
    And I click Mesin & Keperluan Industri sub-category
    Then I am in Mesin & Keperluan Industri page

  Scenario:
    Given I am in homepage
    When I click Kantor & Industri category
    And I click Stationery sub-category
    Then I am in Stationery page

  Scenario:
    Given I am in homepage
    When I click Kantor & Industri category
    And I click Kantor & Industri Lainnya sub-category
    Then I am in Kantor & Industri Lainnya page

  Scenario:
    Given I am in homepage
    When I click Jasa & Lowongan Kerja category
    And I click Lowongan sub-category
    Then I am in Lowongan page

  Scenario:
    Given I am in homepage
    When I click Jasa & Lowongan Kerja category
    And I click Cari Pekerjaan sub-category
    Then I am in Cari Pekerjaan page

  Scenario:
    Given I am in homepage
    When I click Jasa & Lowongan Kerja category
    And I click Jasa sub-category
    Then I am in Jasa page




