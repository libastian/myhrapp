<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regions
 *
 * @ORM\Table(name="regions", uniqueConstraints={@ORM\UniqueConstraint(name="sss", columns={"REGION_NAME"})})
 * @ORM\Entity
 */
class Regions
{
    /**
     * @var string
     *
     * @ORM\Column(name="REGION_ID", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $regionId;

    /**
     * @var string
     *
     * @ORM\Column(name="REGION_NAME", type="string", length=25, nullable=true)
     */
    private $regionName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Countries", mappedBy="region")
     */
    private $countries;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->countries = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set regionName
     *
     * @param string $regionName
     *
     * @return Regions
     */
    public function setRegionName($regionName)
    {
        $this->regionName = $regionName;

        return $this;
    }

    /**
     * Get regionName
     *
     * @return string
     */
    public function getRegionName()
    {
        return $this->regionName;
    }

    /**
     * Add country
     *
     * @param \ApiBundle\Entity\Countries $country
     *
     * @return Regions
     */
    public function addCountry(\ApiBundle\Entity\Countries $country)
    {
        $this->countries[] = $country;

        return $this;
    }

    /**
     * Remove country
     *
     * @param \ApiBundle\Entity\Countries $country
     */
    public function removeCountry(\ApiBundle\Entity\Countries $country)
    {
        $this->countries->removeElement($country);
    }

    /**
     * Get countries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCountries()
    {
        return $this->countries;
    }
}
