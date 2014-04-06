<?php

namespace L3l0Labs\Bundle\FilesystemArchiveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('L3l0LabsFilesystemArchiveBundle:Default:index.html.twig', array('name' => $name));
    }
}
