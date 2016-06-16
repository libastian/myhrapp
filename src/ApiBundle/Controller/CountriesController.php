<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\DepartmentsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;

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

        /* @var $repo DepartmentsRepository*/
        $repo =  $this->getDoctrine()->getManager()->getRepository('ApiBundle:Departments');
        $query = $repo->createQueryBuilder('d')
            ->setParameter('contryId', $id)
            ->innerJoin('d.location','l')
            ->where("l.locationId = d.locationId")
            ->innerJoin('d.employees','e')
            ->andWhere("e.departmentId = d.departmentId")
            ->andWhere("l.countryId = :contryId")
            ->orderBy('e.salary', 'desc')
            ->getQuery()->getResult();

        //Paginamos los resultados;
        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        // Establecemos los valores del paginador
        $defaultMax = '10';
        if ($count = $request->get('limit')) {
            $pagerfanta->setMaxPerPage($count);
        } else {
            $pagerfanta->setMaxPerPage($defaultMax);
        }
        if ($page = $request->get('page')) {
            try {
                $pagerfanta->setCurrentPage($page);
            } catch (NotValidCurrentPageException $e) {
                throw new NotFoundHttpException();
            }
        }

        return $pagerfanta;
    }
}
