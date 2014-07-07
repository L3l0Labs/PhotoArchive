<?php

namespace L3l0Labs\Archive;

use Cocoders\Archive\Archive;

interface Repository
{
    /**
     * @return Archive
     */
    public function find(Name $name);
    public function add(Archive $archive);
}
