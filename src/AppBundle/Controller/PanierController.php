<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 12/01/2018
 * Time: 16:48
 */

namespace AppBundle\Controller;

use AppBundle\Entity\DetailPanier;
use AppBundle\Entity\Membres;
use AppBundle\Entity\Panier;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class PanierController extends Controller
{
    /**
     *
     * @Get("/panier/{id}")
     */
    public function getPanierAction($id)
    {
        $panier = $this->getDoctrine()->getRepository('AppBundle:DetailPanier')->find($id);


        $data = $this->get('jms_serializer')
            ->serialize($panier, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/panier")
     */
    public function creerPanierAction(Request $request)
    {
        $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')->find($request->get('idMembre'));

        if (empty($membre)) {
            return new JsonResponse(['message' => 'Membre not found'], Response::HTTP_NOT_FOUND);
        }
        $panier = new Panier();

        $panier->setDate(new \DateTime('now'));
        $panier->setMembre($membre);


        $em = $this->getDoctrine()->getManager();;
        $em->persist($panier);
        $em->flush();

        return $panier;
    }


    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/panier/ajout")
     */
    public function ajouterProduitAction(Request $request)
    {

        $panier = $this->getDoctrine()->getRepository('AppBundle:Panier')->find($request->get('idPanier'));
        $produit = $this->getDoctrine()->getRepository('AppBundle:Produits')->find($request->get('idProduit'));


        if (empty($panier)) {
            return new JsonResponse(['message' => 'Panier not found'], Response::HTTP_NOT_FOUND);
        }

        if (empty($produit)) {
            return new JsonResponse(['message' => 'Produit not found'], Response::HTTP_NOT_FOUND);
        }


        $detailPanier = new DetailPanier();
        $detailPanier->setPanier($panier);
        $detailPanier->setProduit($produit);
        $detailPanier->setQuantite(1);

        $em = $this->getDoctrine()->getManager();;
        $em->persist($detailPanier);
        $em->flush();

        return $detailPanier;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Put("/panier/modifier")
     */
    public function modifierPanierAction(Request $request)
    {

        $detailPanier = $this->getDoctrine()->getRepository('AppBundle:DetailPanier')->findOneBy(['panier' => $request->get('idPanier'),
            'produit' => $request->get('idProduit')]);


        if (empty($detailPanier)) {
            return new JsonResponse(['message' => 'Panier not found'], Response::HTTP_NOT_FOUND);
        }


        $detailPanier->setQuantite($detailPanier->getQuantite() + 1);

        $em = $this->getDoctrine()->getManager();;
        $em->merge($detailPanier);
        $em->flush();

        return $detailPanier;
    }


    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/panier/supprimerProduit")
     */
    public function supprimerProduitAction(Request $request)
    {

        $detailPanier = $this->getDoctrine()->getRepository('AppBundle:DetailPanier')->findOneBy(['panier' => $request->get('idPanier'),
            'produit' => $request->get('idProduit')]);


        if (empty($detailPanier)) {
            return new JsonResponse(['message' => 'Panier not found'], Response::HTTP_NOT_FOUND);
        }


        $detailPanier->setQuantite($detailPanier->getQuantite() + 1);

        $em = $this->getDoctrine()->getManager();
        $em->remove($detailPanier);
        $em->flush();


        return new JsonResponse(['message' => 'Panier vidé']);
    }

}