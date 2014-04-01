<?php

namespace spec\L3l0Labs\PhotoArchive\Filesystem\Exception;

use L3l0Labs\PhotoArchive\Filesystem\Filename;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FilesOutOfDirectorySpec extends ObjectBehavior
{
    function let(Filename $directoryName, Filename $file1Name, Filename $file2Name)
    {
        $directoryName->path()->willReturn('/home/aaa');
        $file1Name->path()->willReturn('/home/l3l0/file.png');
        $file2Name->path()->willReturn('/home/l3l0/file2.png');
        $this
            ->beConstructedWith(
                $directoryName,
                [$file1Name, $file2Name]
            )
        ;
    }

    function it_is_exception()
    {
        $this->shouldHaveType('\InvalidArgumentException');
    }

    function it_returns_descriptive_message()
    {
        $this->getMessage()->shouldBe('Directory "/home/aaa" has not such files "/home/l3l0/file.png", "/home/l3l0/file2.png"');
    }
}
