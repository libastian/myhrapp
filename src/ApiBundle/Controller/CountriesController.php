<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\DepartmentsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CountriesController
 * @Route("/api/v1")
 *
 */
class CountriesController extends Controller
{

    /**
     * @Get("/CONTRIES/{id}")
     */
    public function getContriesAction($id)
    {
        /*
            $sql = "
                SELECT d.DEPARTMENT_NAME, l.CITY, e.FIRST_NAME, e.LAST_NAME
                FROM departments as d
                INNER JOIN locations as l ON l.LOCATION_ID = d.LOCATION_ID
                INNER JOIN employees as e ON e.DEPARTMENT_ID = d.DEPARTMENT_ID
                WHERE l.COUNTRY_ID = 'US'
                ORDER BY e.SALARY DESC
        ";
         */

        /* @var $repo DepartmentsRepository*/
        $repo =  $this->getDoctrine()->getManager()->getRepository('ApiBundle:Departments');

        //$departments = $repo->

        $query = $repo->createQueryBuilder('d')
            ->setParameter('contryId', $id)
            ->innerJoin('d.location','l')
            ->where("l.locationId = d.locationId")
            ->innerJoin('d.employees','e')
            ->andWhere("e.departmentId = d.departmentId")
            ->andWhere("l.countryId = :contryId")
            ->orderBy('e.salary', 'desc')
            ->getQuery()->getResult();

        return $departments;


        // Falta poner  esto en el repositorio
        // Falta paginar los resultados
    }
}
