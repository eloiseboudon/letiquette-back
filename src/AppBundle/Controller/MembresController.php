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
            if($user) {
                $membre = new Membres();
                $membre->setUser($user);
                $membre->setCivilite($request->get('civilite'));
                $membre->setNom($request->get('nom'));
                $membre->setPrenom($request->get('prenom'));
                $membre->setNumTel($request->get('telephone'));
                $membre->setAdMail($request->get('email'));
                $em = $this->getDoctrine()->getManager();
                $em->persist($membre);
                $em->flush();


                $data = $this->get('jms_serializer')
                    ->serialize($membre, 'json',
                        SerializationContext::create()->setSerializeNull(true));
            }else{
                return new JsonResponse(['message' =>'Membre non trouvé'], Response::HTTP_NOT_FOUND);
            }


        } else {
            return new JsonResponse(['message' => 'L\'inscription a échouée'], Response::HTTP_NOT_FOUND);
        }



        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

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

            if($user) {
                $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')
                    ->findOneBy(['user' => $user]);

                if($membre) {
                    $data = $this->get('jms_serializer')
                        ->serialize($membre, 'json',
                            SerializationContext::create()->setSerializeNull(true));
                }else{
                    return new JsonResponse(['message' => 'Membre non trouvé'], Response::HTTP_NOT_FOUND);

                }
            }else{
                return new JsonResponse(['message' => 'Membre non trouvé'], Response::HTTP_NOT_FOUND);
            }
        } else {
            return new JsonResponse(['message' => 'Problème de login et/ou mot de passe', 'error' => $fos_user->getStatusCode()], Response::HTTP_NOT_FOUND);
        }
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function checkFosUser(Request $request)
    {
        $response = $this->forward('UserBundle\Controller\LoginController::loginAction', array(
            'request' => $request));
        return $response;

    }

}