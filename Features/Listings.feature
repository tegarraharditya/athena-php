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
    Then I can see Iklan Promosi
    And I can see Iklan lainnya

  Scenario:
    Given I am in a Listings page
    Then I can see Listings with Yellow Background on Top section
    And I can see Istimewa Label in Iklan Promosi Section
    And I can see Top Listings

    Scenario:
      Given I am in a Listings page
      When I click ads
      Then I am in Listings Details page



