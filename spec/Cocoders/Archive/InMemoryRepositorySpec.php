<?php

namespace spec\Cocoders\Archive;

use Cocoders\Archive\Archive;
use Cocoders\Archive\Name;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InMemoryRepositorySpec extends ObjectBehavior
{
    function it_is_archive_repository()
    {
        $this->shouldHaveType('Cocoders\Archive\Repository');
    }

    function it_finds_archive(\Cocoders\Archive\Archive $archive, Archive $archive2)
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
