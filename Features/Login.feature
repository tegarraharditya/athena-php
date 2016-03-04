@login
Feature: Login
  As a user of OLX
  I want to log into site

  Scenario: login to the site with an existing user
    When I go to accounts page
    And I type email
    And I type password
    And I click submit button
    Then I should see myaccount page