<?php

namespace L3l0Labs\FilesystemArchive;

use L3l0Labs\Archive\Name as ArchiveName;
use L3l0Labs\Archive\Name;
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

    public function downloadFromArchive($archiveName, $directoryPath)
    {
        $directoryFilename = Filename::create($directoryPath);
        $archive = $this->archiveRepository->find(Name::create($archiveName));
        $files = [];
        foreach ($archive->archivedFiles() as $path) {
            $files[] = new File(Filename::create($directoryFilename->path().DIRECTORY_SEPARATOR.$path));
        }

        $directory = new Directory($directoryFilename, $files);
        $this->filesystem->add($directory);

        return $directory;
    }
}
