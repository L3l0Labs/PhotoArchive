<?php

namespace Cocoders\Archive;

interface Repository
{
    /**
     * @return Archive
     */
    public function find(Name $name);
    public function add(Archive $archive);
}
