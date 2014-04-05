<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;

use L3l0Labs\Filesystem\InMemoryFilesystem;
use L3l0Labs\Filesystem\Filename;
use L3l0Labs\Filesystem\File\Photo;
use L3l0Labs\Filesystem\File\Directory;
use L3l0Labs\Archive\Name as ArchiveName;
use L3l0Labs\Archive\InMemoryRepository;
use L3l0Labs\Archive\Factory as ArchiveFactory;
use L3l0Labs\FileArchive\UploadArchive;

class PhotosOwnerContext implements SnippetAcceptingContext
{
    private $filesystem;
    private $uploadArchiveUseCase;
    private $archiveRepository;
    private $archiveFactory;

    public function __construct()
    {
        $this->filesystem = new InMemoryFilesystem();
        $this->archiveRepository = new InMemoryRepository();
        $this->archiveFactory = new ArchiveFactory();
        $this->uploadArchiveUseCase = new UploadArchive(
            $this->filesystem,
            $this->archiveRepository,
            $this->archiveFactory
        );
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
        $photos = [];
        foreach ($table->getHash() as $row) {
            $photos[] = new Photo(Filename::create($directoryName.DIRECTORY_SEPARATOR.$row['photo name']));
        }
        $directory = new Directory(Filename::create($directoryName), $photos);
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
        $this->uploadArchiveUseCase->uploadToArchive(ArchiveName::create($archiveName), Filename::create($directoryName));
    }

    /**
     * @Then I should be able to download :archiveName archive
     */
    public function iShouldBeAbleToDownloadArchive($archiveName)
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
