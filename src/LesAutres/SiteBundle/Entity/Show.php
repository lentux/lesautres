<?php

namespace LesAutres\SiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shows")
 * @ORM\Entity(repositoryClass="LesAutres\SiteBundle\Entity\ShowRepository")
 */
class Show
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=128, unique=true)
     */
    protected $slug;

    /**
     * @ORM\Column(type="text")
     */
    protected $summary;

    /**
     * @ORM\Column(type="text")
     */
    protected $text;
    
    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    protected $duration;
    
    /**
     * @ORM\Column(type="integer", name="actor_count", nullable=true)
     */
    protected $actorCount;
    
    /**
     * @ORM\Column(type="integer", name="master_count", nullable=true)
     */
    protected $masterCount;
    
    /**
     * @ORM\Column(type="integer", name="playlet_count", nullable=true)
     */
    protected $playletCount;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="shows")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="shows")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    protected $page;

    /**
     * @ORM\OneToMany(targetEntity="Event", mappedBy="show")
     */
    protected $events;
    
    
    
    
    
    
    /**
     * CONSTRUCTOR
     */

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->events = new ArrayCollection();
    }
    
    public function __toString()
    {
        return (
            $this->title ?
            $this->title :
            "Nouveau spectacle"
        );
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
     * Set title
     *
     * @param string $title
     * @return Show
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
     * Set slug
     *
     * @param string $slug
     * @return Show
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Show
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    
        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Show
     */
    public function setText($text)
    {
        $this->text = $text;
    
        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Show
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
     * @return Show
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
     * Set author
     *
     * @param \LesAutres\SiteBundle\Entity\User $author
     * @return Show
     */
    public function setAuthor(\LesAutres\SiteBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \LesAutres\SiteBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set page
     *
     * @param \LesAutres\SiteBundle\Entity\Page $page
     * @return Show
     */
    public function setPage(\LesAutres\SiteBundle\Entity\Page $page = null)
    {
        $this->page = $page;
    
        return $this;
    }

    /**
     * Get page
     *
     * @return \LesAutres\SiteBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Add events
     *
     * @param \LesAutres\SiteBundle\Entity\Event $events
     * @return Show
     */
    public function addEvent(\LesAutres\SiteBundle\Entity\Event $events)
    {
        $this->events[] = $events;
    
        return $this;
    }

    /**
     * Remove events
     *
     * @param \LesAutres\SiteBundle\Entity\Event $events
     */
    public function removeEvent(\LesAutres\SiteBundle\Entity\Event $events)
    {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Show
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    
        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set actorCount
     *
     * @param integer $actorCount
     * @return Show
     */
    public function setActorCount($actorCount)
    {
        $this->actorCount = $actorCount;
    
        return $this;
    }

    /**
     * Get actorCount
     *
     * @return integer 
     */
    public function getActorCount()
    {
        return $this->actorCount;
    }

    /**
     * Set masterCount
     *
     * @param integer $masterCount
     * @return Show
     */
    public function setMasterCount($masterCount)
    {
        $this->masterCount = $masterCount;
    
        return $this;
    }

    /**
     * Get masterCount
     *
     * @return integer 
     */
    public function getMasterCount()
    {
        return $this->masterCount;
    }

    /**
     * Set playletCount
     *
     * @param integer $playletCount
     * @return Show
     */
    public function setPlayletCount($playletCount)
    {
        $this->playletCount = $playletCount;
    
        return $this;
    }

    /**
     * Get playletCount
     *
     * @return integer 
     */
    public function getPlayletCount()
    {
        return $this->playletCount;
    }
}