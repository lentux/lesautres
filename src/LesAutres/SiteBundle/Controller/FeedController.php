<?php

namespace LesAutres\SiteBundle\Controller;

use LesAutres\SiteBundle\Controller\DefaultController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FeedController extends DefaultController
{
    public function eventsAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $events = $this->getDoctrine()
            ->getRepository('LesAutresSiteBundle:Event')
            ->findAll()
        ;
        
        return $this->render(
            'LesAutresSiteBundle:Feed:events.atom.twig',
            array(
                'events' => $events,
                'lastUpdated' => $em->getRepository('LesAutresSiteBundle:Event')->getLatestEvent()->getCreatedAt()->format(DATE_ATOM),
                'feedId' => sha1($this->get('router')->generate('homepage', array('_format'=> 'atom'), true)),
            )
        );
    }
}