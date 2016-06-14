<?php
/**
 * Created by PhpStorm.
 * User: fran
 * Date: 14/06/16
 * Time: 15:20
 */

namespace ApiBundle\Repository;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

/*
*
*/


/**
 *
 * 
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\DepartmentsRepository")
 */
class DepartmentsRepository extends EntityRepository
{

    /**
     *  Query:
     *
     *  SELECT d.DEPARTMENT_NAME, l.CITY, e.FIRST_NAME, e.LAST_NAME
     *  FROM departments as d
     *  INNER JOIN locations as l ON l.LOCATION_ID = d.LOCATION_ID
     *  INNER JOIN employees as e ON e.DEPARTMENT_ID = d.DEPARTMENT_ID
     *  WHERE l.COUNTRY_ID = 'US'
     *  ORDER BY e.SALARY DESC
     */
    public function afindByCountryOrderedBySalaryAvg($countryId)
    {
        return $this->getEntityManager()->createQueryBuilder('d')
            ->setParameter('contryId', $id)
            ->innerJoin('d.location', 'l')
            ->where("l.locationId = d.locationId")
            ->innerJoin('d.employees', 'e')
            ->andWhere("e.departmentId = d.departmentId")
            ->andWhere("l.countryId = :contryId")
            ->orderBy('e.salary', 'desc')
            ->getQuery()->getResult();
    }
}

