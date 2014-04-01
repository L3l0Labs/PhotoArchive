<?php

namespace L3l0Labs\PhotoArchive\Filesystem\File;

use L3l0Labs\PhotoArchive\Filesystem\Exception\FilesOutOfDirectory;
use L3l0Labs\PhotoArchive\Filesystem\Filename;

final class Directory extends File
{
    private $files;

    public function __construct(Filename $name, $files)
    {
        parent::__construct($name);
        $this->assertFilesAreValid($files);
        $this->files = $files;
    }

    public function files()
    {
        return $this->files;
    }

    private function assertFilesAreValid($files)
    {
        $invalidFiles = $this->validateFiles($files);

        if ($invalidFiles) {
            throw new FilesOutOfDirectory($this->filename(), $this->fetchInvalidFileNames($invalidFiles));
        }
    }

    private function validateFiles($files)
    {
        return array_filter($files, function ($file) {
            return !$file->filename()->contains($this->name);
        });
    }

    private function fetchInvalidFileNames($invalidFiles)
    {
        return array_map(function ($invalidFile) {
            return $invalidFile->filename();
        }, $invalidFiles);
    }
}