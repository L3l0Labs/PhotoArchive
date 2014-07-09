<?php

namespace spec\Cocoders\Filesystem\File;

use Cocoders\Filesystem\File\File;
use Cocoders\Filesystem\Filename;
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
        $this->shouldHaveType('Cocoders\Filesystem\File\File');
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

        $this->shouldThrow('Cocoders\Filesystem\Exception\FilesOutOfDirectory')->during('__construct', [$directoryName, [$selfie]]);
    }
}
