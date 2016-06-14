<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jobs
 *
 * @ORM\Table(name="jobs")
 * @ORM\Entity
 */
class Jobs
{
    /**
     * @var string
     *
     * @ORM\Column(name="JOB_ID", type="string", length=10)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $jobId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="JOB_TITLE", type="string", length=35, nullable=false)
     */
    private $jobTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="MIN_SALARY", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $minSalary;

    /**
     * @var string
     *
     * @ORM\Column(name="MAX_SALARY", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $maxSalary;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jobHistories = new \Doctrine\Common\Collections\ArrayCollection();

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
     * Set jobTitle
     *
     * @param string $jobTitle
     *
     * @return Jobs
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set minSalary
     *
     * @param string $minSalary
     *
     * @return Jobs
     */
    public function setMinSalary($minSalary)
    {
        $this->minSalary = $minSalary;

        return $this;
    }

    /**
     * Get minSalary
     *
     * @return string
     */
    public function getMinSalary()
    {
        return $this->minSalary;
    }

    /**
     * Set maxSalary
     *
     * @param string $maxSalary
     *
     * @return Jobs
     */
    public function setMaxSalary($maxSalary)
    {
        $this->maxSalary = $maxSalary;

        return $this;
    }

    /**
     * Get maxSalary
     *
     * @return string
     */
    public function getMaxSalary()
    {
        return $this->maxSalary;
    }

    /**
     * Add jobHistory
     *
     * @param \ApiBundle\Entity\JobHistory $jobHistory
     *
     * @return Jobs
     */
    public function addJobHistory(\ApiBundle\Entity\JobHistory $jobHistory)
    {
        $this->jobHistories[] = $jobHistory;

        return $this;
    }

    /**
     * Remove jobHistory
     *
     * @param \ApiBundle\Entity\JobHistory $jobHistory
     */
    public function removeJobHistory(\ApiBundle\Entity\JobHistory $jobHistory)
    {
        $this->jobHistories->removeElement($jobHistory);
    }

    /**
     * Get jobHistories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobHistories()
    {
        return $this->jobHistories;
    }
}
