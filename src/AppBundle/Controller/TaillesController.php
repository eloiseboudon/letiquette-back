<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 24/10/2017
 * Time: 09:57
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Tailles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class TaillesController extends Controller
{
    /**
     *
     * @Get("/taille")
     */
//    public function getVillesAction(){
//        $taillesList = $this->getDoctrine()->getRepository('AppBundle:Tailles')->findAll();
//        $formatted = [];
//        foreach ($taillesList as $taille){
//            $formatted[]=[
//                'id' => $taille->getId(),
//                'taille' => $taille->getTaille()
//            ];
//        }
//
//        return new JsonResponse($formatted);
//    }
}