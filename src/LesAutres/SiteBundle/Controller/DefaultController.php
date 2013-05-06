<?php

namespace LesAutres\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function nextEventsAction()
    {
        $dates = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Date')
            ->getNextDates(10)
        ;
        
        return $this->render(
            'LesAutresSiteBundle:Default:next_events.html.twig',
            array(
                'dates' => $dates,
            )
        );
    }
    
    
    
    public function menuAction($menu_underline_slug)
    {
        $pages = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Page')
            ->findAll()
        ;
        
        return $this->render(
            'LesAutresSiteBundle:Default:menu.html.twig',
            array(
                'pages' => $pages,
                'menu_underline_slug' => $menu_underline_slug,
            )
        );
    }
}
