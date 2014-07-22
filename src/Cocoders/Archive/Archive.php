<?php

namespace Cocoders\Archive;

class Archive
{
    protected $name;
    protected $archivedFiles = [];
    protected $uploadingFiles = [];

    public function __construct(Name $name)
    {
        $this->setName($name);
    }

    public function addFileToUpload(Filename $filename)
    {
        $this->uploadingFiles[$filename->path()] = $filename->path();
    }

    public function uploadingFiles()
    {
        return array_map(
            function ($path) {
                return Filename::create($path);
            },
            array_values($this->uploadingFiles)
        );
    }

    public function archivedFiles()
    {
        return $this->archivedFiles;
    }

    public function upload(Filename $dirPath)
    {
        foreach ($this->uploadingFiles as $path) {
            $this->archivedFiles[$path] = str_replace($dirPath->path().DIRECTORY_SEPARATOR, '', $path);
        }
    }

    public function name()
    {
        return $this->name;
    }

    protected function setName(Name $name)
    {
        $this->name = $name;
    }
}
