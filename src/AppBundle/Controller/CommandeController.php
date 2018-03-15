<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 13/03/2018
 * Time: 22:05
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializationContext;

class CommandeController extends Controller
{

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/commande/creer")
     */
    public function creerCommandeAction(Request $request)
    {
        $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')->find($request->get('membre'));
        $panier = $this->getDoctrine()->getRepository('AppBundle:Panier')->find($request->get('panier'));

        if (empty($membre)) {
            return new JsonResponse(['message' => 'Membre not found'], Response::HTTP_NOT_FOUND);
        }

        if (empty($panier)) {
            return new JsonResponse(['message' => 'Panier not found'], Response::HTTP_NOT_FOUND);
        }

        $commande = new Commande();
        $commande->setMembre($membre);
        $commande->setPanier($panier);
        $commande->setDate(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();;
        $em->persist($commande);
        $em->flush();

        return $commande;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/commande/ipn")
     */
    public function IpnAction(Request $request){
        return new JsonResponse($request->getContent());
    }


    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Put("/commande/livraison")
     */
    public function updateLivraisonAction(Request $request)
    {
        $adresse = $this->getDoctrine()->getRepository('AppBundle:Adresse')->find($request->get('livraison'));

        $commande = $this->getDoctrine()->getRepository('AppBundle:Commande')->find($request->get('commande'));

        if (empty($adresse)) {
            return new JsonResponse(['message' => 'Adresse not found'], Response::HTTP_NOT_FOUND);
        }

        if (empty($commande)) {
            return new JsonResponse(['message' => 'Commande not found'], Response::HTTP_NOT_FOUND);
        }

        $commande->setLivraison($adresse);

        $em = $this->getDoctrine()->getManager();;
        $em->merge($commande);
        $em->flush();

        return $commande;
    }



    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Put("/commande/facturation")
     */
    public function updateFacturationAction(Request $request)
    {
        $adresse = $this->getDoctrine()->getRepository('AppBundle:Adresse')->find($request->get('facturation'));

        $commande = $this->getDoctrine()->getRepository('AppBundle:Commande')->find($request->get('commande'));

        if (empty($adresse)) {
            return new JsonResponse(['message' => 'Adresse not found'], Response::HTTP_NOT_FOUND);
        }

        if (empty($commande)) {
            return new JsonResponse(['message' => 'Commande not found'], Response::HTTP_NOT_FOUND);
        }

        $commande->setFacturation($adresse);

        $em = $this->getDoctrine()->getManager();;
        $em->merge($commande);
        $em->flush();

        return $commande;
    }






}