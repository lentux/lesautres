<?php

namespace LesAutres\SiteBundle\Controller;

use LesAutres\SiteBundle\Controller\DefaultController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FeedController extends DefaultController
{
    public function eventsAction($type)
    {
        if($type != "atom" and $type != "rss")
        {
            throw $this->createNotFoundException('La page demandée n\'existe pas');
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $events = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Event')
            ->findAll()
        ;
        
        $response = new Response();
        $response->headers->set('Content-Type', 'application/'.$type.'+xml');
        $response->sendHeaders();
        
        return $this->render(
            'LesAutresSiteBundle:Feed:events.'.$type.'.twig',
            array(
                'events' => $events,
                'lastUpdated' => $em->getRepository('LesAutresSiteBundle:Event')->getLatestEvent()->getCreatedAt(),
            ),
            $response
        );
    }
}