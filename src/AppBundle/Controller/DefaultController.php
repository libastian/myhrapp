<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ApiController
 * @package AppBundle\Controller
 *
 * @Route("/api/v1")
 */
class ApiController extends Controller
{

    /**
     * @Get("/CONTRIES/{id}")
     */
    public function getContriesAction($id)
    {
        // replace this example code with whatever you need
     /*   return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));*/

        return array("dfdsf" => $id);
    }
}
