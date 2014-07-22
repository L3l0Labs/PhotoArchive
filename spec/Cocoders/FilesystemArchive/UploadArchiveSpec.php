<?php

namespace spec\Cocoders\FilesystemArchive;

use Cocoders\Archive\Archive;
use Cocoders\Archive\ArchiveFactory;
use Cocoders\Archive\Name as ArchiveName;
use Cocoders\Archive\Filename as ArchiveFilename;
use Cocoders\Archive\Repository;
use Cocoders\Filesystem\File\File;
use Cocoders\Filesystem\File\Directory;
use Cocoders\Filesystem\Filename;
use Cocoders\Filesystem\Filesystem;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UploadArchiveSpec extends ObjectBehavior
{
    function let(Filesystem $filesystem, Repository $archiveRepository, ArchiveFactory $factory)
    {
        $this->beConstructedWith($filesystem, $archiveRepository, $factory);
    }

    function it_creates_and_adds_directories_files_paths_to_archive(
        Filesystem $filesystem,
        Repository $archiveRepository,
        ArchiveFactory $factory,
        Archive $archive
    )
    {
        $photo1 = new File(Filename::create('/home/test/file.jpg'));
        $photo2 = new File(Filename::create('/home/test/file.png'));
        $photo2 = new File(Filename::create('/home/test/aaa/file.png'));
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
        $archive
            ->addFileToUpload(
                Argument::that(
                    function (ArchiveFilename $filename) {
                        return in_array(
                            $filename->path(),
                            ['/home/test/file.jpg', '/home/test/file/png', '/home/test/aaa/file.png']
                        );
                    }
                )
            )
            ->shouldBeCalled()
        ;
        $archive
            ->upload(
                Argument::that(function (ArchiveFilename $baseDirectoryName) {
                    return '/home/test' === $baseDirectoryName->path();
                })
            )
            ->shouldBeCalled()
        ;
        $archiveRepository
            ->add($archive)
            ->shouldBeCalled()
        ;

        $this->uploadToArchive('MyArchive!', '/home/test');
    }
}
