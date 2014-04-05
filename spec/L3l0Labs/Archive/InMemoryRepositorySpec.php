<?php

namespace spec\L3l0Labs\Archive;

use L3l0Labs\Archive\Archive;
use L3l0Labs\Archive\Name;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InMemoryRepositorySpec extends ObjectBehavior
{
    function it_is_archive_repository()
    {
        $this->shouldHaveType('L3l0Labs\Archive\Repository');
    }

    function it_finds_archive(Archive $archive, Archive $archive2)
    {
        $archive->name()->willReturn(Name::create('TestArchive'));
        $archive2->name()->willReturn(Name::create('TestArchive234'));
        $this->add($archive);
        $this->add($archive2);

        $this->find(Name::create('TestArchive'))->shouldBe($archive);
        $this->find(Name::create('TestArchive234'))->shouldBe($archive2);
        $this->find(Name::create('TestArchiveTest'))->shouldBe(false);
    }
}
