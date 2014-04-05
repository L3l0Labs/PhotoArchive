<?php

namespace L3l0Labs\FilesystemArchive;

use L3l0Labs\Archive\Name as ArchiveName;
use L3l0Labs\Archive\Repository as ArchiveRepository;
use L3l0Labs\Filesystem\File\Directory;
use L3l0Labs\Filesystem\File\File;
use L3l0Labs\Filesystem\Filename;
use L3l0Labs\Filesystem\Filesystem;

class DownloadArchive
{
    private $filesystem;
    private $archiveRepository;

    public function __construct(Filesystem $filesystem, ArchiveRepository $archiveRepository)
    {
        $this->filesystem = $filesystem;
        $this->archiveRepository = $archiveRepository;
    }

    public function downloadFromArchive(ArchiveName $archiveName, Filename $directoryName)
    {
        $archive = $this->archiveRepository->find($archiveName);
        $files = [];
        foreach ($archive->archivedFiles() as $path) {
            $files[] = new File(Filename::create($directoryName->path().DIRECTORY_SEPARATOR.$path));
        }

        $directory = new Directory($directoryName, $files);
        $this->filesystem->add($directory);

        return $directory;
    }
}
