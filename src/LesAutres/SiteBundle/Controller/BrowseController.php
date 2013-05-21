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
                'description' => "Compagnie de théâtre professionnelle basée en Provence. Elle est spécialisée en théâtre-forum, théâtre-image et théâtre de l'opprimé. Ses membres sont comédiens, techniciens et auteurs de spectacle vivant.",
                'keywords' => "compagnie, compagnie des autres, théâtre, théâtre forum, ateliers, formation, création, professionnel, spectacles",
                'menu_underline_slug' => "accueil",
            )
        );
    }
    
    
    
    public function pageAction(Page $page)
    {
        $shows = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Show')
            ->getShowsForPage($page)
        ;
        
        return $this->render(
            'LesAutresSiteBundle:Browse:page.html.twig',
            array(
                'title' => $page->getTitle(),
                'description' => $page->getSummary(),
                'keywords' => $page->getKeywords(),
                'menu_underline_slug' => $page->getSlug(),
                'page' => $page,
                'shows' => $shows,
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
                'description' => $show->getSummary(),
                'keywords' => $show->getKeywords(),
                'menu_underline_slug' => $show->getPage()->getSlug(),
                'show' => $show,
                'pdf' => $pdf,
                'image' => $image,
            )
        );
    }
}
