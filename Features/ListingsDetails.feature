@listingsdetails
Feature:
    As User I want to see the details of Listings

  Scenario:
    Given I am in Listings Details page
    Then I should see details of listings for Category Motor
    And I should see details of seller

  Scenario:
    Given I am in Listings Details page
    Then I should see details of listings for Category Mobil
    And I should see details of seller

  Scenario:
    Given I am in Listings Details page
    Then I should see details of listings for Category Property
    And I should see details of seller

  Scenario:
    Given I am in Listings Details page
    Then I should see details of listings for Category Keperluan Pribadi
    And I should see details of seller

  Scenario:
    Given I am in Listings Details page
    Then I should see details of listings for Category Electronic & Gadget
    And I should see details of seller

  Scenario:
    Given I am in Listings Details page
    Then I should see details of listings for Category Hobi & Olahraga
    And I should see details of seller

  Scenario:
    Given I am in Listings Details page
    Then I should see details of listings for Category Rumah Tangga
    And I should see details of seller

  Scenario:
    Given I am in Listings Details page
    Then I should see details of listings for Category Perlengkapan Bayi & Anak
    And I should see details of seller

  Scenario:
    Given I am in Listings Details page
    Then I should see details of listings for Category Kantor & Industri
    And I should see details of seller

  Scenario:
    Given I am in Listings Details page
    Then I should see details of listings for Category Jasa & Lowongan Kerja
    And I should see details of seller

  Scenario:
    Given I am in Listings Details page
    When I click phone number
    Then I should see seller phone number

  Scenario:
    Given I am in Listings Details page
    When I click Hubungi Penjual button
    Then I should see message box appear

  Scenario:
    Given I am in Listings Details page
    When I click report this ads
    And I fill all of the information needed
    And I submit the report
    Then I am be able to report this ads

