<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 18/10/2017
 * Time: 15:50
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Membres;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class MembresController extends Controller
{

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/membres")
     */
    public function postMembreAction(Request $request){

        $membre = new Membres();
        $encoder = $this->get('security.password_encoder');
        $encoded = $encoder->encodePassword($membre, $membre->getPlainPassword());
        $membre->setPassword($encoded);

        $em = $this->getDoctrine()->getManager();;
        $em->persist($membre);
        $em->flush();

        return $membre;
    }

}