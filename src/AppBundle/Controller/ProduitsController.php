<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 19/10/2017
 * Time: 10:25
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Produits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializationContext;


class ProduitsController extends Controller
{
    /**
     *
     * @Get("/produits")
     */
    public function getProduitsAction()
    {
        $produits = $this->getDoctrine()->getRepository('AppBundle:Produits')->findAll();


        $data = $this->get('jms_serializer')
            ->serialize($produits, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     *
     * @Get("/produits/{id}")
     */
    public
    function getProduitsByIdAction($id)
    {
        $produits = $this->getDoctrine()->getRepository('AppBundle:Produits')->find($id);
        $data = $this->get('jms_serializer')->serialize($produits, 'json',
            SerializationContext::create()->setGroups(array('produits'))->setSerializeNull(true));


        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/produits/famille/{id}")
     */
    public
    function getProduitsFamilleAction($id)
    {
        $produits = $this->getDoctrine()->getManager()->getRepository('AppBundle:Produits')->findProduitsByFamille($id);
        $data = $this->get('jms_serializer')->serialize($produits, 'json',
            SerializationContext::create()->setGroups(array('produits'))->setSerializeNull(true));


        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/produits/taille/{arrayTaille}")
     */
    public
    function getProduitsFiltreTailleAction($arrayTaille)
    {
        $produits = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:DeclinaisonTaille')
            ->findProduitsFiltreTaille($arrayTaille);

        $data = $this->get('jms_serializer')->serialize($produits, 'json',
            SerializationContext::create()->setGroups(array('produits'))->setSerializeNull(true));


        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/femmes")
     */
    public
    function getProduitsFemmesAction()
    {
        $produits = $this->getDoctrine()->getRepository('AppBundle:Produits')->findProduitBySexe("F");
        $data = $this->get('jms_serializer')->serialize($produits, 'json',
            SerializationContext::create()->setGroups(array('produits'))->setSerializeNull(true));


        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/femmes/taille/{arrayTaille}")
     */
    public
    function getProduitsFiltreSexeTailleAction($arrayTaille)
    {
        $produits = $this->getDoctrine()->getManager()->getRepository('AppBundle:DeclinaisonTaille')->findProduitsFiltreTailleSexe($arrayTaille, "F");

        $data = $this->get('jms_serializer')->serialize($produits, 'json',
            SerializationContext::create()->setGroups(array('produits'))->setSerializeNull(true));


        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/tout")
     */
    public
    function getEverythingAction()
    {
        $produits = $this->getDoctrine()->getManager()->getRepository('AppBundle:Produits')->findEverything();

        $data = $this->get('jms_serializer')->serialize($produits, 'json',
            SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/tout/femmes")
     */
    public
    function getEverythingFemmesAction()
    {
        $produits = $this->getDoctrine()->getManager()->getRepository('AppBundle:Produits')->findEverythingSexe("F");

        $data = $this->get('jms_serializer')->serialize($produits, 'json',
            SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}