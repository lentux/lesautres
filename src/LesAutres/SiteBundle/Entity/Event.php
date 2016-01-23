<?php

namespace LesAutres\SiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="events")
 * @ORM\Entity(repositoryClass="LesAutres\SiteBundle\Entity\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=256, nullable=true)
     */
    protected $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Show", inversedBy="events")
     * @ORM\JoinColumn(name="show_id", referencedColumnName="id")
     */
    protected $show;

    /**
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="events")
     * @ORM\JoinColumn(name="place_id", referencedColumnName="id")
     */
    protected $place;

    /**
     * @ORM\OneToMany(targetEntity="Date", mappedBy="event", cascade={"persist", "remove"})
     */
    protected $dates;
    
    
    
    
    
    
    /**
     * CONSTRUCTOR
     */

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->dates = new ArrayCollection();
    }
    
    public function __toString()
    {
        return (
            $this->id ?
            ($this->title ? $this->title : "Événement ".$this->id) :
            "Nouvel événement"
        );
    }
    
    
    
    
    
    
    /**
     * METHODS
     */
    
    public function setDates($dates) {
        $this->dates = new ArrayCollection();
 
        foreach ($dates as $date) {
            $date->setEvent($this);
            $this->addDate($date);
        }
    }
    
    public function getDatesAfterNow() {
        $dates_after_now = new ArrayCollection();
        $now = new \DateTime();
        
        foreach ($this->dates as $date) {
            if ($date->getDate() > $now) {
                $dates_after_now[] = $date;
            }
        }
        
        return $dates_after_now;
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Event
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
     * @return Event
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
     * Set show
     *
     * @param \LesAutres\SiteBundle\Entity\Show $show
     * @return Event
     */
    public function setShow(\LesAutres\SiteBundle\Entity\Show $show = null)
    {
        $this->show = $show;
    
        return $this;
    }

    /**
     * Get show
     *
     * @return \LesAutres\SiteBundle\Entity\Show 
     */
    public function getShow()
    {
        return $this->show;
    }

    /**
     * Set place
     *
     * @param \LesAutres\SiteBundle\Entity\Place $place
     * @return Event
     */
    public function setPlace(\LesAutres\SiteBundle\Entity\Place $place = null)
    {
        $this->place = $place;
    
        return $this;
    }

    /**
     * Get place
     *
     * @return \LesAutres\SiteBundle\Entity\Place 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Add dates
     *
     * @param \LesAutres\SiteBundle\Entity\Date $dates
     * @return Event
     */
    public function addDate(\LesAutres\SiteBundle\Entity\Date $dates)
    {
        $this->dates[] = $dates;
    
        return $this;
    }

    /**
     * Remove dates
     *
     * @param \LesAutres\SiteBundle\Entity\Date $dates
     */
    public function removeDate(\LesAutres\SiteBundle\Entity\Date $dates)
    {
        $this->dates->removeElement($dates);
    }

    /**
     * Get dates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
