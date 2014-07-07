<?php

namespace L3l0Labs\Archive;

use Cocoders\Archive\Archive;

class InMemoryRepository implements Repository
{
    private $archives;

    public function find(Name $name)
    {
        if (isset($this->archives[$name->name()])) {
            return $this->archives[$name->name()];
        }

        return false;
    }

    public function add(Archive $archive)
    {
        $name = $archive->name();
        $this->archives[$name->name()] = $archive;
    }
}
