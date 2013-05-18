<?php

namespace LesAutres\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM; 
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="files")
 * @ORM\Entity(repositoryClass="LesAutres\SiteBundle\Entity\FileRepository")
 */
class File
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;

    /**
     * @ORM\Column(name="is_pdf", type="boolean")
     */
    private $isPdf;

    /**
     * @ORM\Column(name="is_image", type="boolean")
     */
    private $isImage;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     * image width and height
     */
    protected $attr;

    /**
     * @ORM\ManyToOne(targetEntity="Show", inversedBy="files")
     * @ORM\JoinColumn(name="show_id", referencedColumnName="id")
     */
    protected $show;

    /**
     * @ORM\Column(type="string", length=255, name="mimetype", nullable=true)
     */
    protected $mimeType;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;
    
    protected $file;
    
    
    
    
    
    
    /**
     * CONSTRUCTOR
     */

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }
    
    public function __toString()
    {
        return (
            $this->path ?
            $this->path :
            "Nouveau fichier"
        );
    }
    
    
    
    
    
    
    /**
     * METHODS
     */
    
    public function isImage()
    {
        return ($this->mimeType == "image/jpeg" || $this->mimeType == "image/jpg" || $this->mimeType == "image/png");
    }
    
    
    
    
    
    
    /**
     * FILE UPLOAD
     */
    
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }
        
        $this->mimeType = $this->file->getMimeType();
        
        // width and height
        if($this->isImage())
        {
            list($width, $height, $type, $attr) = getimagesize($this->file);
            $this->attr = $attr;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues
        $filename = $this->file->getClientOriginalName();

        // move takes the target directory and then the
        // target filename to move to
        $this->file->move(
            $this->getUploadRootDir(),
            $filename
        );

        // set the path property to the filename where you've saved the file
        $this->path = $filename;

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }
    
    public function getAbsolutePath()
    {
        return $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return '/'.$this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/show/'.$this->show->getSlug();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
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
     * Set path
     *
     * @param string $path
     * @return File
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     * @return File
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    
        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string 
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return File
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
     * @return File
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
     * @return File
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
     * Set file
     *
     * @param File $file
     * @return Project
     */
    public function setFile($file)
    {
        $this->file = $file;
    
        return $this;
    }

    /**
     * Get file
     *
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set isPdf
     *
     * @param boolean $isPdf
     * @return File
     */
    public function setIsPdf($isPdf)
    {
        $this->isPdf = $isPdf;
    
        return $this;
    }

    /**
     * Get isPdf
     *
     * @return boolean 
     */
    public function getIsPdf()
    {
        return $this->isPdf;
    }

    /**
     * Set isImage
     *
     * @param boolean $isImage
     * @return File
     */
    public function setIsImage($isImage)
    {
        $this->isImage = $isImage;
    
        return $this;
    }

    /**
     * Get isImage
     *
     * @return boolean 
     */
    public function getIsImage()
    {
        return $this->isImage;
    }

    /**
     * Set attr
     *
     * @param string $attr
     * @return File
     */
    public function setAttr($attr)
    {
        $this->attr = $attr;
    
        return $this;
    }

    /**
     * Get attr
     *
     * @return string 
     */
    public function getAttr()
    {
        return $this->attr;
    }
}