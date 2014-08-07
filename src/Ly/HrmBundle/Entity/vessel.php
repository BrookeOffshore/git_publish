<?php

namespace Ly\HrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * vessel
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class vessel
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
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="vessel", type="text")
     */
    private $vessel;


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
     * @return vessel
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
     * @return vessel
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
}
