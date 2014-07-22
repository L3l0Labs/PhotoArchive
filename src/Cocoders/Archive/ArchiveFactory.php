<?php

namespace Cocoders\Archive;

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
