<?php

namespace spec\L3l0Labs\Archive;

use L3l0Labs\Archive\Filename;
use L3l0Labs\Archive\Name;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArchiveSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Name::create('MyArchive'));
    }

    function it_uploads_files()
    {
        $file1 = Filename::create('/home/file/test.png');
        $file2 = Filename::create('/home/file/aaa/test.png');
        $this->uploadingFiles()->shouldBe([]);
        $this->addFileToUpload($file1);
        $this->addFileToUpload($file2);
        $this->uploadingFiles()[0]->path()->shouldBe('/home/file/test.png');
        $this->uploadingFiles()[1]->path()->shouldBe('/home/file/aaa/test.png');

        $this->upload(Filename::create('/home/file'));
        $this->archivedFiles()->shouldBe(['test.png', 'aaa/test.png']);
    }

    function it_gets_name()
    {
        $name = $this->name();
        $name->name()->shouldBe('MyArchive');
    }
}
