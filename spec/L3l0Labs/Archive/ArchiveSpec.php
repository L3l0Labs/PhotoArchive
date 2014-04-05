<?php

namespace spec\L3l0Labs\Archive;

use L3l0Labs\Archive\Name;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArchiveSpec extends ObjectBehavior
{
    function let(Name $archiveName)
    {
        $archiveName->name()->willReturn('MyOwnArchive');
        $this->beConstructedWith($archiveName);
    }

    function it_adds_path_to_archive()
    {
        $this
            ->add('/home/somepath/test.png')
        ;
        $this->paths()->shouldBe(['/home/somepath/test.png']);
    }
}
