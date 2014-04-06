<?php

namespace L3l0Labs\Bundle\FilesystemArchiveBundle\Controller;

use L3l0Labs\FilesystemArchive\UploadArchive;
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
                'L3l0LabsFilesystemArchiveBundle:Archive:upload.html.twig', ['form' => $this->form->createView()]
            )
        ;
    }
}
