@search
Feature: Search
  As a user of OLX
  I want to search product on Olx
  
  @parallel-scenario
  Scenario Outline: TC_OW_004_001 - Search in all areas
    Given I am in homepage
    And I type <keyword>
    When I click search button
    Then I get products list containing <keyword>

    Examples:
    |keyword    |
    |sepeda     |
    |samsung s6 |

  @parallel-scenario
  Scenario Outline: TC_OW_004_002 - Search in specific area
    Given I am in homepage
    And I type <keyword>
    And I choose <area>
    When I click search button
    Then I get product list containing <keyword> in <area>

    Examples:
    |keyword    |area|
    |sepeda     |0 |
    |samsung s6 |1 |

  @parallel-scenario
  Scenario Outline: TC_OW_004_003 - Search using blank keyword in all areas
    Given I am in homepage
    And I type <keyword>
    When I click search button
    Then I get all product in all areas

    Examples:
    |keyword|
    |       |

  @parallel-scenario
  Scenario Outline: TC_OW_004_004 - Search using blank keyword in specific area
    Given I am in homepage
    And I type <keyword>
    And I choose <area>
    When I click search button
    Then I get all products in specific area

    Examples:
    |keyword|area|
    |       |0|

