<?php

namespace spec\L3l0Labs\Archive;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('ArchiveName');
    }

    function it_allows_to_get_path()
    {
        $this->name()->shouldBe('ArchiveName');
        $this->__toString()->shouldBe('ArchiveName');
    }

    function it_can_create_itself()
    {
        $filename = self::create('MyArchiveName');
        $filename->shouldBeAnInstanceOf('L3l0Labs\Archive\Name');
        $filename->name()->shouldBe('MyArchiveName');
    }
}
