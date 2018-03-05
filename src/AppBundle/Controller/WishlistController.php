<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 05/03/2018
 * Time: 08:33
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Wishlist;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
class WishlistController extends Controller
{

    /**
     *
     * @Get("/wishlist")
     */
    public function getWishlistAction()
    {
        $wishlist = $this->getDoctrine()->getRepository('AppBundle:Wishlist')->findAll();


        $data = $this->get('jms_serializer')
            ->serialize($wishlist, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/wishlist/ajout")
     */

    public function ajouterProduitWishlistAction(Request $request)
    {
        $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')->find($request->get('idMembre'));

        $produit = $this->getDoctrine()->getRepository('AppBundle:Produits')->find($request->get('idProduit'));

        if (empty($membre)) {
            return new JsonResponse(['message' => 'Membre not found'], Response::HTTP_NOT_FOUND);
        }

        if (empty($produit)) {
            return new JsonResponse(['message' => 'Produit not found'], Response::HTTP_NOT_FOUND);
        }

        $wishlist = new Wishlist();
        $wishlist->setMembre($membre);
        $wishlist->setProduit($produit);

        $em = $this->getDoctrine()->getManager();;
        $em->persist($wishlist);
        $em->flush();

        return $wishlist;

    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/wishlist/supprimerProduit/{id}")
     */
    public function supprimerProduitWishListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $wishlist = $em->getRepository('AppBundle:Wishlist')->find($request->get('id'));
        $em->remove($wishlist);
        $em->flush();

        return new JsonResponse(['message' => 'Produit retiré de la wishlsit']);
    }


}