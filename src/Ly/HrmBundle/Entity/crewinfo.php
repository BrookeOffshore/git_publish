<?php

namespace Ly\HrmBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection; 
/**
 * crewinfo
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Ly\HrmBundle\Entity\crewinfoRepository")
 */
class crewinfo
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
     * @var integer
     *
     * @ORM\Column(name="contractno", type="integer", nullable=true)
     */
     
     
    private $contractno;

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
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="vessel", type="string", length=255, nullable=true)
     */
    private $vessel;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;

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
     * @ORM\Column(name="medicaltest", type="string", length=255, nullable=true)
     */
    private $medicaltest;

    /**
     * @var string
     *
     * @ORM\Column(name="medicaldocumenttype", type="string", length=255, nullable=true)
     */
    private $medicaldocumenttype;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="medicalissuedate", type="date", nullable=true)
     */
    private $medicalissuedate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="medicalexpiredate", type="date", nullable=true)
     */
    private $medicalexpiredate;
	
	/**
     * @var string
     *
     * @ORM\Column(name="medicaltype", type="string", length=255, nullable=true)
     */
    private $medicaltype;

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
     * @var string
     *
     * @ORM\Column(name="photopath", type="string", length=255, nullable=true)
     */
    private $photopath;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="ogukcheck", type="boolean", nullable=true)
     */
    private $ogukcheck;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="stcwcheck", type="boolean", nullable=true)
     */
    private $stcwcheck;
		
	/**
     * @var boolean
     *
     * @ORM\Column(name="petrcheck", type="boolean", nullable=true)
     */
    private $petrcheck;
		
	/**
     * @var boolean
     *
     * @ORM\Column(name="ogukpmucheck", type="boolean", nullable=true)
     */
    private $ogukpmucheck;
		
	/**
     * @var boolean
     *
     * @ORM\Column(name="norwegian", type="boolean", nullable=true)
     */
    private $norwegian;	
			
	/**
     * @var boolean
     *
     * @ORM\Column(name="hepatitisa", type="boolean", nullable=true)
     */
    private $hepatitisa;	
			
	/**
     * @var boolean
     *
     * @ORM\Column(name="hepatitisb", type="boolean", nullable=true)
     */
    private $hepatitisb;	
			
	/**
     * @var boolean
     *
     * @ORM\Column(name="twinrix", type="boolean", nullable=true)
     */
    private $twinrix;	
			
	/**
     * @var boolean
     *
     * @ORM\Column(name="dtp", type="boolean", nullable=true)
     */
    private $dtp;	
			
	/**
     * @var boolean
     *
     * @ORM\Column(name="po", type="boolean", nullable=true)
     */
    private $po;	
			
	/**
     * @var boolean
     *
     * @ORM\Column(name="typhoid", type="boolean", nullable=true)
     */
    private $typhoid;	
			
	/**
     * @var boolean
     *
     * @ORM\Column(name="yf", type="boolean", nullable=true)
     */
    private $yf;	
	
	
	/**
     * @ORM\OneToMany(targetEntity="experience", mappedBy="fromid", cascade={"persist"})
	 * @ORM\OrderBy({"startdate" = "DESC"})
     */
	protected $experience;
	


	/**
     * @ORM\OneToMany(targetEntity="mobrecord", mappedBy="fromid")
	 * @ORM\OrderBy({"startdate" = "DESC"})
     */
	protected $mob;
	
	
	/**
     * @ORM\OneToMany(targetEntity="certificate", mappedBy="fromid", cascade={"persist"})
	 * @ORM\OrderBy({"name" = "ASC"})
     */
	protected $certificate;
	

	
    public function __construct()
    {
        $this->experience = new ArrayCollection();
		$this->mob = new ArrayCollection();
		$this->certificate = new ArrayCollection();
		$this->craft = 'N/A';
		$this->company = 'N/A';
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
     * Set contractno
     *
     * @param integer $contractno
     * @return crewinfo
     */
    public function setContractno($contractno)
    {
        $this->contractno = $contractno;
    
        return $this;
    }

    /**
     * Get contractno
     *
     * @return integer 
     */
    public function getContractno()
    {
        return $this->contractno;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * Set status
     *
     * @param string $status
     * @return crewinfo
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
     * Set vessel
     *
     * @param string $vessel
     * @return crewinfo
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
     * Set company
     *
     * @param string $company
     * @return crewinfo
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
     * Set passportno
     *
     * @param string $passportno
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * Set placeofbirth
     *
     * @param string $placeofbirth
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @param string $seamanexpiredate
     * @return crewinfo
     */
    public function setSeamanexpiredate($seamanexpiredate)
    {
        $this->seamanexpiredate = $seamanexpiredate;
    
        return $this;
    }

    /**
     * Get seamanexpiredate
     *
     * @return string 
     */
    public function getSeamanexpiredate()
    {
        return $this->seamanexpiredate;
    }

    /**
     * Set medicaltest
     *
     * @param string $medicaltest
     * @return crewinfo
     */
    public function setMedicaltest($medicaltest)
    {
        $this->medicaltest = $medicaltest;
    
        return $this;
    }

    /**
     * Get medicaltest
     *
     * @return string 
     */
    public function getMedicaltest()
    {
        return $this->medicaltest;
    }

    /**
     * Set medicaldocumenttype
     *
     * @param string $medicaldocumenttype
     * @return crewinfo
     */
    public function setMedicaldocumenttype($medicaldocumenttype)
    {
        $this->medicaldocumenttype = $medicaldocumenttype;
    
        return $this;
    }

    /**
     * Get medicaldocumenttype
     *
     * @return string 
     */
    public function getMedicaldocumenttype()
    {
        return $this->medicaldocumenttype;
    }

    /**
     * Set medicalissuedate
     *
     * @param \DateTime $medicalissuedate
     * @return crewinfo
     */
    public function setMedicalissuedate($medicalissuedate)
    {
        $this->medicalissuedate = $medicalissuedate;
    
        return $this;
    }

    /**
     * Get medicalissuedate
     *
     * @return \DateTime 
     */
    public function getMedicalissuedate()
    {
        return $this->medicalissuedate;
    }

    /**
     * Set medicalexpiredate
     *
     * @param \DateTime $medicalexpiredate
     * @return crewinfo
     */
    public function setMedicalexpiredate($medicalexpiredate)
    {
        $this->medicalexpiredate = $medicalexpiredate;
    
        return $this;
    }

    /**
     * Get medicalexpiredate
     *
     * @return \DateTime 
     */
    public function getMedicalexpiredate()
    {
        return $this->medicalexpiredate;
    }

    /**
     * Set mother
     *
     * @param string $mother
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * @return crewinfo
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
     * Set photopath
     *
     * @param string $photopath
     * @return crewinfo
     */
    public function setPhotopath($photopath)
    {
        $this->photopath = $photopath;
    
        return $this;
    }

    /**
     * Get photopath
     *
     * @return string 
     */
    public function getPhotopath()
    {
        return $this->photopath;
    }

    /**
     * Set medicaltype
     *
     * @param string $medicaltype
     * @return crewinfo
     */
    public function setMedicaltype($medicaltype)
    {
        $this->medicaltype = $medicaltype;
    
        return $this;
    }

    /**
     * Get medicaltype
     *
     * @return string 
     */
    public function getMedicaltype()
    {
        return $this->medicaltype;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return crewinfo
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
     * Add experience
     *
     * @param \Ly\HrmBundle\Entity\experience $experience
     * @return crewinfo
     */
    public function addExperience(\Ly\HrmBundle\Entity\experience $experience)
    {
        $this->experience[] = $experience;
    
        return $this;
    }

    /**
     * Remove experience
     *
     * @param \Ly\HrmBundle\Entity\experience $experience
     */
    public function removeExperience(\Ly\HrmBundle\Entity\experience $experience)
    {
        $this->experience->removeElement($experience);
    }

    /**
     * Get experience
     *
     * @return \Doctrine\Common\Collections\Collection 
	 * 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Add mob
     *
     * @param \Ly\HrmBundle\Entity\mobrecord $mob
     * @return crewinfo
     */
    public function addMob(\Ly\HrmBundle\Entity\mobrecord $mob)
    {
        $this->mob[] = $mob;
    
        return $this;
    }

    /**
     * Remove mob
     *
     * @param \Ly\HrmBundle\Entity\mobrecord $mob
     */
    public function removeMob(\Ly\HrmBundle\Entity\mobrecord $mob)
    {
        $this->mob->removeElement($mob);
    }

    /**
     * Get mob
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMob()
    {
        return $this->mob;
    }

    /**
     * Add certificate
     *
     * @param \Ly\HrmBundle\Entity\certificate $certificate
     * @return crewinfo
     */
    public function addCertificate(\Ly\HrmBundle\Entity\certificate $certificate)
    {
        $this->certificate[] = $certificate;
    
        return $this;
    }

    /**
     * Remove certificate
     *
     * @param \Ly\HrmBundle\Entity\certificate $certificate
     */
    public function removeCertificate(\Ly\HrmBundle\Entity\certificate $certificate)
    {
        $this->certificate->removeElement($certificate);
    }

    /**
     * Get certificate
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * Set ogukcheck
     *
     * @param boolean $ogukcheck
     * @return crewinfo
     */
    public function setOgukcheck($ogukcheck)
    {
        $this->ogukcheck = $ogukcheck;
    
        return $this;
    }

    /**
     * Get ogukcheck
     *
     * @return boolean 
     */
    public function getOgukcheck()
    {
        return $this->ogukcheck;
    }

    /**
     * Set stcwcheck
     *
     * @param boolean $stcwcheck
     * @return crewinfo
     */
    public function setStcwcheck($stcwcheck)
    {
        $this->stcwcheck = $stcwcheck;
    
        return $this;
    }

    /**
     * Get stcwcheck
     *
     * @return boolean 
     */
    public function getStcwcheck()
    {
        return $this->stcwcheck;
    }

    /**
     * Set petrcheck
     *
     * @param boolean $petrcheck
     * @return crewinfo
     */
    public function setPetrcheck($petrcheck)
    {
        $this->petrcheck = $petrcheck;
    
        return $this;
    }

    /**
     * Get petrcheck
     *
     * @return boolean 
     */
    public function getPetrcheck()
    {
        return $this->petrcheck;
    }

    /**
     * Set ogukpmucheck
     *
     * @param boolean $ogukpmucheck
     * @return crewinfo
     */
    public function setOgukpmucheck($ogukpmucheck)
    {
        $this->ogukpmucheck = $ogukpmucheck;
    
        return $this;
    }

    /**
     * Get ogukpmucheck
     *
     * @return boolean 
     */
    public function getOgukpmucheck()
    {
        return $this->ogukpmucheck;
    }

    /**
     * Set norwegian
     *
     * @param boolean $norwegian
     * @return crewinfo
     */
    public function setNorwegian($norwegian)
    {
        $this->norwegian = $norwegian;
    
        return $this;
    }

    /**
     * Get norwegian
     *
     * @return boolean 
     */
    public function getNorwegian()
    {
        return $this->norwegian;
    }

    /**
     * Set hepatitisa
     *
     * @param boolean $hepatitisa
     * @return crewinfo
     */
    public function setHepatitisa($hepatitisa)
    {
        $this->hepatitisa = $hepatitisa;
    
        return $this;
    }

    /**
     * Get hepatitisa
     *
     * @return boolean 
     */
    public function getHepatitisa()
    {
        return $this->hepatitisa;
    }

    /**
     * Set hepatitisb
     *
     * @param boolean $hepatitisb
     * @return crewinfo
     */
    public function setHepatitisb($hepatitisb)
    {
        $this->hepatitisb = $hepatitisb;
    
        return $this;
    }

    /**
     * Get hepatitisb
     *
     * @return boolean 
     */
    public function getHepatitisb()
    {
        return $this->hepatitisb;
    }

    /**
     * Set twinrix
     *
     * @param boolean $twinrix
     * @return crewinfo
     */
    public function setTwinrix($twinrix)
    {
        $this->twinrix = $twinrix;
    
        return $this;
    }

    /**
     * Get twinrix
     *
     * @return boolean 
     */
    public function getTwinrix()
    {
        return $this->twinrix;
    }

    /**
     * Set dtp
     *
     * @param boolean $dtp
     * @return crewinfo
     */
    public function setDtp($dtp)
    {
        $this->dtp = $dtp;
    
        return $this;
    }

    /**
     * Get dtp
     *
     * @return boolean 
     */
    public function getDtp()
    {
        return $this->dtp;
    }

    /**
     * Set po
     *
     * @param boolean $po
     * @return crewinfo
     */
    public function setPo($po)
    {
        $this->po = $po;
    
        return $this;
    }

    /**
     * Get po
     *
     * @return boolean 
     */
    public function getPo()
    {
        return $this->po;
    }

    /**
     * Set typhoid
     *
     * @param boolean $typhoid
     * @return crewinfo
     */
    public function setTyphoid($typhoid)
    {
        $this->typhoid = $typhoid;
    
        return $this;
    }

    /**
     * Get typhoid
     *
     * @return boolean 
     */
    public function getTyphoid()
    {
        return $this->typhoid;
    }

    /**
     * Set yf
     *
     * @param boolean $yf
     * @return crewinfo
     */
    public function setYf($yf)
    {
        $this->yf = $yf;
    
        return $this;
    }

    /**
     * Get yf
     *
     * @return boolean 
     */
    public function getYf()
    {
        return $this->yf;
    }
}