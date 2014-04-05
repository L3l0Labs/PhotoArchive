<?php

namespace L3l0Labs\FilesystemArchive;

use L3l0Labs\Archive\ArchiveFactory;
use L3l0Labs\Archive\Name;
use L3l0Labs\Archive\Repository;
use L3l0Labs\Archive\Filename as ArchiveFilename;
use L3l0Labs\Filesystem\File\Directory;
use L3l0Labs\Filesystem\Filename;
use L3l0Labs\Filesystem\Filesystem;

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

    public function uploadToArchive(Name $archiveName, Filename $fileToUploadName)
    {
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
