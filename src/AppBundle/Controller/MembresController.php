<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 12/03/2018
 * Time: 11:46
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
use JMS\Serializer\SerializationContext;
use UserBundle\Controller\RegistrationController;

use Symfony\Component\DependencyInjection\ContainerInterface;
use UserBundle\Entity\User;

class MembresController extends Controller
{

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/membres/inscription")
     */
    public function postMembreInscriptionAction(Request $request)
    {
        $fos_user = $this->creerFosUser($request);

        if ($fos_user->isSuccessful()) {


            $user = $this->getDoctrine()
                ->getRepository('UserBundle:User')
                ->findOneBy(['username' => $request->get('email')]);

            $membre = new Membres();
            $membre->setUser($user);
            $membre->setCivilite($request->get('civilite'));
            $membre->setNom($request->get('nom'));
            $membre->setPrenom($request->get('prenom'));
            $membre->setNumTel($request->get('telephone'));
            $membre->setAdMail($request->get('email'));
            $membre->setAdresse($request->get('adresse'));
            $membre->setVille($request->get('ville'));
            $membre->setPays($request->get('pays'));
            $membre->setCodePostal($request->get('code_postal'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $em->flush();

            $response = $membre;

        } else {
            $response = $fos_user;
        }

        return $response;
    }

    public function creerFosUser(Request $request)
    {
        $response = $this->forward('UserBundle\Controller\RegistrationController::registerAction', array(
            'request' => $request));
        return $response;

    }


    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/membres/connexion")
     */
    public function postMembreConnexionAction(Request $request)
    {
        $fos_user = $this->checkFosUser($request);

        if ($fos_user->isSuccessful()) {


            $user = $this->getDoctrine()
                ->getRepository('UserBundle:User')
                ->findOneBy(['username' => $request->get('username')]);

            if($user){
                $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')
                    ->findOneBy(['user' => $user]);
            }

            $response = $membre;


        } else {
            $response = $fos_user->getStatusCode();

        }

        return $response;
    }

    public function checkFosUser(Request $request)
    {
        $response = $this->forward('UserBundle\Controller\LoginController::loginAction', array(
            'request' => $request));
        return $response;

    }





}