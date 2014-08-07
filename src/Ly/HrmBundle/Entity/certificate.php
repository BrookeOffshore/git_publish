<?php

namespace Ly\HrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * certificate
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class certificate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @ORM\ManyToOne(targetEntity="crewinfo", inversedBy="$certificate")
     * @ORM\JoinColumn(name="certificate_id", referencedColumnName="id")
     */
    private $fromid;

    /**
     * @var string
     *
	 * @Assert\NotBlank()
	 * @Assert\NotNull()
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(name="category", type="string", length=255, nullable=true)
     */
    private $category;

    /**
     * @var \DateTime
     * 
	 * @Assert\Type("\DateTime")
     * @ORM\Column(name="startdate", type="date", nullable=true)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate", type="date", nullable=true)
     */
    private $enddate;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;
	
	/**
     * @var string
     *
     * @ORM\Column(name="pathsave", type="string", length=255, nullable=true)
     */
    private $pathsave;


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
     * @return certificate
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
     * Set startdate
     *
     * @param \DateTime $startdate
     * @return certificate
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    
        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime 
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     * @return certificate
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    
        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime 
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return certificate
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return certificate
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
     * Set fromid
     *
     * @param \Ly\HrmBundle\Entity\crewinfo $fromid
     * @return certificate
     */
    public function setFromid(\Ly\HrmBundle\Entity\crewinfo $fromid = null)
    {
        $this->fromid = $fromid;
    
        return $this;
    }

    /**
     * Get fromid
     *
     * @return \Ly\HrmBundle\Entity\crewinfo 
     */
    public function getFromid()
    {
        return $this->fromid;
    }

    /**
     * Set pathsave
     *
     * @param string $pathsave
     * @return certificate
     */
    public function setPathsave($pathsave)
    {
        $this->pathsave = $pathsave;
    
        return $this;
    }

    /**
     * Get pathsave
     *
     * @return string 
     */
    public function getPathsave()
    {	
        return $this->pathsave;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return certificate
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }
}