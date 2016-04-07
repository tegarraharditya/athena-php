@footer
Feature: Footer
  As a user of OLX
  I want to be able to see all footer link

  @parallel-scenario
  Scenario: TC_OW_003_001 - be able to click 'Join OLX' link on footer
    Given I am in homepage
    Then I can verify all link on footer
    And I can check all link

  @parallel-scenario
  Scenario:
    Given I am in homepage
    Then I can verify that all link are not broken


