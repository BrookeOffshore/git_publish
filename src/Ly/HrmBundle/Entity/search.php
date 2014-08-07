<?php

namespace Ly\HrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * search
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class search
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
     * @var string
     *
     * @ORM\Column(name="keyword", type="string", length=255, nullable=true)
     */
    private $keyword;

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
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="craft", type="string", length=255, nullable=true)
     */
    private $craft;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255, nullable=true)
     */
    private $nationality;


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
     * Set keyword
     *
     * @param string $keyword
     * @return search
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    
        return $this;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return search
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
     * @return search
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
     * Set status
     *
     * @param string $status
     * @return search
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set craft
     *
     * @param string $craft
     * @return search
     */
    public function setCraft($craft)
    {
        $this->craft = $craft;
    
        return $this;
    }

    /**
     * Get craft
     *
     * @return string 
     */
    public function getCraft()
    {
        return $this->craft;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     * @return search
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    
        return $this;
    }

    /**
     * Get nationality
     *
     * @return string 
     */
    public function getNationality()
    {
        return $this->nationality;
    }
}
