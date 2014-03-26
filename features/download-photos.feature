Feature: Download photos
  As a photos owner
  I want to download my photos anywhere and everywhere in the world

  Scenario: Download full archive
    Given I am photos owner
    And I have photo archive with few photos
    When I download this archive
    Then all photos from my archive should be at my local storage

  Scenario: Download selected files
    Given I am photos owner
    And I have photo archive with few photos
    And I want to download selected photos from archive
    When I select some photos
    And I download selected photos
    Then all selected photos from my archive should be at my local storage
