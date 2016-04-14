@listingsdetails
Feature:
    As User I want to see the details of Listings


  Scenario Outline: TC_OW_005_001
    Given I am in Listings Details <category> page
    Then I should see details of listings for Category <category>

    Examples:
    |category|
    |mobil-bekas-details|
    |property-details   |
    |jasa-lowongan-details|

  Scenario Outline: TC_OW_005_002
    Given I am in Listings Details <category> page
    Then I click Next Listings Details Page
    And I click Prev Listings Details Page

    Examples:
    |category|
    |mobil-bekas-details|

  Scenario Outline: TC_OW_005_003
    Given I am in Listings Details <category> page
    Then I can find that seller number element contains telp:

    Examples:
    |category|
    |mobil-bekas-details|

  Scenario Outline: TC_OW_005_004
    Given I am in Listings Details <category> page
    When I click Chat dengan Penjual button
    And I fill all of information needed
    And I click post
    Then bla bla bla

    Examples:
    |category|
    |mobil-bekas-details|
