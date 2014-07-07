<?php

namespace L3l0Labs\Archive;

use Cocoders\Archive\Archive;

class ArchiveFactory
{
    /**
     * @return Archive
     */
    public function createArchive(Name $name)
    {
        return new Archive($name);
    }
}
