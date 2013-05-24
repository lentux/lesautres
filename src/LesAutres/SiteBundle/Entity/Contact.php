<?php

namespace LesAutres\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Contact
{
    protected $name;
    protected $from;
    protected $subject;
    protected $message;
    
    
    
    
    
    
    /**
     * CONSTRUCTOR
     */

    public function __construct()
    {
        $this->to = "";
    }
    
    public function __toString()
    {
        return (
            $this->subject ?
            $this->subject :
            "Nouveau message"
        );
    }
    
    
    
    
    
    
    /**
     * METHODS
     */
    
    public function send()
    {
        global $kernel;
        
        if ('AppCache' == get_class($kernel)) {
            $kernel = $kernel->getKernel();
        }
        
        $email = \Swift_Message::newInstance()
            ->setSubject("[www.lesautres.org] ".$this->subject)
            ->setFrom($this->from)
            ->setTo($kernel->getContainer()->getParameter('contact_email'))
            ->setBody("De ".$this->name." : ".$this->message)
        ;
        
        $kernel->getContainer()->get('mailer')->send($email);
    }
    
    
    
    
    
    
    /**
     * GETTERS & SETTERS
     */

    /**
     * Set name
     *
     * @param string $name
     * @return Contact
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set from
     *
     * @param string $from
     * @return Contact
     */
    public function setFrom($from)
    {
        $this->from = $from;
    
        return $this;
    }

    /**
     * Get from
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return Contact
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}