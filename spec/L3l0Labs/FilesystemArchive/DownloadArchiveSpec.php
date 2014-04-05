<?php

namespace spec\L3l0Labs\FilesystemArchive;

use L3l0Labs\Archive\Archive;
use L3l0Labs\Archive\Name as ArchiveName;
use L3l0Labs\Archive\Repository as ArchiveRepository;
use L3l0Labs\Filesystem\File\Directory;
use L3l0Labs\Filesystem\File\File;
use L3l0Labs\Filesystem\Filename;
use L3l0Labs\Filesystem\Filesystem;
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
            ->downloadFromArchive(ArchiveName::create('MyArchive!'), Filename::create('/home/l3l0/new'))
            ->shouldBeAnInstanceOf('L3l0Labs\Filesystem\File\Directory')
        ;
    }
}
