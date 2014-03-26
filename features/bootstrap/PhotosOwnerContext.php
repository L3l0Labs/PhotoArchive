<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;

class PhotosOwnerContext implements SnippetAcceptingContext
{

    /**
     * @Given I am photos owner
     */
    public function iAmPhotosOwner()
    {
        throw new PendingException();
    }

    /**
     * @Given directory :arg1 has such photos:
     */
    public function directoryHasSuchPhotos($arg1, TableNode $table)
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
     * @When I upload :arg1 directory as :arg2 archive
     */
    public function iUploadDirectoryAsArchive($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I should be able to download and preview :arg1 archive
     */
    public function iShouldBeAbleToDownloadAndPreviewArchive($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I have :arg1 photo archive
     */
    public function iHavePhotoArchive($arg1)
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
     * @When I upload :arg1 photo to :arg2 archive
     */
    public function iUploadPhotoToArchive($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I should be able to download and preview :arg1 photo from :arg2 archive
     */
    public function iShouldBeAbleToDownloadAndPreviewPhotoFromArchive($arg1, $arg2)
    {
        throw new PendingException();
    }
}
