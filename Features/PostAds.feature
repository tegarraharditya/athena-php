@postads
  Feature: As User I want to be able to post Ads

  Scenario:
    Given I am in homepage
    When I click post Ads on Header
    Then It will be redirected to Post Ads Page

  Scenario: Positive Scenario
    Given I go to posting ads page
    And I fill title
    And I choose category
    And I fill description
    And I upload photo
    And I choose location
    And I fill name
    And I fill email
    And I fill Handphone number
    And I fill pin BB
    And I agree OLX can process my data
    And I want to accept newsletter
    When I click Pasang Iklan button
    Then I can see that I successfully post ads

  Scenario: Negative Scenario
    Given I go to posting ads page
    When I submit pasang iklan (negative)
    Then I see error on title ads field
    And I see error on Category field
    And I see error on choose location field
    And I see error on Name field
    And I see error on Email field
    And I see error on No HP field
    And I see error on Agreement User field






