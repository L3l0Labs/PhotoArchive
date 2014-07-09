<?php

namespace Cocoders\FilesystemArchive;

use Cocoders\Archive\ArchiveFactory;
use Cocoders\Archive\Name;
use Cocoders\Archive\Repository;
use Cocoders\Archive\Filename as ArchiveFilename;
use Cocoders\Filesystem\File\Directory;
use Cocoders\Filesystem\Filename;
use Cocoders\Filesystem\Filesystem;

class UploadArchive
{
    private $filesystem;
    private $repository;
    private $archiveFactory;

    public function __construct(
        Filesystem $filesystem,
        Repository $repository,
        ArchiveFactory $archiveFactory
    )
    {
        $this->filesystem = $filesystem;
        $this->repository = $repository;
        $this->archiveFactory = $archiveFactory;
    }

    public function uploadToArchive($archiveName, $fileToUploadName)
    {
        $archiveName = Name::create($archiveName);
        $fileToUploadName = Filename::create($fileToUploadName);

        $archive = $this->archiveFactory->createArchive($archiveName);

        /**
         * @var Directory $directory
         */
        $directory = $this->filesystem->get($fileToUploadName);
        foreach ($directory->files() as $file) {
            $archive->addFileToUpload(ArchiveFilename::create($file->filename()->path()));
        }
        $archive->upload(ArchiveFilename::create($fileToUploadName->path()));

        $this->repository->add($archive);
    }
}
