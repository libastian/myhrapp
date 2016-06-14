<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

/**
 * Employees
 *
 * @ORM\Table(name="employees", uniqueConstraints={@ORM\UniqueConstraint(name="EMP_EMAIL_UK", columns={"EMAIL"})}, indexes={@ORM\Index(name="EMP_DEPARTMENT_IX", columns={"DEPARTMENT_ID"}), @ORM\Index(name="EMP_JOB_IX", columns={"JOB_ID"}), @ORM\Index(name="EMP_MANAGER_IX", columns={"MANAGER_ID"}), @ORM\Index(name="EMP_NAME_IX", columns={"LAST_NAME", "FIRST_NAME"})})
 * @ORM\Entity
 */
class Employees
{
    /**
     * @var string
     *
     * @ORM\Column(name="EMPLOYEE_ID", type="decimal")
     * @ORM\Id
     * @Exclude
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $employeeId = '0';

    /**
     * @var string
     * @ORM\Column(name="FIRST_NAME", type="string", length=20, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(name="LAST_NAME", type="string", length=25, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     * @Exclude
     * @ORM\Column(name="EMAIL", type="string", length=25, nullable=false)
     */
    private $email;

    /**
     * @var string
     * @Exclude
     * @ORM\Column(name="PHONE_NUMBER", type="string", length=20, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var \DateTime
     * @Exclude
     * @ORM\Column(name="HIRE_DATE", type="date", nullable=false)
     */
    private $hireDate;

    /**
     * @var string
     * @Exclude
     * @ORM\Column(name="JOB_ID", type="string", length=10, nullable=false)
     */
    private $jobId;

    /**
     * @var string
     * @Exclude
     * @ORM\Column(name="SALARY", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $salary;

    /**
     * @var string
     * @Exclude
     * @ORM\Column(name="COMMISSION_PCT", type="decimal", precision=2, scale=2, nullable=true)
     */
    private $commissionPct;

    /**
     * @var string
     * @Exclude
     * @ORM\Column(name="MANAGER_ID", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $managerId;

    /**
     * @var string
     * @Exclude
     * @ORM\Column(name="DEPARTMENT_ID", type="decimal", precision=4, scale=0, nullable=true)
     */
    private $departmentId;

    /**
     * @ORM\ManyToOne(targetEntity="Departments", inversedBy="employees")
     * @ORM\JoinColumn(name="DEPARTMENT_ID", referencedColumnName="DEPARTMENT_ID")
     * @Exclude
     */
    protected $department;



    /**
     * Get employeeId
     *
     * @return string
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Employees
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Employees
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Employees
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
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Employees
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set hireDate
     *
     * @param \DateTime $hireDate
     *
     * @return Employees
     */
    public function setHireDate($hireDate)
    {
        $this->hireDate = $hireDate;

        return $this;
    }

    /**
     * Get hireDate
     *
     * @return \DateTime
     */
    public function getHireDate()
    {
        return $this->hireDate;
    }

    /**
     * Set jobId
     *
     * @param string $jobId
     *
     * @return Employees
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;

        return $this;
    }

    /**
     * Get jobId
     *
     * @return string
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * Set salary
     *
     * @param string $salary
     *
     * @return Employees
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return string
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set commissionPct
     *
     * @param string $commissionPct
     *
     * @return Employees
     */
    public function setCommissionPct($commissionPct)
    {
        $this->commissionPct = $commissionPct;

        return $this;
    }

    /**
     * Get commissionPct
     *
     * @return string
     */
    public function getCommissionPct()
    {
        return $this->commissionPct;
    }

    /**
     * Set managerId
     *
     * @param string $managerId
     *
     * @return Employees
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
     * Set departmentId
     *
     * @param string $departmentId
     *
     * @return Employees
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    /**
     * Get departmentId
     *
     * @return string
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * Set department
     *
     * @param \ApiBundle\Entity\Departments $department
     *
     * @return Employees
     */
    public function setDepartment(\ApiBundle\Entity\Departments $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return \ApiBundle\Entity\Departments
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set jobHistory
     *
     * @param \ApiBundle\Entity\JobHistory $jobHistory
     *
     * @return Employees
     */
    public function setJobHistory(\ApiBundle\Entity\JobHistory $jobHistory = null)
    {
        $this->jobHistory = $jobHistory;

        return $this;
    }

    /**
     * Get jobHistory
     *
     * @return \ApiBundle\Entity\JobHistory
     */
    public function getJobHistory()
    {
        return $this->jobHistory;
    }
}
