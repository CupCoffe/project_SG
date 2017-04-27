<?php

namespace CompBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * office
 *
 * @ORM\Table(name="office")
 * @ORM\Entity(repositoryClass="CompBundle\Repository\officeRepository")
 */
class office
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=100)
     */
    private $country;

    /**
     * Many office from One company.
     * @ORM\ManyToOne(targetEntity="company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

/**Return string from Office*/
public function __toString()
{
return $this->address;
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
     * Set address
     *
     * @param string $address
     * @return office
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get office
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return office
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set company
     *
     * @param \CompBundle\Entity\company $company
     * @return office
     */
    public function setCompany(\CompBundle\Entity\company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \CompBundle\Entity\company 
     */
    public function getCompany()
    {
        return $this->company;
    }
}
