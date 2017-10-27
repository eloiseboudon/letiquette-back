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


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept");

class ProduitsController extends Controller
{
    /**
 *
 * @Get("/produits")
 */
    public function getProduitsAction(){
        $produitList = $this->getDoctrine()->getRepository('AppBundle:Produits')->findAll();
        if (empty($produitList)) {
            return new JsonResponse(['message' => 'Aucun résultat trouvé'], Response::HTTP_NOT_FOUND);
        }
        $formatted = [];

        foreach ($produitList as $produit){
            $formatted[]= array(
                'id'=>$produit->getId(),
                'libelle'=>$produit->getLibelle(),
                'famille'=>$produit->getFamille()->getFamille(),
                'sexe'=>$produit->getFamille()->getSexe(),
                'fournisseur'=>$produit->getFournisseur()->getNomMarque(),
                'prix'=>$produit->getPrix(),
                'image'=>$produit->getImage(),
                'description'=>$produit->getDescription()
            );
        }
        return new JsonResponse($formatted);
    }


    /**
     *
     * @Get("/produits/{id}")
     */
    public function getProduitsByIdAction($id){
        $produit = $this->getDoctrine()->getRepository('AppBundle:Produits')->find($id);
        if (empty($produit)) {
            return new JsonResponse(['message' => 'Aucun résultat trouvé'], Response::HTTP_NOT_FOUND);
        }
        $formatted = [];


        $formatted[]= array(
            'id'=>$produit->getId(),
            'libelle'=>$produit->getLibelle(),
            'famille'=>$produit->getFamille()->getFamille(),
            'sexe'=>$produit->getFamille()->getSexe(),
            'fournisseur'=>$produit->getFournisseur()->getNomMarque(),
            'prix'=>$produit->getPrix(),
            'image'=>$produit->getImage(),
            'description'=>$produit->getDescription()
        );

        return new JsonResponse($formatted);
    }
    


    /**
     * @Get("/produitsFemmes")
     */
    public function getProduitsFemmesAction(){
        $produitList = $this->getDoctrine()->getManager()->getRepository('AppBundle:Produits')->findProduitBySexe("F");
        if (empty($produitList)) {
            return new JsonResponse(['message' => 'Aucun résultat trouvé'], Response::HTTP_NOT_FOUND);
        }

        $formatted = [];
        foreach ($produitList as $produit){
            $formatted[]= array(
                'id'=>$produit->getId(),
                'libelle'=>$produit->getLibelle(),
                'famille'=>$produit->getFamille()->getFamille(),
//                'familleID'=>$produit->getFamille()->getId(),
                'sexe'=>$produit->getFamille()->getSexe(),
                'fournisseur'=>$produit->getFournisseur()->getNomMarque(),
                'prix'=>$produit->getPrix(),
                'image'=>$produit->getImage(),
                'description'=>$produit->getDescription()
            );
        }

        return new JsonResponse($formatted);
    }


    /**
     * @Get("/produitsFamille/{id}")
     */
    public function getProduitsFamilleAction($id){
        $produitList = $this->getDoctrine()->getManager()->getRepository('AppBundle:Produits')->findProduitsByFamille($id);
        if (empty($produitList)) {
            return new JsonResponse(['message' => 'Aucun résultat trouvé'], Response::HTTP_NOT_FOUND);
        }

        $formatted = [];
        foreach ($produitList as $produit){
            $formatted[]= array(
                'id'=>$produit->getId(),
                'libelle'=>$produit->getLibelle(),
                'famille'=>$produit->getFamille()->getFamille(),
                'sexe'=>$produit->getFamille()->getSexe(),
                'fournisseur'=>$produit->getFournisseur()->getNomMarque(),
                'prix'=>$produit->getPrix(),
                'image'=>$produit->getImage(),
                'description'=>$produit->getDescription()
            );
        }
        return new JsonResponse($formatted);
    }


    /**
     * @Get("/produitsFiltres/{arrayTaille}")
     */
    public function getProduitsFiltresAction($arrayTaille){
        $produitList = $this->getDoctrine()->getManager()->getRepository('AppBundle:DeclinaisonTaille')->findProduitsFiltres($arrayTaille);

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