<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 18/10/2017
 * Time: 15:37
 */

namespace AppBundle\Controller;


use AppBundle\Entity\PointsEthique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use JMS\Serializer\SerializationContext;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept");

class PointsEthiqueController extends Controller
{
    /**
     *
     * @Get("/impactsethiques")
     */
    public function getImpactsEthiquesAction()
    {
        $impactsethiques = $this->getDoctrine()->getRepository('AppBundle:PointsEthique')->findAll();

        $data = $this->get('jms_serializer')
            ->serialize($impactsethiques, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


}