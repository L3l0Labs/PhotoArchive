<?php

namespace Cocoders\Bundle\FilesystemArchiveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArchiveUploadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['required' => true])
            ->add('files', 'collection', [
                'type' => 'file',
                'allow_add' => true
            ])
        ;
    }

    public function getName()
    {
        return 'archive_upload';
    }
}
