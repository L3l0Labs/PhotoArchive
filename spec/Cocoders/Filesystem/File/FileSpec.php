<?php

namespace spec\Cocoders\Filesystem\File;

use Cocoders\Filesystem\Filename;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileSpec extends ObjectBehavior
{
    function it_allows_to_get_name()
    {
        $filename = Filename::create('/home/somepath/file.jpg');
        $this->beConstructedWith($filename);

        $this->filename()->path()->shouldBe('/home/somepath/file.jpg');
        $this->filename()->name()->shouldBe('file.jpg');
    }
}
