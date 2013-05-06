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
    
    
    
    public function slideshowAction($page_slug)
    {
        $images_web_dir = '/images/slideshow/'.$page_slug;
        $images_root_dir = __DIR__.'/../Resources/public'.$images_web_dir;
        if(!file_exists($images_root_dir))
        {
            return $this->render('LesAutresSiteBundle:Default:empty.html.twig');
        }
        
        $images = array();
        if ($handle = opendir($images_root_dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
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
}
