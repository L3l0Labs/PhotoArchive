Feature: Preview photos
  As a photo owner
  I want to previews archived photos
  so I will be able to choose which I want to download

  Scenario: Preview photos from archive
    Given I am photos owner
    And I have photo archive with few photos
    And I want to preview archive photos
    When I list photo archive
    Then I should see thumbs of photos in that archive
