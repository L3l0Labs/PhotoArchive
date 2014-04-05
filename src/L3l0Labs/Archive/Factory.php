<?php

namespace L3l0Labs\Archive;

interface Factory
{
    public function createArchive(Name $name, $paths);
}
