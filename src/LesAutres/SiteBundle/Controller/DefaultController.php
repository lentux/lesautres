<?php

namespace LesAutres\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render(
            'LesAutresSiteBundle:Default:index.html.twig',
            array(
                'title' => "Accueil",
            )
        );
    }
}
