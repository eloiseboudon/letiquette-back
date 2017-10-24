<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 23/10/2017
 * Time: 17:01
 */

namespace AppBundle\Controller;
use AppBundle\Entity\TailleType;
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



class TailleTypeController extends Controller
{

    /**
     * @Get("/tailleType")
     */
    public function getAllTaillesTypeAction(){
        $tailletypeList = $this->getDoctrine()->getRepository('AppBundle:TailleType')->findAll();
        $formatted = [];
        foreach ($tailletypeList as $tailletype) {
            $formatted[] = [
                'id' => $tailletype->getId(),
                'familleGlobal' => $tailletype->getFamilleGlobal()->getFamilleGlobal(),
                'taille' => $tailletype->getTaille()->getTaille()
            ];
        }
        return new JsonResponse($formatted);
    }

    /**
     * @Get("/tailleType/{id}")
     */
    public function getTaillesTypeByFamilleAction($id){
        $tailletypeList = $this->getDoctrine()->getRepository('AppBundle:TailleType')
            ->findBy(
                array('familleGlobal' => $id)
            );

        $formatted = [];
        foreach ($tailletypeList as $tailletype) {
            $formatted[] = [
                'id' => $tailletype->getId(),
                'familleGlobal' => $tailletype->getFamilleGlobal()->getFamilleGlobal(),
                'taille' => $tailletype->getTaille()->getTaille()
            ];
        }
        return new JsonResponse($formatted);
    }

}