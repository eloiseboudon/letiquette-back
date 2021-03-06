<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 19/10/2017
 * Time: 10:46
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Fournisseurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class FournisseursController extends Controller
{

    /**
     * @Get("/fournisseurs")
     */
    public function getFournisseursAction(){
        $fournisseursList = $this->getDoctrine()->getRepository('AppBundle:Fournisseurs')->findAll();
        $formatted = [];

        foreach ($fournisseursList as $fournisseur){
            $formatted[]=[
                'id' => $fournisseur->getId(),
                'ville' => $fournisseur->getVille()->getVille(),
                'nom_marque' => $fournisseur->getNomMarque(),
                'nom_responsable' => $fournisseur->getNomResponsable(),
                'adMail' => $fournisseur->getAdMail(),
                'adresse' => $fournisseur->getAdresse(),
                'numTel' => $fournisseur->getNumTel(),
                'logo' => $fournisseur->getLogo()
            ];
        }

        return new JsonResponse($formatted);
    }




}