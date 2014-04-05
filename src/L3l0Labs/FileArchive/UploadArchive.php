<?php

namespace L3l0Labs\FileArchive;

use L3l0Labs\Archive\Factory;
use L3l0Labs\Archive\Name;
use L3l0Labs\Archive\Repository;
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
        Factory $archiveFactory
    )
    {
        $this->filesystem = $filesystem;
        $this->repository = $repository;
        $this->archiveFactory = $archiveFactory;
    }

    public function uploadToArchive(Name $archiveName, Filename $fileToUploadName)
    {
        /**
         * @var Directory $directory
         */
        $directory = $this->filesystem->get($fileToUploadName);
        $paths = [];
        foreach ($directory->files() as $file) {
            $paths[] = $file->filename()->path();
        }

        $archive = $this->archiveFactory->createArchive($archiveName, $paths);
        $this->repository->add($archive);
    }
}
