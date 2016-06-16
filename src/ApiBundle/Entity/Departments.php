<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

/**
 * Departments
 *
 * @ORM\Table(name="departments", indexes={@ORM\Index(name="DEPT_MGR_FK", columns={"MANAGER_ID"}), @ORM\Index(name="DEPT_LOCATION_IX", columns={"LOCATION_ID"})})
 * @ORM\Entity
 */
class Departments
{
    /**
     * @var string
     *
     * @ORM\Column(name="DEPARTMENT_ID", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Exclude
     */
    private $departmentId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="DEPARTMENT_NAME", type="string", length=30, nullable=false)
     */
    private $departmentName;

    /**
     * @var string
     * @Exclude
     * @ORM\Column(name="MANAGER_ID", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $managerId;

    /**
     * @var string
     * @Exclude
     * @ORM\Column(name="LOCATION_ID", type="decimal", precision=4, scale=0, nullable=true)
     */
    private $locationId;


    /**
     * @Exclude
     * @ORM\ManyToOne(targetEntity="Locations", inversedBy="departments")
     * @ORM\JoinColumn(name="LOCATION_ID", referencedColumnName="LOCATION_ID")
     */
    private $location;


    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Employees", mappedBy="department")
     */
    private $employees;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
    }



    /**
     * Get departmentId
     *
     *
     * @return string
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * Set departmentName
     *
     * @param string $departmentName
     *
     * @return Departments
     */
    public function setDepartmentName($departmentName)
    {
        $this->departmentName = $departmentName;

        return $this;
    }

    /**
     * Get departmentName
     *
     * @return string
     */
    public function getDepartmentName()
    {
        return $this->departmentName;
    }

    /**
     * Set managerId
     *
     * @param string $managerId
     *
     * @return Departments
     */
    public function setManagerId($managerId)
    {
        $this->managerId = $managerId;

        return $this;
    }

    /**
     * Get managerId
     *
     * @return string
     */
    public function getManagerId()
    {
        return $this->managerId;
    }

    /**
     * Set locationId
     *
     * @param string $locationId
     *
     * @return Departments
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;

        return $this;
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
     * Set location
     *
     * @param \ApiBundle\Entity\Locations $location
     *
     * @return Departments
     */
    public function setLocation(\ApiBundle\Entity\Locations $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \ApiBundle\Entity\Locations
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Add employee
     *
     * @param \ApiBundle\Entity\Employees $employee
     *
     * @return Departments
     */
    public function addEmployee(\ApiBundle\Entity\Employees $employee)
    {
        $this->employees[] = $employee;

        return $this;
    }

    /**
     * Remove employee
     *
     * @param \ApiBundle\Entity\Employees $employee
     */
    public function removeEmployee(\ApiBundle\Entity\Employees $employee)
    {
        $this->employees->removeElement($employee);
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmployees()
    {
        return $this->employees;
    }


}
