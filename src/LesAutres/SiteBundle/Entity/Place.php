<?php

namespace LesAutres\SiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="places")
 * @ORM\Entity(repositoryClass="LesAutres\SiteBundle\Entity\PlaceRepository")
 */
class Place
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
    protected $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $street;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $zipcode;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    protected $city;
    
    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    protected $latitude;
    
    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    protected $longitude;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $zoom;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Departement", inversedBy="places")
     * @ORM\JoinColumn(name="departement_id", referencedColumnName="id")
     */
    protected $departement;

    /**
     * @ORM\OneToMany(targetEntity="Event", mappedBy="place")
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
        $this->zoom = 17;
    }
    
    public function __toString()
    {
        return (
            $this->name ?
            $this->name :
            "Nouveau lieu"
        );
    }
    
    
    
    
    
    
    /**
     * METHODS
     */
    
    // function to geocode address, it will return false if unable to geocode address
    public function geocode(){
     
        // url encode the address
        $address = urlencode($this->street . ", " . $this->zipcode . " " . $this->city);
         
        // google map geocode api url
        $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
     
        // get the json response
        $resp_json = file_get_contents($url);
         
        // decode the json
        $resp = json_decode($resp_json, true);
     
        // response status will be 'OK', if able to geocode given address 
        if($resp['status'] === 'OK'){
     
            // get the important data
            $latitude = $resp['results'][0]['geometry']['location']['lat'];
            $longitude = $resp['results'][0]['geometry']['location']['lng'];
             
            // verify if data is complete
            if($latitude && $longitude){
             
                // put the data in the array
                $this->latitude = $latitude;
                $this->longitude = $longitude;
                
                // get zipcode or city from response if empty
                if(!$this->zipcode or !$this->city) {
                    foreach($resp['results'][0]['address_components'] as $component) {
                        if (!$this->zipcode and array_key_exists("postal_code",$component['types'])) {
                            $this->zipcode = $component['long_name'];
                        }
                        if (!$this->city and array_key_exists("locality",$component['types'])) {
                            $this->city = $component['long_name'];
                        }
                    }
                }
                
                return true;
                 
            } else {
                return false;
            }
             
        } else {
            return false;
        }
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
     * Set name
     *
     * @param string $name
     * @return Place
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
     * Set description
     *
     * @param string $description
     * @return Place
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

    /**
     * Set street
     *
     * @param string $street
     * @return Place
     */
    public function setStreet($street)
    {
        $this->street = $street;
    
        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set zipcode
     *
     * @param integer $zipcode
     * @return Place
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    
        return $this;
    }

    /**
     * Get zipcode
     *
     * @return integer 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Place
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Place
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
     * @return Place
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
     * Set departement
     *
     * @param \LesAutres\SiteBundle\Entity\Departement $departement
     * @return Place
     */
    public function setDepartement(\LesAutres\SiteBundle\Entity\Departement $departement = null)
    {
        $this->departement = $departement;
    
        return $this;
    }

    /**
     * Get departement
     *
     * @return \LesAutres\SiteBundle\Entity\Departement 
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Add events
     *
     * @param \LesAutres\SiteBundle\Entity\Event $events
     * @return Place
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
     * Set latitude
     *
     * @param string $latitude
     * @return Place
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        if (!$this->latitude) {
            $this->geocode();
        }

        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Place
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set zoom
     *
     * @param integer $zoom
     * @return Place
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;

        return $this;
    }

    /**
     * Get zoom
     *
     * @return integer 
     */
    public function getZoom()
    {
        return $this->zoom;
    }
}
