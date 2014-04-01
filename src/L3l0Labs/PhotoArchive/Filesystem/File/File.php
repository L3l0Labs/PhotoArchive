<?php

namespace L3l0Labs\PhotoArchive\Filesystem\File;

use L3l0Labs\PhotoArchive\Filesystem\Filename;

abstract class File
{
    protected $name;

    public function __construct(Filename $name)
    {
        $this->name = $name;
    }

    public function filename()
    {
        return $this->name;
    }
}