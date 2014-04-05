<?php

namespace spec\L3l0Labs\Archive;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InMemoryRepositorySpec extends ObjectBehavior
{
    function it_is_archive_repository()
    {
        $this->shouldHaveType('L3l0Labs\Archive\Repository');
    }
}
