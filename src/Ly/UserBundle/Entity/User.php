<?php
// src/Acme/UserBundle/Entity/User.php

namespace Ly\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="Ly\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="integer")
     */
    protected $betacrewid;

	/**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255, nullable=true)
     */
    protected $nationality;
	
	/**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    protected $lastname;
	
	/**
     * @var string
     *
     * @ORM\Column(name="craft", type="string", length=255, nullable=true)
     */
    protected $craft;
	
	/**
     * @var string
     *
     * @ORM\Column(name="contactno", type="string", length=255, nullable=true)
     */
    protected $contactno;

    /**
     * @var string
     *
     * @ORM\Column(name="client_short", type="string", length=255, nullable=true)
     */
    protected $client_short;
	
	

    public function __construct()
    {
        parent::__construct();
		
		$this->betacrewid = 0;
		
		$this->roles = array('ROLE_CREW');
		
        // your own logic
    }
	
	public function setEmail($email){
	    parent::setEmail($email);
	    parent::setUsername($email);
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
     * Set name
     *
     * @param string $name
     * @return User
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
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
	

    /**
     * Set nationality
     *
     * @param string $nationality
     * @return User
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

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set craft
     *
     * @param string $craft
     * @return User
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
     * Set contactno
     *
     * @param string $contactno
     * @return User
     */
    public function setContactno($contactno)
    {
        $this->contactno = $contactno;
    
        return $this;
    }

    /**
     * Get contactno
     *
     * @return string 
     */
    public function getContactno()
    {
        return $this->contactno;
    }

    /**
     * Set crewinfo
     *
     * @param \Ly\HrmBundle\Entity\betacrewinfo $crewinfo
     * @return User
     */
    public function setCrewinfo(\Ly\HrmBundle\Entity\betacrewinfo $crewinfo = null)
    {
        $this->crewinfo = $crewinfo;
    
        return $this;
    }

    /**
     * Get crewinfo
     *
     * @return \Ly\HrmBundle\Entity\betacrewinfo 
     */
    public function getCrewinfo()
    {
        return $this->crewinfo;
    }

    /**
     * Set betacrewid
     *
     * @param integer $betacrewid
     * @return User
     */
    public function setBetacrewid($betacrewid)
    {
        $this->betacrewid = $betacrewid;
    
        return $this;
    }

    /**
     * Get betacrewid
     *
     * @return integer 
     */
    public function getBetacrewid()
    {
        return $this->betacrewid;
    }

    /**
     * Set client_short
     *
     * @param string $clientShort
     * @return User
     */
    public function setClientShort($clientShort)
    {
        $this->client_short = $clientShort;
    
        return $this;
    }

    /**
     * Get client_short
     *
     * @return string 
     */
    public function getClientShort()
    {
        return $this->client_short;
    }
}