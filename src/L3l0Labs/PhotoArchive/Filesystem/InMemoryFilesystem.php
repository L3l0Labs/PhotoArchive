<?php

namespace L3l0Labs\PhotoArchive\Filesystem;

use L3l0Labs\PhotoArchive\Filesystem\File\File;

class InMemoryFilesystem implements Filesystem
{
    private $files = [];

    public function add(File $file)
    {
        $this->files[$file->filename()->path()] = $file;

        return $this;
    }

    public function all()
    {
        return array_values($this->files);
    }
}
