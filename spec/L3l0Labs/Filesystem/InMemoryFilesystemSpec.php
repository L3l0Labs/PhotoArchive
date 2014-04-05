<?php

namespace spec\L3l0Labs\Filesystem;

use L3l0Labs\Filesystem\File\File;
use L3l0Labs\Filesystem\Filename;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InMemoryFilesystemSpec extends ObjectBehavior
{
    function it_is_filesystem()
    {
        $this->shouldHaveType('L3l0Labs\Filesystem\Filesystem');
    }

    function it_stores_files(File $file)
    {
        $file->filename()->willReturn(Filename::create('/home/l3l0/test.jpg'));
        $this->add($file)->shouldBe($this);
        $this->all()->shouldBe([$file]);
    }

    function it_get_file_by_path(File $file, File $file2)
    {
        $name = Filename::create('/home/l3l0/test.jpg');
        $name2 = Filename::create('/home/l3l0/test.png');

        $file->filename()->willReturn(Filename::create('/home/l3l0/test.jpg'));
        $file2->filename()->willReturn(Filename::create('/home/l3l0/test.png'));

        $this->add($file);
        $this->add($file2);

        $this->get($name)->shouldBe($file);
        $this->get($name2)->shouldBe($file2);
    }
}
