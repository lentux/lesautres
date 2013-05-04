<?php

namespace LesAutres\SiteBundle\Controller;

use LesAutres\SiteBundle\Controller\LesAutresController;

class AdminController extends LesAutresController
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
