<?php

namespace LesAutres\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dates")
 * @ORM\Entity(repositoryClass="LesAutres\SiteBundle\Entity\DateRepository")
 */
class Date
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="dates")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    protected $event;
    
    
    
    
    
    
    /**
     * CONSTRUCTOR
     */

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->date = new \DateTime();
    }
    
    public function __toString()
    {
        return $this->getFormatedDateTime(true);
    }
    
    
    
    
    
    
    /**
     * METHODS
     */
    
    /**
     * Retourne la date et l'heure formatées en français
     * 
     * @param boolean $dayofweek
     * @return string
     */
    public function getFormatedDateTime($dayofweek = true)
    {
        return $this->getFormatedDate($dayofweek)." à ".$this->getFormatedTime();
    }
    
    /**
     * Retourne la date formatée en français
     * 
     * @param boolean $dayofweek
     * @return string
     */
    public function getFormatedDate($dayofweek = true)
    {
        $timestamp = $this->date->getTimestamp();
        
        $daysofweek = array(
            1 => "lundi",
            2 => "mardi",
            3 => "mercredi",
            4 => "jeudi",
            5 => "vendredi",
            6 => "samedi",
            7 => "dimanche",
        );
        
        $months = array(
            1 => "janvier",
            2 => "février",
            3 => "mars",
            4 => "avril",
            5 => "mai",
            6 => "juin",
            7 => "juillet",
            8 => "août",
            9 => "septembre",
            10 => "octobre",
            11 => "novembre",
            12 => "décembre",
        );
        
        return
            ($dayofweek ? $daysofweek[date('N', $timestamp)]." " : '').
            date('j', $timestamp).(date('j', $timestamp) == 1 ? "er" : '')." ".
            $months[date('n', $timestamp)]." ".
            date('Y', $timestamp)
        ;
    }
    
    /**
     * Retourne l'heure formatée en français
     * 
     * @param boolean $seconds
     * @return string
     */
    public function getFormatedTime()
    {
        return date('H\hi', $this->date->getTimestamp());
    }
    
    
    
    
    
    
    /**
     * GETTERS & SETTERS
     */

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Date
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Date
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Date
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set event
     *
     * @param \LesAutres\SiteBundle\Entity\Event $event
     * @return Date
     */
    public function setEvent(\LesAutres\SiteBundle\Entity\Event $event = null)
    {
        $this->event = $event;
    
        return $this;
    }

    /**
     * Get event
     *
     * @return \LesAutres\SiteBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}
