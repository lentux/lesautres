<?php

namespace LesAutres\SiteBundle\Controller;

use LesAutres\SiteBundle\Controller\DefaultController;

class AdminController extends DefaultController
{
    public function indexAction()
    {date_default_timezone_set('Europe/Paris');
        return $this->render(
            'LesAutresSiteBundle:Admin:index.html.twig',
            array(
                'title' => "Outils",
            )
        );
    }
}
