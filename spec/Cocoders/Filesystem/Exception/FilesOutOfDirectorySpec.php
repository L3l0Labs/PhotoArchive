<?php

namespace spec\Cocoders\Filesystem\Exception;

use Cocoders\Filesystem\Filename;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FilesOutOfDirectorySpec extends ObjectBehavior
{
    function let()
    {
        $directoryName = Filename::create('/home/aaa');
        $file1Name = Filename::create('/home/l3l0/file.png');
        $file2Name = Filename::create('/home/l3l0/file2.png');
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
