<?php

namespace spec\Cocoders\Bundle\FilesystemArchiveBundle\Controller;

use Cocoders\FilesystemArchive\UploadArchive;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UploadArchiveControllerSpec extends ObjectBehavior
{
    function let(
        UploadArchive $useCase,
        Form $form,
        FormView $formView,
        EngineInterface $templating
    )
    {
        $form->handleRequest(Argument::any())->willReturn();
        $form->isValid()->willReturn(false);
        $form->createView()->willReturn($formView);

        $this->beConstructedWith($useCase, $form, $templating);
    }

    function it_renders_upload_form_template(
        Form $form,
        FormView $formView,
        EngineInterface $templating,
        Request $request,
        Response $response
    )
    {
        $form->createView()->willReturn($formView);

        $templating
            ->renderResponse('CocodersFilesystemArchiveBundle:Archive:upload.html.twig', ['form' => $formView])
            ->shouldBeCalled()
            ->willReturn($response)
        ;

        $this->upload($request)->shouldBe($response);
    }
}
