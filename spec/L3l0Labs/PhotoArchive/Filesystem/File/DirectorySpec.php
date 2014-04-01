<?php

namespace spec\L3l0Labs\PhotoArchive\Filesystem\File;

use L3l0Labs\PhotoArchive\Filesystem\Filename;
use L3l0Labs\PhotoArchive\Filesystem\File\Photo;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DirectorySpec extends ObjectBehavior
{
    function let(Filename $filename)
    {
        $this->beConstructedWith($filename, []);
    }

    function it_is_file()
    {
        $this->shouldHaveType('L3l0Labs\PhotoArchive\Filesystem\File\File');
    }

    function it_allows_to_get_files_from_directory(Filename $name)
    {
        $name->path()->willReturn('/home/l3l0');
        $selfie = new Photo(new Filename('/home/l3l0/aaa.jpg'));
        $myHolidayPhoto = new Photo(new Filename('/home/l3l0/zzz.jpg'));
        $this->beConstructedWith($name, [$selfie, $myHolidayPhoto]);

        $this->files()->shouldBe([$selfie, $myHolidayPhoto]);
    }

    function it_does_not_allows_to_create_directory_with_files_which_are_stored_in_other_directory(Filename $name)
    {
        $name->path()->willReturn('/home/l3l0/zzz');
        $selfie = new Photo(new Filename('/home/other/zzz/aaa.jpg'));

        $this->shouldThrow('L3l0Labs\PhotoArchive\Filesystem\Exception\FilesOutOfDirectory')->during('__construct', [$name, [$selfie]]);
    }
}
