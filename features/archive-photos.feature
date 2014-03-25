Feature: As a photos owner I want to
  archive my photos securely so I have access to them
  everywhere

  Scenario: Create whole archive
    Given I am photos owner
    And I want to upload my whole photos directory
    When I select directory with photos
    And I upload this directory as archive
    Then I should be able to download and preview my new archive

  Scenario: Add single photo to archive
    Given I am photos owner
    And I have photo archive
    And I want upload photo to existing archive
    When I select single photo
    And I upload this photo to archive
    Then I should be able to download and preview this photo