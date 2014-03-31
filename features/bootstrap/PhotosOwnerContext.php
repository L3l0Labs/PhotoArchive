<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;

class PhotosOwnerContext implements SnippetAcceptingContext
{
    /**
     * @Given I am photos owner
     */
    public function iAmPhotosOwner()
    {
    }

    /**
     * @Given directory :directoryName has such photos:
     */
    public function directoryHasSuchPhotos($directoryName, TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Given I want to upload my whole photos directory
     */
    public function iWantToUploadMyWholePhotosDirectory()
    {
        throw new PendingException();
    }

    /**
     * @When I upload :directoryName directory as :archiveName archive
     */
    public function iUploadDirectoryAsArchive($directoryName, $archiveName)
    {
        throw new PendingException();
    }

    /**
     * @Then I should be able to download and preview :archiveName archive
     */
    public function iShouldBeAbleToDownloadAndPreviewArchive($archiveName)
    {
        throw new PendingException();
    }

    /**
     * @Given I have :archiveName photo archive
     */
    public function iHavePhotoArchive($archiveName)
    {
        throw new PendingException();
    }

    /**
     * @Given I want upload photo to existing archive
     */
    public function iWantUploadPhotoToExistingArchive()
    {
        throw new PendingException();
    }

    /**
     * @When I upload :photoPath photo to :archiveName archive
     */
    public function iUploadPhotoToArchive($photoPath, $archiveName)
    {
        throw new PendingException();
    }

    /**
     * @Then I should be able to download and preview :photoPath photo from :archiveName archive
     */
    public function iShouldBeAbleToDownloadAndPreviewPhotoFromArchive($photoPath, $archiveName)
    {
        throw new PendingException();
    }
}
