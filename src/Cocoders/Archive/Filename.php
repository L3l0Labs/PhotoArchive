<?php

namespace Cocoders\Archive;

class Filename
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function path()
    {
        return $this->path;
    }

    public function __toString()
    {
        return $this->path();
    }

    public static function create($name)
    {
        return new self($name);
    }
}
