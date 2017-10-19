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
        $formatted = [];

        foreach ($produitList as $produit){
            $formatted[]= array(
                'libelle'=>$produit->getLibelle(),
                'famille'=>$produit->getFamille(),
                'fournisseur'=>$produit->getFournisseur()->getNomMarque(),
                'prix'=>$produit->getPrix(),
                'image'=>$produit->getImage(),
                'description'=>$produit->getDescription()
            );
        }

        return new JsonResponse($formatted);
    }


}