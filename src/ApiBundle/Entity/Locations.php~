<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

/**
 * Locations
 *
 * @ORM\Table(name="locations", indexes={@ORM\Index(name="LOC_CITY_IX", columns={"CITY"}), @ORM\Index(name="LOC_COUNTRY_IX", columns={"COUNTRY_ID"}), @ORM\Index(name="LOC_STATE_PROVINCE_IX", columns={"STATE_PROVINCE"})})
 * @ORM\Entity
 */
class Locations
{
    /**
     * @var string
     *
     * @ORM\Column(name="LOCATION_ID", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $locationId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="STREET_ADDRESS", type="string", length=40, nullable=true)
     */
    private $streetAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="POSTAL_CODE", type="string", length=12, nullable=true)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="CITY", type="string", length=30, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="STATE_PROVINCE", type="string", length=25, nullable=true)
     */
    private $stateProvince;

    /**
     * @var string
     *
     * @ORM\Column(name="COUNTRY_ID", type="string", length=2, nullable=true)
     */
    private $countryId;


    /**
     * @ORM\ManyToOne(targetEntity="Countries", inversedBy="locations")
     * @ORM\JoinColumn(name="COUNTRY_ID", referencedColumnName="COUNTRY_ID")
     * @Exclude
     */
    protected $country;


    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Departments", mappedBy="location")
     */
    private $departments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get locationId
     *
     * @return string
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Set streetAddress
     *
     * @param string $streetAddress
     *
     * @return Locations
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * Get streetAddress
     *
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return Locations
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Locations
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set stateProvince
     *
     * @param string $stateProvince
     *
     * @return Locations
     */
    public function setStateProvince($stateProvince)
    {
        $this->stateProvince = $stateProvince;

        return $this;
    }

    /**
     * Get stateProvince
     *
     * @return string
     */
    public function getStateProvince()
    {
        return $this->stateProvince;
    }

    /**
     * Set countryId
     *
     * @param string $countryId
     *
     * @return Locations
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * Get countryId
     *
     * @return string
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * Set country
     *
     * @param \ApiBundle\Entity\Countries $country
     *
     * @return Locations
     */
    public function setCountry(\ApiBundle\Entity\Countries $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \ApiBundle\Entity\Countries
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add department
     *
     * @param \ApiBundle\Entity\Departments $department
     *
     * @return Locations
     */
    public function addDepartment(\ApiBundle\Entity\Departments $department)
    {
        $this->departments[] = $department;

        return $this;
    }

    /**
     * Remove department
     *
     * @param \ApiBundle\Entity\Departments $department
     */
    public function removeDepartment(\ApiBundle\Entity\Departments $department)
    {
        $this->departments->removeElement($department);
    }

    /**
     * Get departments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartments()
    {
        return $this->departments;
    }
}
