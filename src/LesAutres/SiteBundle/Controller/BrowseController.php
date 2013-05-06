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
        $page = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Page')
            ->findOneBy(array('slug' => 'accueil'))
        ;
        
        return $this->pageAction($page);
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
        $pdf = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:File')
            ->findOneBy(array(
                'show' => $show,
                'isPdf' => true,
            ))
        ;
        $image = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:File')
            ->findOneBy(array(
                'show' => $show,
                'isImage' => true,
            ))
        ;
        
        return $this->render(
            'LesAutresSiteBundle:Browse:show.html.twig',
            array(
                'title' => $show->getTitle(),
                'menu_underline_slug' => $show->getPage()->getSlug(),
                'show' => $show,
                'pdf' => $pdf,
                'image' => $image,
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
