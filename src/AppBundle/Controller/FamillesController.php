<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 19/10/2017
 * Time: 10:46
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Familles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializationContext;


class FamillesController extends Controller
{
    /**
     * @Get("/familles")
     */
    public function getFamillesAction(){

        $familles= $this->getDoctrine()->getRepository('AppBundle:Familles')->findAll();


        $data = $this->get('jms_serializer')
            ->serialize($familles, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/familles/{sexe}")
     */
    public function getFamillesBySexeAction($sexe){
        $familles = $this->getDoctrine()->getRepository('AppBundle:Familles')
            ->findBy(
                array('sexe' => $sexe)
            );

        $data = $this->get('jms_serializer')
            ->serialize($familles, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/familles/{sexe}/{familleGlobal}")
     */
    public function getFamillesBySexeAndFamilleGlobalAction($sexe,$familleGlobal){
        $familles = $this->getDoctrine()->getRepository('AppBundle:Familles')
            ->findBy(
                array('sexe' => $sexe, 'familleGlobal' => $familleGlobal)
            );


        $data = $this->get('jms_serializer')
            ->serialize($familles, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/familles/globales/{familleGlobal}")
     */
    public function getFamillesByFamilleGlobalAction($familleGlobal){
        $familles = $this->getDoctrine()->getRepository('AppBundle:Familles')
            ->findBy(
                array('familleGlobal' => $familleGlobal)
            );


        $data = $this->get('jms_serializer')
            ->serialize($familles, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}