<?php

namespace L3l0Labs\PhotoArchive\Filesystem;

use L3l0Labs\PhotoArchive\Filesystem\File\File;

interface Filesystem
{
    public function add(File $file);
    public function all();
}