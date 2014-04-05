<?php

namespace spec\L3l0Labs\Archive;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FilenameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('/home/l3l0/test.jpg');
    }

    function it_allows_to_get_path()
    {
        $this->path()->shouldBe('/home/l3l0/test.jpg');
        $this->__toString()->shouldBe('/home/l3l0/test.jpg');
    }

    function it_can_create_itself()
    {
        $filename = self::create('/home/some/test.jpg');
        $filename->shouldBeAnInstanceOf('L3l0Labs\Archive\Filename');
        $filename->path()->shouldBe('/home/some/test.jpg');
    }
}
