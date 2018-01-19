<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 24/10/2017
 * Time: 16:01
 */

namespace AppBundle\Controller;

use AppBundle\Entity\DeclinaisonTaille;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializationContext;

class DeclinaisonTailleController extends Controller
{

    /**
     * @Rest\Get("/tailles/produit/{id}")
     */
    public function getTaillesByProduitAction(Request $request)
    {
        $taille = $this->getDoctrine()->getRepository('AppBundle:DeclinaisonTaille')
            ->findBy(
                array('produit' => $request->get('id'))
            );

        $data = $this->get('jms_serializer')
            ->serialize($taille, 'json',
                SerializationContext::create()->setGroups(array('taille'))->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/tailles/{id}")
     */
    public function getProduitsByTailleAction($id)
    {
        $produit = $this->getDoctrine()->getRepository('AppBundle:DeclinaisonTaille')
            ->findBy(
                array('taille' => $id)
            );

        $data = $this->get('jms_serializer')
            ->serialize($produit, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Get("/tailles/{idTaille}/{idFamille}")
     */
    public function getProduitsByTailleFamilleAction($idTaille, $idFamille)
    {

        $produitList = $this->getDoctrine()->getRepository('AppBundle:DeclinaisonTaille')
            ->findProduitsByTaille_Famille($idTaille, $idFamille);

        $formatted = [];
        foreach ($produitList as $produit) {
            $formatted[] = array(
                'id' => $produit->getProduit()->getId(),
                'taille' => $produit->getTaille()->getTaille(),
                'libelle' => $produit->getProduit()->getLibelle(),
                'famille' => $produit->getProduit()->getFamille()->getFamille(),
                'sexe' => $produit->getProduit()->getFamille()->getSexe(),
                'fournisseur' => $produit->getProduit()->getFournisseur()->getNomMarque(),
                'prix' => $produit->getProduit()->getPrix(),
                'image' => $produit->getProduit()->getImage(),
                'description' => $produit->getProduit()->getDescription(),
                'couleur_hexa' => ($produit->getProduit()->getCouleur() != null ? $produit->getProduit()->getCouleur()->getCouleur() : null),
                'couleur' => ($produit->getProduit()->getCouleur() != null ? $produit->getProduit()->getCouleur()->getName() : null)

            );
        }
        return new JsonResponse($formatted);
    }


}