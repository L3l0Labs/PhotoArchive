<?php

namespace spec\Cocoders\FilesystemArchive;

use Cocoders\Archive\Archive;
use Cocoders\Archive\Name as ArchiveName;
use Cocoders\Archive\Repository as ArchiveRepository;
use Cocoders\Filesystem\File\Directory;
use Cocoders\Filesystem\File\File;
use Cocoders\Filesystem\Filename;
use Cocoders\Filesystem\Filesystem;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DownloadArchiveSpec extends ObjectBehavior
{
    function let(
        Filesystem $filesystem,
        ArchiveRepository $archiveRepository
    )
    {
        $this->beConstructedWith($filesystem, $archiveRepository);
    }

    function it_creates_directory_and_adds_to_this_dir_files_from_archive(
        Filesystem $filesystem,
        ArchiveRepository $archiveRepository,
        Archive $archive
    )
    {
        $archive->archivedFiles()->willReturn(['DSC001.jpg', 'DSC002.jpg']);
        $archiveRepository
            ->find(Argument::that(function (ArchiveName $name) {
                return 'MyArchive!' === $name->name();
            }))
            ->willReturn($archive)
        ;
        $filesystem
            ->add(
                Argument::that(function (Directory $directory) {
                    $fileNames = array_map(
                        function (File $file) {
                            return $file->filename()->name();
                        },
                        $directory->files()
                    );
                    return in_array('DSC001.jpg', $fileNames) && in_array('DSC002.jpg', $fileNames);
                })
            )
            ->shouldBeCalled()
        ;

        $this
            ->downloadFromArchive('MyArchive!', '/home/l3l0/new')
            ->shouldBeAnInstanceOf('Cocoders\Filesystem\File\Directory')
        ;
    }
}
