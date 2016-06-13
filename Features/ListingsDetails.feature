@listingsdetails
Feature:
    As User I want to see the details of Listings


  @parallel-scenario
  Scenario Outline: TC_OW_005_001
    Given I am in Listings Details <category> page
    Then I should see details of listings for Category <category>

    Examples:
    |category|
    |mobil-bekas|
    |apartment|
    |lowongan|

  @parallel-scenario
  Scenario Outline: TC_OW_005_002
    Given I am in Listings Details <category> page
    Then I click Next Listings Details Page
    And I click Prev Listings Details Page

    Examples:
    |category|
    |mobil-bekas|

  @parallel-scenario
  Scenario Outline: TC_OW_005_003
    Given I am in Listings Details <category> page
    Then I can find that seller number element contains telp:

    Examples:
    |category|
    |mobil-bekas|

  @parallel-scenario
  Scenario Outline: TC_OW_005_004
    Given I am in Listings Details <category> page
    When I click Chat dengan Penjual button
    Then I see pop up suggestion to download apps

    Examples:
    |category|
    |mobil-bekas|

    @parallel-scenario
    Scenario Outline:
      Given I am in Listings Details <category> page
      When I click android icon
      And I click close
      Then I cannot see the android icon

      Examples:
        |category|
        |mobil-bekas|
