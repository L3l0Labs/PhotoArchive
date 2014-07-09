<?php

namespace Cocoders\FilesystemArchive;

use Cocoders\Archive\Name;
use Cocoders\Archive\Repository as ArchiveRepository;
use Cocoders\Filesystem\File\Directory;
use Cocoders\Filesystem\File\File;
use Cocoders\Filesystem\Filename;
use Cocoders\Filesystem\Filesystem;

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
