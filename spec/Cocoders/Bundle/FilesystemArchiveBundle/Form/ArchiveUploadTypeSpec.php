<?php

namespace spec\Cocoders\Bundle\FilesystemArchiveBundle\Form;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;

class ArchiveUploadTypeSpec extends ObjectBehavior
{
    function it_is_form_type()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    function it_builds_multiple_file_field(FormBuilderInterface $builder)
    {
        $builder
            ->add('name', 'text', [
                'required' => true
            ])
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        $builder
            ->add('files', 'collection', [
                'type' => 'file',
                'allow_add' => true
            ])
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder, []);
    }

    function it_has_valid_name()
    {
        $this->getName()->shouldBe('archive_upload');
    }
}
