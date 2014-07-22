<?php

namespace Cocoders\Filesystem;

use Cocoders\Filesystem\File\File;

interface Filesystem
{
    /**
     * @return void
     */
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
