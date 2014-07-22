<?php

namespace Cocoders\Archive;

interface Repository
{
    /**
     * @return Archive
     */
    public function find(Name $name);

    /**
     * @return void
     */
    public function add(Archive $archive);
}
