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
    |Sepeda     |
    |Samsung    |

  @parallel-scenario
  Scenario Outline: TC_OW_004_002 - Search in specific area
    Given I am in homepage
    And I type <keyword>
    When I click Pilih Lokasi Button
    And I choose province <province>
    And I choose city <city>
    Then I get products list in specific area containing <keyword>

    Examples:
      |keyword    |province|city|
      |Sepeda     |2 |3         |
      |Samsung    |2 |3         |

  @parallel-scenario
  Scenario Outline: TC_OW_004_002 - Search in specific area
    Given I am in homepage
    And I click Pilih Lokasi Button
    And I choose province <province>
    And I choose city <city>
    When I type <keyword>
    And I click search button
    Then I get products list in specific area containing <keyword>

    Examples:
      |keyword    |province|city|
      |Sepeda     |2 |3         |
      |Samsung    |2 |3         |

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
    When I click Pilih Lokasi Button
    And I choose province <province>
    And I choose city <city>
    Then I get all products in specific area

    Examples:
      |keyword|province|city|
      |       |2       |3   |

  @parallel-scenario
  Scenario Outline: TC_OW_004_005
    Given I am in homepage
    And I click Pilih Lokasi Button
    And I choose province <province>
    And I choose city <city>
    And I type <keyword>
    And I click search button
    Then I get products list in specific area containing <keyword>

    Examples:
      |keyword|province|city|
      |Samsung|2       |3   |

