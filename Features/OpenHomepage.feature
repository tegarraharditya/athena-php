@openHomepage
Feature: OpenHomepage
  As a user of OLX
  I want to open Homepage

  Scenario: open Homepage of OLX
    Given I have a url
    When I open a url
    Then I should see homepage