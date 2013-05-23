<?php

namespace LesAutres\SiteBundle\Controller;

use LesAutres\SiteBundle\Controller\DefaultController;
use LesAutres\SiteBundle\Entity\Contact;
use LesAutres\SiteBundle\Form\Type\ContactType;

class ContactController extends DefaultController
{
    public function formAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);
        
        if ($request->isMethod('POST'))
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $contact->send();
                
                return $this->redirect($this->generateUrl('contact_confirm'));
            }
        }
        
        return $this->render(
            'LesAutresSiteBundle:Contact:form.html.twig',
            array(
                'title' => "Nous contacter",
                'description' => "",
                'keywords' => "",
                'form' => $form->createView(),
            )
        );
    }
    
    
    
    public function confirmAction()
    {
        return $this->render(
            'LesAutresSiteBundle:Contact:confirm.html.twig',
            array(
                'title' => "Nous contacter",
                'description' => "",
                'keywords' => "",
            )
        );
    }
}
