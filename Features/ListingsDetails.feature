@listingsdetails
Feature:
    As User I want to see the details of Listings


  Scenario Outline: TC_OW_005_001
    Given I am in Listings Details <category> page
    Then I should see details of listings for Category <category>
    And I should see details of seller

    Examples:
    |category|
    |mobil-bekas-details|
    |property-details   |
    |jasa-lowongan-details|

  Scenario Outline:
    Given I am in Listings Details <category> page
    When I click phone number
    Then I should see seller phone number

    Examples:
    |category|
    |mobil-bekas-details|

  Scenario Outline:
    Given I am in Listings Details <category> page
    When I click Hubungi Penjual button
    Then I should see message box appear

    Examples:
      |category|
      |mobil-bekas-details|

  Scenario Outline:
    Given I am in Listings Details <category> page
    And I have Contact Seller pop up appear
    When I fill email on email field
    And I fill details of message
    And I click submit button on Contact Seller form
    Then I am be able to submit message

    Examples:
      |category|
      |mobil-bekas-details|

  Scenario Outline:
    Given I am in Listings Details <category> page
    When I click report this ads
    And I fill all of the information needed
    And I submit the report
    Then I am be able to report this ads

    Examples:
      |category|
      |mobil-bekas-details|

