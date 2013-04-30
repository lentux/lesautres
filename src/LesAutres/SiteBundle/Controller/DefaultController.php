<?php

namespace LesAutres\SiteBundle\Controller;

use LesAutres\SiteBundle\Entity\Page;
use LesAutres\SiteBundle\Entity\Show;
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
    
    
    
    public function pageAction(Page $page)
    {
        return $this->render(
            'LesAutresSiteBundle:Default:page.html.twig',
            array(
                'title' => $page->getTitle(),
                'page' => $page,
            )
        );
    }
    
    
    
    public function showAction(Show $show)
    {
        return $this->render(
            'LesAutresSiteBundle:Default:show.html.twig',
            array(
                'title' => $show->getTitle(),
                'show' => $show,
            )
        );
    }
    
    
    
    public function dateAction($day, $month, $year)
    {
        $dates = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Date')
            ->getDatesForDay($day, $month, $year)
        ;
        
        return $this->render(
            'LesAutresSiteBundle:Default:date.html.twig',
            array(
                'title' => $day."/".$month."/".$year,
                'dates' => $dates,
            )
        );
    }
}
