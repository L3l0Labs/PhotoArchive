<?php

namespace L3l0Labs\Bundle\FilesystemArchiveBundle\Entity;

use L3l0Labs\Archive\Archive as BaseArchive;
use L3l0Labs\Archive\Name;

class Archive extends BaseArchive
{
    private $id;

    public function name()
    {
        return Name::create($this->name);
    }

    protected function setName(Name $name)
    {
        $this->name = $name->name();
    }
}