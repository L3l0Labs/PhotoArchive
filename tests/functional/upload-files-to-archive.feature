@wip
Feature: Archive photo
  As a photos owner
  I want to archive my photos securely using web application

  Scenario: Upload photos to archive
    Given I go to "/archive"
    When I fill in "Name" with "New test"
    And I attach the file "somefile.png" to "archive_upload[files][]"
    And I attach the file "somefile2.png" to "archive_upload[files][]"
    And I press "Create"
    Then "New test" archive with 2 files should be created
