<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 13/03/2018
 * Time: 20:44
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Adresse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializationContext;

class AdresseController extends Controller
{

    /**
     *
     * @Get("/adresse/{id}")
     */
    public function getAdresseByMembreAction($id)
    {
        $adresse = $this->getDoctrine()->getRepository('AppBundle:Adresse')->findBy(['membre' => $id]);

        $data = $this->get('jms_serializer')
            ->serialize($adresse, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/adresse")
     */
    public function creerAdresseAction(Request $request)
    {

        $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')->find($request->get('membre'));

        if (empty($membre)) {
            return new JsonResponse(['message' => 'Membre not found'], Response::HTTP_NOT_FOUND);
        }

        $adresse = new Adresse();
        $adresse->setMembre($membre);
        $adresse->setNomAdresse($request->get('nomAdresse'));
        $adresse->setNom($request->get('nom'));
        $adresse->setPrenom($request->get('prenom'));
        $adresse->setAdresse($request->get('adresse'));
        $adresse->setAdMail($request->get('email'));
        $adresse->setVille($request->get('ville'));
        $adresse->setCodePostal($request->get('codePostal'));
        $adresse->setPays($request->get('pays'));


        $em = $this->getDoctrine()->getManager();;
        $em->persist($adresse);
        $em->flush();

        return $adresse;
    }


}