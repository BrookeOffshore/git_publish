<?php

namespace Ly\HrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * mobrecord
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mobrecord
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
     * @ORM\ManyToOne(targetEntity="crewinfo", inversedBy="mob")
     * @ORM\JoinColumn(name="mob_id", referencedColumnName="id")
     */
    private $fromid;
	
	 /**
     * @ORM\ManyToOne(targetEntity="mobgroup", inversedBy="mob")
     * @ORM\JoinColumn(name="mobgroup_id", referencedColumnName="id")
     */
    private $frommobgroup;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startdate", type="datetime", nullable=true)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate", type="datetime", nullable=true)
     */
    private $enddate;

   

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="string", length=255, nullable=true)
     */
    private $rate;

    /**
     * @var string
     *
     * @ORM\Column(name="remark", type="text", nullable=true)
     */
    private $remark;


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
     * Set fromid
     *
     * @param integer $fromid
     * @return mobrecord
     */
    public function setFromid($fromid)
    {
        $this->fromid = $fromid;
    
        return $this;
    }

    /**
     * Get fromid
     *
     * @return integer 
     */
    public function getFromid()
    {
        return $this->fromid;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return mobrecord
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
     * @return mobrecord
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
     * Set startdate
     *
     * @param \DateTime $startdate
     * @return mobrecord
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
     * @return mobrecord
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
     * Set project
     *
     * @param string $project
     * @return mobrecord
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
     * Set rate
     *
     * @param string $rate
     * @return mobrecord
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    
        return $this;
    }

    /**
     * Get rate
     *
     * @return string 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return mobrecord
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
    
        return $this;
    }

    /**
     * Get remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set frommobgroup
     *
     * @param \Ly\HrmBundle\Entity\mobgroup $frommobgroup
     * @return mobrecord
     */
    public function setFrommobgroup(\Ly\HrmBundle\Entity\mobgroup $frommobgroup = null)
    {
        $this->frommobgroup = $frommobgroup;
    
        return $this;
    }

    /**
     * Get frommobgroup
     *
     * @return \Ly\HrmBundle\Entity\mobgroup 
     */
    public function getFrommobgroup()
    {
        return $this->frommobgroup;
    }
}