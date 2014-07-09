<?php

namespace Cocoders\Filesystem\File;

use Cocoders\Filesystem\Filename;

class File
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