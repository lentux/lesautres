<?php

namespace LesAutres\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function nextEventsAction()
    {
        $dates = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Date')
            ->getNextDates(50)
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
    
    
    
    public function slideshowAction($page_slug)
    {
        if(!$page_slug)
        {
            $page_slug = 'accueil';
        }
        
        $images_web_dir = '/images/slideshow/'.$page_slug;
        $images_root_dir = __DIR__.'/../Resources/public'.$images_web_dir;
        if(!file_exists($images_root_dir))
        {
            return $this->render('LesAutresSiteBundle:Default:empty.html.twig');
        }
        
        $images = array();
        if ($handle = opendir($images_root_dir))
        {
            while (false !== ($file = readdir($handle)))
            {
                if ($file != "." && $file != ".." && !is_dir($file))
                {
                    $images[] = $file;
                }
            }
            closedir($handle);
        }
        sort($images);
        
        return $this->render(
            'LesAutresSiteBundle:Default:slideshow.html.twig',
            array(
                'web_dir' => $images_web_dir,
                'images' => $images,
            )
        );
    }
    
    
    
    public function scrollingTextAction()
    {
        $option = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Setting')
            ->findOneBy(array('key' => 'scrolling_text'))
        ;
        
        $scrolling_text = $option->getValue();
        
        return $this->render(
            'LesAutresSiteBundle:Default:string.html.twig',
            array(
                'string' => $scrolling_text,
            )
        );
    }
    
    
    
    public function sitemapAction()
    {
        // pages statiques
        $urls = array(
            "http://www.lesautres.org/",
            "http://www.lesautres.org/nous-contacter",
        );
        
        // pages
        $pages = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Page')
            ->findAll()
        ;
        foreach($pages as $page)
        {
            $urls[] = "http://www.lesautres.org/".$page->getSlug();
        }
        
        // fiches spectacles
        $shows = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Show')
            ->findAll()
        ;
        foreach($shows as $show)
        {
            $urls[] = "http://www.lesautres.org/spectacle/".$show->getSlug();
        }
        
        // réponse
        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml');
        $response->sendHeaders();
        
        return $this->render(
            'LesAutresSiteBundle:Default:sitemap.xml.twig',
            array(
                'urls' => $urls,
            ),
            $response
        );
    }
}
