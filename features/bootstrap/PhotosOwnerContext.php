<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;

use L3l0Labs\Filesystem\InMemoryFilesystem;
use L3l0Labs\Filesystem\Filename;
use L3l0Labs\Filesystem\File\File;
use L3l0Labs\Filesystem\File\Photo;
use L3l0Labs\Filesystem\File\Directory;
use L3l0Labs\Archive\Name as ArchiveName;
use L3l0Labs\Archive\InMemoryRepository;
use L3l0Labs\Archive\ArchiveFactory;
use L3l0Labs\FilesystemArchive\DownloadArchive;
use L3l0Labs\FilesystemArchive\UploadArchive;

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
        $this->downloadArchiveUseCase = new DownloadArchive(
            $this->filesystem,
            $this->archiveRepository
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
            $photos[] = new File(Filename::create($directoryName.DIRECTORY_SEPARATOR.$row['photo name']));
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
     * @Then I should be able to download :archiveName archive to :directoryName directory
     */
    public function iShouldBeAbleToDownloadArchive($archiveName, $directoryName)
    {
        $directory = $this->downloadArchiveUseCase->downloadFromArchive(ArchiveName::create($archiveName), Filename::create($directoryName));
        if (!$directory) {
            throw new \Exception('Cannot downloads files from archive');
        }
    }

    /**
     * @Given directory :directoryName should contains such files:
     */
    public function directoryShouldContainsSuchFiles($directoryName, TableNode $table)
    {
        $directory = $this->filesystem->get(Filename::create($directoryName));
        $fileNames = array_map(
            function (File $file) {
                return $file->filename()->name();
            },
            $directory->files()
        );

        foreach ($table->getHash() as $row) {
            if (!in_array($row['file name'], $fileNames)) {
                throw new \Exception(sprintf('Directory "%s" does not contains file "%s"', $directoryName, $row['file name']));
            }
        }
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
