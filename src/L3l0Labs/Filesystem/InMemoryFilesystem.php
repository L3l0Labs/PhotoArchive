<?php

namespace L3l0Labs\Filesystem;

use L3l0Labs\Filesystem\File\File;

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

    public function get(Filename $filename)
    {
        return $this->files[$filename->path()];
    }
}
