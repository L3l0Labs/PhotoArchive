<?php

namespace spec\Cocoders\Filesystem;

use Cocoders\Filesystem\Filename;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FilenameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('/');
    }

    function it_allows_to_get_path()
    {
        $this->beConstructedWith('/home/some/path/g.jpg');
        $this->path()->shouldBe('/home/some/path/g.jpg');
        $this->__toString()->shouldBe('/home/some/path/g.jpg');
    }

    function it_allows_to_get_baseFilename()
    {
        $this->beConstructedWith('/home/some/path/g.jpg');
        $this->baseFilename()->path()->shouldBe('/home/some/path');
    }

    function it_allows_to_get_name()
    {
        $this->beConstructedWith('/home/some/path/g.jpg');
        $this->name()->shouldBe('g.jpg');
    }

    function it_normalizes_directory_name()
    {
        $this->beConstructedWith('/home/some/path/');
        $this->path()->shouldBe('/home/some/path');
    }

    function it_checks_root_path()
    {
        $this->isRootPath()->shouldBe(true);
    }

    function it_checks_root_path_for_sub_dir()
    {
        $this->beConstructedWith('/home');
        $this->isRootPath()->shouldBe(false);
    }

    function it_allows_to_check_if_contains_other_filename()
    {
        $this->beConstructedWith('/home/some/path/g.jpg');

        $this->contains(Filename::create('/home'))->shouldBe(true);
        $this->contains(Filename::create('/home/some'))->shouldBe(true);
        $this->contains(Filename::create('/home/some/'))->shouldBe(true);
        $this->contains(Filename::create('/home/some/'))->shouldBe(true);
        $this->contains(Filename::create('/home/some/path'))->shouldBe(true);
        $this->contains(Filename::create('/aaa'))->shouldBe(false);
        $this->contains(Filename::create('/home/l3l0'))->shouldBe(false);
    }

    function it_can_create_itself()
    {
        $filename = self::create('/home/some');
        $filename->shouldBeAnInstanceOf('Cocoders\Filesystem\Filename');
        $filename->path()->shouldBe('/home/some');
    }
}
