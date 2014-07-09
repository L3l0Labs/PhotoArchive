<?php

namespace spec\Cococders\Bundle\FilesystemArchiveBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use Cocoders\Archive\Name;
use Cocoders\Bundle\FilesystemArchiveBundle\Entity\Archive;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArchiveRepositorySpec extends ObjectBehavior
{
    function let(
        EntityRepository $entityRepository,
        ObjectManager $manager
    )
    {
        $this->beConstructedWith($entityRepository, $manager);
    }

    function it_is_archive_repository()
    {
        $this->shouldHaveType('Cocoders\Archive\Repository');
    }

    function it_fetches_archive_from_entity_repository(EntityRepository $entityRepository, Archive $archive)
    {
        $entityRepository
            ->findOneBy(['name' => 'test'])
            ->shouldBeCalled()
            ->willReturn($archive)
        ;
        $this->find(Name::create('test'))->shouldBe($archive);
    }

    function it_adds_archive_to_object_manager(ObjectManager $manager, Archive $archive)
    {
        $manager->persist($archive)->shouldBeCalled();
        $manager->flush($archive)->shouldBeCalled();

        $this->add($archive);
    }
}
