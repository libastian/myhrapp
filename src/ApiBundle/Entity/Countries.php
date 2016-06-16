<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

/**
 * Countries
 *
 * @ORM\Table(name="countries", indexes={@ORM\Index(name="COUNTR_REG_FK", columns={"REGION_ID"})})
 * @ORM\Entity
 */
class Countries
{
    /**
     * @var string
     *
     * @ORM\Column(name="COUNTRY_ID", type="string", length=2)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryId;

    /**
     * @var string
     *
     * @ORM\Column(name="COUNTRY_NAME", type="string", length=40, nullable=true)
     */
    private $countryName;

    /**
     * @var string
     *
     * @ORM\Column(name="REGION_ID", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $regionId;

    /**
     * @ORM\ManyToOne(targetEntity="Regions", inversedBy="countries")
     * @ORM\JoinColumn(name="REGION_ID", referencedColumnName="REGION_ID")
     * @Exclude
     */
    protected $region;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Locations", mappedBy="country")
     */
    private $locations;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->locations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set countryName
     *
     * @param string $countryName
     *
     * @return Countries
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;

        return $this;
    }

    /**
     * Get countryName
     *
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * Set regionId
     *
     * @param string $regionId
     *
     * @return Countries
     */
    public function setRegionId($regionId)
    {
        $this->regionId = $regionId;

        return $this;
    }

    /**
     * Get regionId
     *
     * @return string
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * Set region
     *
     * @param \ApiBundle\Entity\Regions $region
     *
     * @return Countries
     */
    public function setRegion(\ApiBundle\Entity\Regions $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \ApiBundle\Entity\Regions
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Add location
     *
     * @param \ApiBundle\Entity\Locations $location
     *
     * @return Countries
     */
    public function addLocation(\ApiBundle\Entity\Locations $location)
    {
        $this->locations[] = $location;

        return $this;
    }

    /**
     * Remove location
     *
     * @param \ApiBundle\Entity\Locations $location
     */
    public function removeLocation(\ApiBundle\Entity\Locations $location)
    {
        $this->locations->removeElement($location);
    }

    /**
     * Get locations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocations()
    {
        return $this->locations;
    }
}
