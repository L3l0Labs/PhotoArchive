<?php

namespace L3l0Labs\PhotoArchive\Filesystem;

class Filename
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function path()
    {
        if ($this->isRootPath()) {
            return $this->path;
        }

        return $this->normalizePath($this->path);
    }

    public function baseFilename()
    {
        return new Filename(dirname($this->path));
    }

    public function name()
    {
        return basename($this->path);
    }

    public function contains(Filename $name)
    {
        if ($this->isRootPath()) {
            return false;
        }

        if ($this->baseFilename()->path() === $name->path()) {
            return true;
        }

        return $this->baseFilename()->contains($name);
    }

    public function isRootPath()
    {
        return '/' == $this->path;
    }

    public function __toString()
    {
        return $this->path();
    }

    private function normalizePath($path)
    {
        if ($this->endsWithDirectorySeparator($path)) {
            return $this->getPathWithoutEndingDirectorySeparator($path);
        }

        return $path;
    }

    private function endsWithDirectorySeparator($path)
    {
        return DIRECTORY_SEPARATOR === substr($path, -1);
    }

    private function getPathWithoutEndingDirectorySeparator($path)
    {
        return substr($path, 0, strlen($path) - 1);
    }
}
