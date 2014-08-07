<?php

namespace Ly\HrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection; 

/**
 * mobgroup
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mobgroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
	 * 
     */
    private $id;

	/**
     * @var string
     *
     * @ORM\Column(name="record", type="string", length=255, nullable=true)
     */
    private $record;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="vessel", type="string", length=255, nullable=true)
     */
    private $vessel;

	/**
     * @var string
     *
     * @ORM\Column(name="project", type="string", length=255, nullable=true)
     */
    private $project;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="crewamount", type="smallint", nullable=true)
     */
    private $crewamount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mobdate", type="date", nullable=true)
     */
    private $mobdate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
	/**
     * @var string
     *
     * @ORM\Column(name="preparedby", type="text", nullable=true)
     */
    private $preparedby;

	/**
     * @ORM\OneToMany(targetEntity="mobrecord", mappedBy="frommobgroup")
     */
	protected $mobrecord;
	

    public function __construct()
    {
		$this->mob = new ArrayCollection();
    }

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
     * Set company
     *
     * @param string $company
     * @return mobgroup
     */
    public function setCompany($company)
    {
        $this->company = $company;
    
        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set vessel
     *
     * @param string $vessel
     * @return mobgroup
     */
    public function setVessel($vessel)
    {
        $this->vessel = $vessel;
    
        return $this;
    }

    /**
     * Get vessel
     *
     * @return string 
     */
    public function getVessel()
    {
        return $this->vessel;
    }

    /**
     * Set crewamount
     *
     * @param integer $crewamount
     * @return mobgroup
     */
    public function setCrewamount($crewamount)
    {
        $this->crewamount = $crewamount;
    
        return $this;
    }

    /**
     * Get crewamount
     *
     * @return integer 
     */
    public function getCrewamount()
    {
        return $this->crewamount;
    }

    /**
     * Set mobdate
     *
     * @param \DateTime $mobdate
     * @return mobgroup
     */
    public function setMobdate($mobdate)
    {
        $this->mobdate = $mobdate;
    
        return $this;
    }

    /**
     * Get mobdate
     *
     * @return \DateTime 
     */
    public function getMobdate()
    {
        return $this->mobdate;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return mobgroup
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
     * Set record
     *
     * @param string $record
     * @return mobgroup
     */
    public function setRecord($record)
    {
        $this->record = $record;
    
        return $this;
    }

    /**
     * Get record
     *
     * @return string 
     */
    public function getRecord()
    {
        return $this->record;
    }

    /**
     * Set project
     *
     * @param string $project
     * @return mobgroup
     */
    public function setProject($project)
    {
        $this->project = $project;
    
        return $this;
    }

    /**
     * Get project
     *
     * @return string 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add mobrecord
     *
     * @param \Ly\HrmBundle\Entity\mobrecord $mobrecord
     * @return mobgroup
     */
    public function addMobrecord(\Ly\HrmBundle\Entity\mobrecord $mobrecord)
    {
        $this->mobrecord[] = $mobrecord;
    
        return $this;
    }

    /**
     * Remove mobrecord
     *
     * @param \Ly\HrmBundle\Entity\mobrecord $mobrecord
     */
    public function removeMobrecord(\Ly\HrmBundle\Entity\mobrecord $mobrecord)
    {
        $this->mobrecord->removeElement($mobrecord);
    }

    /**
     * Get mobrecord
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMobrecord()
    {
        return $this->mobrecord;
    }

    /**
     * Set preparedby
     *
     * @param string $preparedby
     * @return mobgroup
     */
    public function setPreparedby($preparedby)
    {
        $this->preparedby = $preparedby;
    
        return $this;
    }

    /**
     * Get preparedby
     *
     * @return string 
     */
    public function getPreparedby()
    {
        return $this->preparedby;
    }
}