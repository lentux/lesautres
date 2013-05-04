<?php

namespace LesAutres\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render(
            'LesAutresSiteBundle:Admin:index.html.twig',
            array(
                'title' => "Outils",
            )
        );
    }
}
