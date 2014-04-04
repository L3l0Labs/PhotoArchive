<?php

namespace spec\L3l0Labs\Filesystem\File;

use L3l0Labs\Filesystem\Filename;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PhotoSpec extends ObjectBehavior
{
    function it_allows_to_get_name(Filename $filename)
    {
        $filename->path()->willReturn('/home/somepath/file.jpg');
        $filename->name()->willReturn('file.jpg');
        $this->beConstructedWith($filename);

        $this->filename()->path()->shouldBe('/home/somepath/file.jpg');
        $this->filename()->name()->shouldBe('file.jpg');
    }
}
