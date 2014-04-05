<?php

namespace L3l0Labs\Archive;

class Factory
{
    /**
     * @return Archive
     */
    public function createArchive(Name $name)
    {
        return new Archive($name);
    }
}
