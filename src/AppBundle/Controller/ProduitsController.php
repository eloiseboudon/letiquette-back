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
     * @Get("/produitsSexe/{sexe}")
     */
    public function getProduitsBySexeAction($sexe){
        $produitList = $this->getDoctrine()->getManager()->getRepository('AppBundle:Produits')->findProduitBySexe($sexe);
        if (empty($produitList)) {
            return new JsonResponse(['message' => 'Aucun résultat trouvé'], Response::HTTP_NOT_FOUND);
        }

        $formatted = [];
        foreach ($produitList as $produit){
            $formatted[]= array(
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
//
//    /**
//     * @Get("/produitsFamille/{famille}")
//     */
//    public function getProduitsByFamilleAction($famille){
//        $produitList = $this->getDoctrine()->getManager()->getRepository('AppBundle:Produits')->findProduitByFamille($famille);
//        if (empty($produitList)) {
//            return new JsonResponse(['message' => 'Aucun résultat trouvé '.$famille.''], Response::HTTP_NOT_FOUND);
//        }
//
//        $formatted = [];
//        foreach ($produitList as $produit){
//            $formatted[]= array(
//                'libelle'=>$produit->getLibelle(),
//                'famille'=>$produit->getFamille()->getFamille(),
//                'sexe'=>$produit->getFamille()->getSexe(),
//                'fournisseur'=>$produit->getFournisseur()->getNomMarque(),
//                'prix'=>$produit->getPrix(),
//                'image'=>$produit->getImage(),
//                'description'=>$produit->getDescription()
//            );
//        }
//
//        return new JsonResponse($formatted);
//    }




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

}