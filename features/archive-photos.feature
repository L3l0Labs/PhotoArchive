@wip
Feature: Archive photo
  As a photos owner
  I want to archive my photos securely
  so I have access to them everywhere

  Background:
    Given I am photos owner
    And directory "/local-directory/myholidays" has such photos:
      | photo name |
      | DSC110.jpg |
      | DSC111.jpg |
      | DSC111.png |

  Scenario: Create whole archive
    Given I want to upload my whole photos directory
    When I upload "/local-directory/myholidays" directory as "my-holidays2014" archive
    Then I should be able to download and preview "my-holidays2014" archive

  Scenario: Add single photo to archive
    Given I have "my holidays" photo archive
    And I want upload photo to existing archive
    When I upload "/local-directory/myholidays/DSC110.jpg" photo to "my holidays" archive
    Then I should be able to download and preview "DSC110.jpg" photo from "my holidays" archive
