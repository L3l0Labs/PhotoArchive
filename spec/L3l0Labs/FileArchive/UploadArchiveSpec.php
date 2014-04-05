<?php

namespace spec\L3l0Labs\FileArchive;

use L3l0Labs\Archive\Archive;
use L3l0Labs\Archive\Factory;
use L3l0Labs\Archive\Name as ArchiveName;
use L3l0Labs\Archive\Repository;
use L3l0Labs\Filesystem\File\Directory;
use L3l0Labs\Filesystem\File\Photo;
use L3l0Labs\Filesystem\Filename;
use L3l0Labs\Filesystem\Filesystem;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UploadArchiveSpec extends ObjectBehavior
{
    function let(Filesystem $filesystem, Repository $archiveRepository, Factory $factory)
    {
        $this->beConstructedWith($filesystem, $archiveRepository, $factory);
    }

    function it_creates_and_adds_directories_files_paths_to_archive(
        Filesystem $filesystem,
        Repository $archiveRepository,
        Factory $factory,
        Archive $archive
    )
    {
        $photo1 = new Photo(Filename::create('/home/test/file.jpg'));
        $photo2 = new Photo(Filename::create('/home/test/file.png'));
        $directory = new Directory(Filename::create('/home/test'), [$photo1, $photo2]);
        $filesystem
            ->get(
                Argument::that(function (Filename $name) {
                    return '/home/test' === $name->path();
                })
            )
            ->willReturn($directory)
        ;

        $factory
            ->createArchive(
                Argument::that(function (ArchiveName $name) {
                    return 'MyArchive!' === $name->name();
                })
            )
            ->shouldBeCalled()
            ->willReturn($archive)
        ;
        $archive->add('/home/test/file.jpg')->shouldBeCalled();
        $archive->add('/home/test/file.png')->shouldBeCalled();
        $archiveRepository
            ->add($archive)
            ->shouldBeCalled()
        ;

        $this->uploadToArchive(ArchiveName::create('MyArchive!'), Filename::create('/home/test'));
    }
}
