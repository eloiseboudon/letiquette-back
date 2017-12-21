<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 21/12/2017
 * Time: 11:18
 */

namespace AppBundle\Controller;



use AppBundle\Entity\DeclinaisonEthique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializationContext;

class DeclinaisonEthiqueController extends Controller
{
    /**
     * @Get("/ethique/produit/{id}")
     */
    public function getEthiqueByProduitAction($id)
    {
        $ethique = $this->getDoctrine()->getRepository('AppBundle:DeclinaisonEthique')
            ->findBy(
                array('produit' => $id)
            );


        $data = $this->get('jms_serializer')
            ->serialize($ethique, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}