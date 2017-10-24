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

class DeclinaisonTailleController extends Controller
{

    /**
     * @Get("/produitsTaille/{id}")
     */
    public function getProduitsByTaillesAction($id){
        $produitList = $this->getDoctrine()->getRepository('AppBundle:DeclinaisonTaille')
            ->findBy(
                array('taille' => $id)
            );

        $formatted = [];
        foreach ($produitList as $produit) {
            $formatted[] = [
//                'id' => $produit->getId(),
//                'taille' => $produit->getTaille()->getTaille(),
//                'produit' => $produit->getProduit()->getId(),
                'libelle'=>$produit->getProduit()->getLibelle(),
                'famille'=>$produit->getProduit()->getFamille()->getFamille(),
                'sexe'=>$produit->getProduit()->getFamille()->getSexe(),
                'fournisseur'=>$produit->getProduit()->getFournisseur()->getNomMarque(),
                'prix'=>$produit->getProduit()->getPrix(),
                'image'=>$produit->getProduit()->getImage(),
                'description'=>$produit->getProduit()->getDescription()
            ];
        }
        return new JsonResponse($formatted);
    }

}