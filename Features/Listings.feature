@listings
  Feature:
    As User I want see Ads Listing

  Scenario: TC_OW_005_001 - User can navigate to next page
    Given I am in a Listings page
    When I click next page
    Then I can see Ads Listings in page

  Scenario: TC_OW_005_002 - User can navigate to previous page
    Given I am in a Listings page
    And I click next page
    When I click prev button
    Then I can see Ads Listings in page

  Scenario:
    Given I am in a Listings page
    Then I can see Iklan Promosi Section
    And I can verify only top listings on Iklan Promosi section
    And I can see Iklan Lainnya section
    And I can verify listing with yellow background
    And I can verify listing with Istimewa label

  Scenario:
    Given I am in a Listings page
    When I click ads
    Then I am in Listings Details page

  Scenario Outline:
    Given I am in a Listings page
    When I click pilih sub-categoty button
    And I click sub-category level2 <level2>
    And I click sub-category level3 <level3>
    Then I can see Ads Listings in page

    Examples:
    |level2|level3|
    |Mobil Bekas|Honda|

  Scenario:
    Given I am in a Listings page
    When I click ubah urutan button
    And I click Iklan Termahal
    Then I can verify that it's sorted by the most expensive listings

  Scenario:
    Given I am in a Listings page
    When I click ubah urutan button
    And I click Iklan Termurah
    Then I can verify that it's sorted by the cheapest

  Scenario:
    Given I am in a Listings page
    When I click ubah urutan button
    And I click Iklan Terbaru
    Then I can verify that it's sorted by the newest

  Scenario:
    Given I am in a Listings page
    When I click ubah urutan button
    And I click Iklan Terlama
    Then I can verify that it's sorted by oldest

  Scenario:
    Given I am in a Listings page
    When I click Pilih Kondisi button
    And I click Baru
    Then I can verify that condition of product is new

  Scenario:
    Given I am in a Listings page
    When I click Pilih Kondisi button
    And I click Bekas
    Then I can verify that condition of product is second hand





