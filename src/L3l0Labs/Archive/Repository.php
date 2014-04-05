<?php

namespace L3l0Labs\Archive;

interface Repository
{
    /**
     * @return Archive
     */
    public function find(Name $name);
    public function add(Archive $archive);
}
