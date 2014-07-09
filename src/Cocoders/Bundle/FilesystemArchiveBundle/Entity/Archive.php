<?php

namespace Cocoders\Bundle\FilesystemArchiveBundle\Entity;

use Cocoders\Archive\Archive as BaseArchive;
use Cocoders\Archive\Name;

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