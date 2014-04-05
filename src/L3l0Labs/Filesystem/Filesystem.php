<?php

namespace L3l0Labs\Filesystem;

use L3l0Labs\Filesystem\File\File;

interface Filesystem
{
    public function add(File $file);
    public function get(Filename $name);
    public function all();
}