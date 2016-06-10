@listings
  Feature:
    As User I want see Ads Listing

  @parallel-scenario
  Scenario: TC_OW_006_001 - User can navigate to next page
    Given I am in a Listings page
    When I click next page
    Then I can see Ads Listings in page

  @parallel-scenario
  Scenario: TC_OW_006_002 - User can navigate to previous page
    Given I am in a Listings page
    And I click next page
    When I click prev button
    Then I can see Ads Listings in page

  @parallel-scenario
  Scenario: TC_OW_006_003
    Given I am in a Listings page
    Then I can see Iklan Promosi Section
    And I can verify only top listings on Iklan Promosi section
    And I can see Iklan Lainnya section
    And I can verify listing with yellow background
    And I can verify listing with Istimewa label

  @parallel-scenario
  Scenario:TC_OW_006_004
    Given I am in a Listings page
    When I click ads
    Then I am in Listings Details page

  @parallel-scenario
  Scenario Outline:TC_OW_006_005 please use data cat name for level 2 & level 3
    Given I am in a Listings page
    When I click pilih sub-categoty button
    And I click sub-category level2 <level2>
    And I click sub-category level3 <level3>
    Then I can see proper result from <level2> and <level3>

    Examples:
      |level2|level3|
      |mobil-bekas_198|mobil-bekas/honda_4677|

  @parallel-scenario
  Scenario Outline:
    Given I am in Listings page level1
    When I click pilih sub-categoty button
    And I click sub-category level1 <level1>
    And I click sub-category level2 <level2>
    And I click sub-category level3 <level3>
    Then I can see proper result from <level2> and <level3>

    Examples:
    |level1|level2|level3|
    |mobil-86|mobil-bekas_198|mobil-bekas/honda_4677|

  @parallel-scenario
  Scenario: TC_OW_006_006
    Given I am in a Listings page
    When I click ubah urutan button
    And I click Iklan Termahal
    Then I can verify that it's sorted by the most expensive listings

  @parallel-scenario
  Scenario: TC_OW_006_007
    Given I am in a Listings page
    When I click ubah urutan button
    And I click Iklan Termurah
    Then I can verify that it's sorted by the cheapest

  @parallel-scenario
  Scenario:TC_OW_006_008
    Given I am in a Listings page
    When I click ubah urutan button
    And I click Iklan Terbaru
    Then I can verify that it's sorted by the newest

  @parallel-scenario
  Scenario:TC_OW_006_010
    Given I am in a Listings page
    When I click Pilih Kondisi button
    And I click Baru
    Then I can verify that condition of product is new

  @parallel-scenario
  Scenario:TC_OW_006_011
    Given I am in a Listings page
    When I click Pilih Kondisi button
    And I click Bekas
    Then I can verify that condition of product is used







