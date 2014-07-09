<?php

namespace Cocoders\Bundle\FilesystemArchiveBundle\Controller;

use Cocoders\FilesystemArchive\UploadArchive;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Templating\EngineInterface;

class UploadArchiveController
{
    private $useCase;
    private $form;
    private $templating;

    public function __construct(UploadArchive $useCase, Form $form, EngineInterface $templating)
    {
        $this->useCase = $useCase;
        $this->form = $form;
        $this->templating = $templating;
    }

    public function upload(Request $request)
    {
        return $this
            ->templating
            ->renderResponse(
                'CocodersFilesystemArchiveBundle:Archive:upload.html.twig', ['form' => $this->form->createView()]
            )
        ;
    }
}
