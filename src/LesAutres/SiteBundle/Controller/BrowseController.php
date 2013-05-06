<?php

namespace LesAutres\SiteBundle\Controller;

use LesAutres\SiteBundle\Controller\DefaultController;
use LesAutres\SiteBundle\Entity\Date;
use LesAutres\SiteBundle\Entity\Page;
use LesAutres\SiteBundle\Entity\Show;
use Symfony\Component\HttpFoundation\Response;

class BrowseController extends DefaultController
{
    public function indexAction()
    {
        return $this->render(
            'LesAutresSiteBundle:Browse:index.html.twig',
            array(
                'title' => "Accueil",
                'menu_underline_slug' => "accueil",
            )
        );
    }
    
    
    
    public function pageAction(Page $page)
    {
        return $this->render(
            'LesAutresSiteBundle:Browse:page.html.twig',
            array(
                'title' => $page->getTitle(),
                'menu_underline_slug' => $page->getSlug(),
                'page' => $page,
            )
        );
    }
    
    
    
    public function showAction(Show $show)
    {
        return $this->render(
            'LesAutresSiteBundle:Browse:show.html.twig',
            array(
                'title' => $show->getTitle(),
                'menu_underline_slug' => $show->getPage()->getSlug(),
                'show' => $show,
            )
        );
    }
    
    
    /*
    public function dateAction($day, $month, $year)
    {
        $dates = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Date')
            ->getDatesForDay($day, $month, $year)
        ;
        
        $date = new Date();
        $date->setDate(new \DateTime($year."-".$month."-".$day." 00:00:00"));
        
        return $this->render(
            'LesAutresSiteBundle:Browse:date.html.twig',
            array(
                'title' => "Représentations du ".$date->getFormatedDate(false),
                'dates' => $dates,
            )
        );
    }*/
}
