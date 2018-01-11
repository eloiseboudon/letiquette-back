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

        $ville = $this->getDoctrine()->getRepository('AppBundle:Villes')->find($request->get('idVille'));

        if (empty($ville)){
            return new JsonResponse(['message' => 'Ville not found'], Response::HTTP_NOT_FOUND);
        }

        $membre = new Membres();
        $encoder = $this->get('security.password_encoder');
        $encoded = $encoder->encodePassword($membre,$request->get('password'));
        $membre->setNom($request->get('nom'));
        $membre->setPrenom($request->get('prenom'));
        $membre->setLogin($request->get('login'));
        $membre->setAdresse($request->get('adresse'));
        $membre->setAdMail($request->get('email'));
        $membre->setNumTel($request->get('telephone'));
        $membre->setVille($ville);
        $membre->setPassword($encoded);

        $em = $this->getDoctrine()->getManager();;
        $em->persist($membre);
        $em->flush();

        return $membre;
    }

}