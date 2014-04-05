<?php

namespace L3l0Labs\Archive;

class Archive
{
    private $name;
    private $paths;

    public function __construct(Name $name)
    {
        $this->name = $name;
    }
    public function add($path)
    {
        $this->paths[$path] = $path;
    }

    public function paths()
    {
        return array_values($this->paths);
    }
}
