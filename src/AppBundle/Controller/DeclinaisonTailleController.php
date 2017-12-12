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
     * @Get("/produitsTaille/produit/{id}")
     */
    public function getTaillesByProduitAction($id){
        $produitList = $this->getDoctrine()->getRepository('AppBundle:DeclinaisonTaille')
            ->findBy(
                array('produit' => $id)
            );

        $formatted = [];
        foreach ($produitList as $produit) {
            $formatted[] = [
                'taille' => $produit->getTaille()->getTaille(),
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




    /**
     * @Get("/produitsTaille/{id}")
     */
    public function getProduitsByTailleAction($id){
        $produitList = $this->getDoctrine()->getRepository('AppBundle:DeclinaisonTaille')
            ->findBy(
                array('taille' => $id)
            );

        $formatted = [];
        foreach ($produitList as $produit) {
            $formatted[] = [
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

    /**
     * @Get("/produitsTailleFamille/{idTaille}/{idFamille}")
     */
    public function getProduitsByTailleFamilleAction($idTaille, $idFamille){

        $produitList = $this->getDoctrine()->getRepository('AppBundle:DeclinaisonTaille')
            ->findProduitsByTaille_Famille($idTaille, $idFamille);

        $formatted = [];
        foreach ($produitList as $produit) {
            $formatted[] = [
                'id'=>$produit->getProduit()->getId(),
                'taille' =>$produit->getTaille()->getTaille(),
                'libelle'=>$produit->getProduit()->getLibelle(),
                'famille'=>$produit->getProduit()->getFamille()->getFamille(),
                'familleID'=>$produit->getProduit()->getFamille()->getId(),
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