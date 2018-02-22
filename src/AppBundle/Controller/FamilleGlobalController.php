<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 24/10/2017
 * Time: 09:46
 */

namespace AppBundle\Controller;

use AppBundle\Entity\FamilleGlobal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializationContext;


class FamilleGlobalController extends Controller
{
    /**
     * @Get("/famillesGlobales")
     */
    public function getFamillesGlobalesAction()
    {
        $familles = $this->getDoctrine()->getRepository('AppBundle:FamilleGlobal')->findAll();

        $data = $this->get('jms_serializer')
            ->serialize($familles, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }




}