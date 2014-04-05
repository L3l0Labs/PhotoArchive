<?php

namespace L3l0Labs\Filesystem;

use L3l0Labs\Filesystem\File\File;

interface Filesystem
{
    public function add(File $file);

    /**
     * @return File
     */
    public function get(Filename $name);

    /**
     * @return File[]
     */
    public function all();
}