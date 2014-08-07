<?php

namespace Ly\HrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * betacrewinfo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class betacrewinfo
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255, nullable=true)
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="craft", type="string", length=255, nullable=true)
     */
    private $craft;


    /**
     * @var string
     *
     * @ORM\Column(name="passportno", type="string", length=255, nullable=true)
     */
    private $passportno;

    /**
     * @var string
     *
     * @ORM\Column(name="idno", type="string", length=255, nullable=true)
     */
    private $idno;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=true)
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="placeofbirth", type="string", length=255, nullable=true)
     */
    private $placeofbirth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="passportissuedate", type="date", nullable=true)
     */
    private $passportissuedate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="passportexpiredate", type="date", nullable=true)
     */
    private $passportexpiredate;

    /**
     * @var string
     *
     * @ORM\Column(name="passportissueplace", type="string", length=255, nullable=true)
     */
    private $passportissueplace;

    /**
     * @var string
     *
     * @ORM\Column(name="poe", type="string", length=255, nullable=true)
     */
    private $poe;

    /**
     * @var string
     *
     * @ORM\Column(name="seamanno", type="string", length=255, nullable=true)
     */
    private $seamanno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="seamanexpiredate", type="date", nullable=true)
     */
    private $seamanexpiredate;



    /**
     * @var string
     *
     * @ORM\Column(name="mother", type="string", length=255, nullable=true)
     */
    private $mother;

    /**
     * @var string
     *
     * @ORM\Column(name="father", type="string", length=255, nullable=true)
     */
    private $father;

    /**
     * @var string
     *
     * @ORM\Column(name="contactno", type="string", length=255, nullable=true)
     */
    private $contactno;

    /**
     * @var string
     *
     * @ORM\Column(name="homeno", type="string", length=255, nullable=true)
     */
    private $homeno;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="bloodtype", type="string", length=255, nullable=true)
     */
    private $bloodtype;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="nokname", type="string", length=255, nullable=true)
     */
    private $nokname;

    /**
     * @var string
     *
     * @ORM\Column(name="relationship", type="string", length=255, nullable=true)
     */
    private $relationship;

    /**
     * @var string
     *
     * @ORM\Column(name="education", type="string", length=255, nullable=true)
     */
    private $education;

    /**
     * @var string
     *
     * @ORM\Column(name="languages", type="string", length=255, nullable=true)
     */
    private $languages;
	
	/**
     * @ORM\OneToMany(targetEntity="betaexperience", mappedBy="fromid", cascade={"persist"})
	 * @ORM\OrderBy({"startdate" = "DESC"})
     */
	protected $experience;
	
	

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
     * Constructor
     */
    public function __construct()
    {
        $this->experience = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set name
     *
     * @param string $name
     * @return betacrewinfo
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
     * Set nationality
     *
     * @param string $nationality
     * @return betacrewinfo
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
     * Set craft
     *
     * @param string $craft
     * @return betacrewinfo
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
     * Set passportno
     *
     * @param string $passportno
     * @return betacrewinfo
     */
    public function setPassportno($passportno)
    {
        $this->passportno = $passportno;
    
        return $this;
    }

    /**
     * Get passportno
     *
     * @return string 
     */
    public function getPassportno()
    {
        return $this->passportno;
    }

    /**
     * Set idno
     *
     * @param string $idno
     * @return betacrewinfo
     */
    public function setIdno($idno)
    {
        $this->idno = $idno;
    
        return $this;
    }

    /**
     * Get idno
     *
     * @return string 
     */
    public function getIdno()
    {
        return $this->idno;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return betacrewinfo
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return betacrewinfo
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set placeofbirth
     *
     * @param string $placeofbirth
     * @return betacrewinfo
     */
    public function setPlaceofbirth($placeofbirth)
    {
        $this->placeofbirth = $placeofbirth;
    
        return $this;
    }

    /**
     * Get placeofbirth
     *
     * @return string 
     */
    public function getPlaceofbirth()
    {
        return $this->placeofbirth;
    }

    /**
     * Set passportissuedate
     *
     * @param \DateTime $passportissuedate
     * @return betacrewinfo
     */
    public function setPassportissuedate($passportissuedate)
    {
        $this->passportissuedate = $passportissuedate;
    
        return $this;
    }

    /**
     * Get passportissuedate
     *
     * @return \DateTime 
     */
    public function getPassportissuedate()
    {
        return $this->passportissuedate;
    }

    /**
     * Set passportexpiredate
     *
     * @param \DateTime $passportexpiredate
     * @return betacrewinfo
     */
    public function setPassportexpiredate($passportexpiredate)
    {
        $this->passportexpiredate = $passportexpiredate;
    
        return $this;
    }

    /**
     * Get passportexpiredate
     *
     * @return \DateTime 
     */
    public function getPassportexpiredate()
    {
        return $this->passportexpiredate;
    }

    /**
     * Set passportissueplace
     *
     * @param string $passportissueplace
     * @return betacrewinfo
     */
    public function setPassportissueplace($passportissueplace)
    {
        $this->passportissueplace = $passportissueplace;
    
        return $this;
    }

    /**
     * Get passportissueplace
     *
     * @return string 
     */
    public function getPassportissueplace()
    {
        return $this->passportissueplace;
    }

    /**
     * Set poe
     *
     * @param string $poe
     * @return betacrewinfo
     */
    public function setPoe($poe)
    {
        $this->poe = $poe;
    
        return $this;
    }

    /**
     * Get poe
     *
     * @return string 
     */
    public function getPoe()
    {
        return $this->poe;
    }

    /**
     * Set seamanno
     *
     * @param string $seamanno
     * @return betacrewinfo
     */
    public function setSeamanno($seamanno)
    {
        $this->seamanno = $seamanno;
    
        return $this;
    }

    /**
     * Get seamanno
     *
     * @return string 
     */
    public function getSeamanno()
    {
        return $this->seamanno;
    }

    /**
     * Set seamanexpiredate
     *
     * @param \DateTime $seamanexpiredate
     * @return betacrewinfo
     */
    public function setSeamanexpiredate($seamanexpiredate)
    {
        $this->seamanexpiredate = $seamanexpiredate;
    
        return $this;
    }

    /**
     * Get seamanexpiredate
     *
     * @return \DateTime 
     */
    public function getSeamanexpiredate()
    {
        return $this->seamanexpiredate;
    }

    /**
     * Set mother
     *
     * @param string $mother
     * @return betacrewinfo
     */
    public function setMother($mother)
    {
        $this->mother = $mother;
    
        return $this;
    }

    /**
     * Get mother
     *
     * @return string 
     */
    public function getMother()
    {
        return $this->mother;
    }

    /**
     * Set father
     *
     * @param string $father
     * @return betacrewinfo
     */
    public function setFather($father)
    {
        $this->father = $father;
    
        return $this;
    }

    /**
     * Get father
     *
     * @return string 
     */
    public function getFather()
    {
        return $this->father;
    }

    /**
     * Set contactno
     *
     * @param string $contactno
     * @return betacrewinfo
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
     * Set homeno
     *
     * @param string $homeno
     * @return betacrewinfo
     */
    public function setHomeno($homeno)
    {
        $this->homeno = $homeno;
    
        return $this;
    }

    /**
     * Get homeno
     *
     * @return string 
     */
    public function getHomeno()
    {
        return $this->homeno;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return betacrewinfo
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
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
     * Set bloodtype
     *
     * @param string $bloodtype
     * @return betacrewinfo
     */
    public function setBloodtype($bloodtype)
    {
        $this->bloodtype = $bloodtype;
    
        return $this;
    }

    /**
     * Get bloodtype
     *
     * @return string 
     */
    public function getBloodtype()
    {
        return $this->bloodtype;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return betacrewinfo
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set nokname
     *
     * @param string $nokname
     * @return betacrewinfo
     */
    public function setNokname($nokname)
    {
        $this->nokname = $nokname;
    
        return $this;
    }

    /**
     * Get nokname
     *
     * @return string 
     */
    public function getNokname()
    {
        return $this->nokname;
    }

    /**
     * Set relationship
     *
     * @param string $relationship
     * @return betacrewinfo
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;
    
        return $this;
    }

    /**
     * Get relationship
     *
     * @return string 
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * Set education
     *
     * @param string $education
     * @return betacrewinfo
     */
    public function setEducation($education)
    {
        $this->education = $education;
    
        return $this;
    }

    /**
     * Get education
     *
     * @return string 
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set languages
     *
     * @param string $languages
     * @return betacrewinfo
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    
        return $this;
    }

    /**
     * Get languages
     *
     * @return string 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Add experience
     *
     * @param \Ly\HrmBundle\Entity\betaexperience $experience
     * @return betacrewinfo
     */
    public function addExperience(\Ly\HrmBundle\Entity\betaexperience $experience)
    {
        $this->experience[] = $experience;
    
        return $this;
    }

    /**
     * Remove experience
     *
     * @param \Ly\HrmBundle\Entity\betaexperience $experience
     */
    public function removeExperience(\Ly\HrmBundle\Entity\betaexperience $experience)
    {
        $this->experience->removeElement($experience);
    }

    /**
     * Get experience
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExperience()
    {
        return $this->experience;
    }
}