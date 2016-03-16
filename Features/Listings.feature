@listings
  Feature:
    As User I want see Ads Listing

  Scenario: TC_OW_005_001 User can navigate to next page
    Given I am in Listings page
    When I click next page
    Then I can see Ads Listings in page

  Scenario: TC_OW_005_002 User can navigate to previous page
    Given I am in Listings page
    And I click next page
    When I click prev button
    Then I can see Ads Listings in page

  Scenario: TC_OW_005_003 There's promotion banner on bottom page
    Given I am in Listings page
    Then I can verify that there's promotion banner on bottom page

