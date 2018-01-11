<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 11/01/2018
 * Time: 14:07
 */

namespace AppBundle\Controller;
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use AppBundle\Entity\AuthToken;
use AppBundle\Entity\Credentials;


class AuthTokenController extends  Controller
{
    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/auth-token")
     */
    public function postAuthTokenAction(Request $request)
    {
        $credentials = new Credentials();
        $credentials->setLogin($request->get('login'));
        $credentials->setPassword($request->get('password'));

        $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')->findOneBy(['adMail' => $credentials->getLogin()]);

        if(empty($membre)){
            return $this->invalidCredentials();
        }

        $encoder = $this->get('security.password_encoder');
        $isPasswordValid = $encoder->isPasswordValid($membre, $credentials->getPassword());

        if (!$isPasswordValid) { // Le mot de passe n'est pas correct
            return $this->invalidCredentials();
        }

        $authToken = new AuthToken();
        $authToken->setValue(base64_encode(random_bytes(50)));
        $authToken->setCreatedAt(new \DateTime('now'));
        $authToken->setMembre($membre);


        $em = $this->getDoctrine()->getManager();
        $em->persist($authToken);
        $em->flush();

        return $authToken;
    }

    private function invalidCredentials()
    {
        return \FOS\RestBundle\View\View::create(['message' => 'Invalid credentials'], Response::HTTP_BAD_REQUEST);
    }

}