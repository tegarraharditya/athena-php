@footer
Feature: Footer
  As a user of OLX
  I want to be able to see all footer link

  @parallel-scenario
  Scenario: TC_OW_003_001 - be able to verify all footer link
    Given I am in homepage
    Then I can verify all link on footer

  @parallel-scenario
  Scenario: TC_OW_003_002 - be able to verify that all link are not broken
    Given I am in homepage
    Then I can verify that all link are not broken


