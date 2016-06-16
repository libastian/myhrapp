<?php

namespace ApiBundle\Controller;

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
    public function getContriesAction(Request $request, $id)
    {

        $repo =  $this->getDoctrine()->getManager()->getRepository('ApiBundle:Departments');
        $query = $repo->createQueryBuilder('d')
            ->select('d','e','l')
            ->addSelect('(SELECT avg(temp.salary) as tema FROM ApiBundle\Entity\Employees temp WHERE temp.departmentId = d.departmentId) as avgSalary')
            ->setParameter('contryId', $id)
            ->Join('d.location','l')
            ->Join('d.employees','e')
            ->Where("l.countryId = :contryId")
            ->groupBy('e.employeeId')
            ->orderBy('avgSalary','DESC')
            ->getQuery();


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1));
       
        return $pagination;
    }
}
