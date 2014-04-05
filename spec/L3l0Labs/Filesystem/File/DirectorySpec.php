<?php

namespace spec\L3l0Labs\Filesystem\File;

use L3l0Labs\Filesystem\File\File;
use L3l0Labs\Filesystem\Filename;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DirectorySpec extends ObjectBehavior
{
    function let()
    {
        $filename = Filename::create('/');
        $this->beConstructedWith($filename, []);
    }

    function it_is_file()
    {
        $this->shouldHaveType('L3l0Labs\Filesystem\File\File');
    }

    function it_allows_to_get_files_from_directory()
    {
        $name = Filename::create('/home/l3l0');
        $selfie = new File(Filename::create('/home/l3l0/aaa.jpg'));
        $myHolidayPhoto = new File(Filename::create('/home/l3l0/zzz.jpg'));
        $this->beConstructedWith($name, [$selfie, $myHolidayPhoto]);

        $this->files()->shouldBe([$selfie, $myHolidayPhoto]);
    }

    function it_allows_to_get_files_directory_in_directory()
    {
        $name = Filename::create('/home/l3l0');
        $selfie = new File(Filename::create('/home/l3l0/aaa.jpg'));
        $myHolidayPhoto = new File(Filename::create('/home/l3l0/zzz.jpg'));
        $this->beConstructedWith($name, [$selfie, $myHolidayPhoto]);

        $this->files()->shouldBe([$selfie, $myHolidayPhoto]);
    }

    function it_does_not_allows_to_create_directory_with_files_which_are_stored_in_other_directory()
    {
        $directoryName = Filename::create('/home/l3l0/zzz');
        $selfie = new File(Filename::create('/home/other/zzz/aaa.jpg'));

        $this->shouldThrow('L3l0Labs\Filesystem\Exception\FilesOutOfDirectory')->during('__construct', [$directoryName, [$selfie]]);
    }
}
