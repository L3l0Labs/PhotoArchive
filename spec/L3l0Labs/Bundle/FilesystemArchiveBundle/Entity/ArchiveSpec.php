<?php

namespace spec\L3l0Labs\Bundle\FilesystemArchiveBundle\Entity;

use L3l0Labs\Archive\Name;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArchiveSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Name::create('MyOrmArchive'));
    }

    function it_is_archive()
    {
        $this->shouldHaveType('L3l0Labs\Archive\Archive');
    }

    function it_converts_doctrine_string_name_into_name_value_object()
    {
        $name = $this->name();
        $name->name()->shouldBe('MyOrmArchive');
    }
}
