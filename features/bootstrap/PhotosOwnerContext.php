<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;

use L3l0Labs\PhotoArchive\Filesystem\InMemoryFilesystem;
use L3l0Labs\PhotoArchive\Filesystem\Filename;
use L3l0Labs\PhotoArchive\Filesystem\File\Photo;
use L3l0Labs\PhotoArchive\Filesystem\File\Directory;

class PhotosOwnerContext implements SnippetAcceptingContext
{
    private $filesystem;

    public function __construct()
    {
        $this->filesystem = new InMemoryFilesystem();
    }

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
        foreach ($table->getHash() as $row) {
            $photos[] = new Photo(new Filename($directoryName.DIRECTORY_SEPARATOR.$row['photo name']));
        }
        $directory = new Directory(new Filename($directoryName), $photos);
        $this->filesystem->add($directory);
    }

    /**
     * @Given I want to upload my whole photos directory
     */
    public function iWantToUploadMyWholePhotosDirectory()
    {
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
