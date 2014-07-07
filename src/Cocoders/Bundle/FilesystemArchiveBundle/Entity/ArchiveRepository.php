<?php

namespace L3l0Labs\Bundle\FilesystemArchiveBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use Cocoders\Archive\Archive as DomainArchive;
use L3l0Labs\Archive\Name;
use L3l0Labs\Archive\Repository;

class ArchiveRepository implements Repository
{
    private $repository;
    private $manager;

    public function __construct(EntityRepository $repository, ObjectManager $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;
    }

    /**
     * @return Archive
     */
    public function find(Name $name)
    {
        return $this->repository->findOneBy(['name' => $name->name()]);
    }

    public function add(DomainArchive $archive)
    {
        $this->manager->persist($archive);
        $this->manager->flush($archive);
    }
}
