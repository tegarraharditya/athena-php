@postads
  Feature: As User I want to be able to post Ads

  Scenario:
    Given I am in homepage
    When I click post Ads on Header
    Then It will be redirected to Post Ads Page

  @parallel-scenario
  Scenario Outline:  email and phone number random
    Given I go to posting ads page
    And I fill title
    And I choose category "<level1>" "<level2>" "<level3>"
    And I fill all extra fields "<level2>"
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

    Examples:
      |level1|level2|level3|
      |1 |1|1|

  Scenario Outline:  Create Ads Using Existing email address, random phone number
    Given I go to posting ads page
    And I fill title
    And I choose category "<level1>" "<level2>" "<level3>"
    And I fill all extra fields "<level2>"
    And I fill description
    And I upload photo
    And I choose location
    And I fill name
    And I fill existing email address
    And I fill Handphone number
    And I fill pin BB
    And I agree OLX can process my data
    And I want to accept newsletter
    When I click Pasang Iklan button (need confirmation)
    And I can see a pop up to continue with login
    And I click yes
    And I fill password
    And I click submit login
    Then I can see that I successfully post ads

    Examples:
      |level1|level2|level3|
      |1 |1|1|

  Scenario Outline:  Create Ads Using Existing email address and existing phone number
    Given I go to posting ads page
    And I fill title
    And I choose category "<level1>" "<level2>" "<level3>"
    And I fill all extra fields "<level2>"
    And I fill description
    And I upload photo
    And I choose location
    And I fill name
    And I fill existing email address
    And I fill existing verified phone number
    And I fill pin BB
    And I agree OLX can process my data
    And I want to accept newsletter
    When I click Pasang Iklan button (need confirmation)
    And I can see a pop up to continue with login
    And I click yes
    And I fill password
    And I click submit login
    Then I can see that I successfully post ads

      Examples:
        |level1|level2|level3|
        |1 |1|1|

  Scenario Outline: Create Ads Using Existing email and other's verified phone
    Given I go to posting ads page
    And I fill title
    And I choose category "<level1>" "<level2>" "<level3>"
    And I fill all extra fields "<level2>"
    And I fill description
    And I upload photo
    And I choose location
    And I fill name
    And I fill other's existing email address
    And I fill existing verified phone number
    And I fill pin BB
    And I agree OLX can process my data
    And I want to accept newsletter
    When I click Pasang Iklan button (need confirmation)
    And I can see a pop up to continue with login
    And I click yes
    And I fill password
    And I click submit login
    Then I see error : can not use this phone number

    Examples:
      |level1|level2|level3|
      |1 |1|1|

  Scenario: already login with match email
    Given I go to posting ads page
    And I post Ads using existing email and existing verified phone number
    When I post another ads using existing email and existing verified phone number
    Then I can see that I successfully post ads

  Scenario: already login and un-match email
    Given I go to posting ads page
    And I post Ads using existing email and existing verified phone number
    When I post another ads using other's email
    Then I see pop up to login again


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








