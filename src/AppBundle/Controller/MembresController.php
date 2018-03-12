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

class MembresController extends Controller
{

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/membres/creer")
     */
    public function postMembreAction(Request $request) {
        $request_ = new Request();
        $request_->attributes->set('username', $request->get('email'));
        $request_->attributes->set('email', $request->get('email'));
        $request_->attributes->set('plainPassword', $request->get('plainPassword'));
        $user =  $this->creerFosUserAction($request_);

//        $membre = new Membres();
//        $membre->setCivilite($request->get('civilite'));
//        $membre->setNom($request->get('nom'));
//        $membre->setPrenom($request->get('prenom'));
//        $membre->setNumTel($request->get('telephone'));
//        $membre->setAdMail($request->get('email'));
//        $membre->setAdresse($request->get('adresse'));
//        $membre->setVille($request->get('ville'));
//        $membre->setPays($request->get('pays'));
//        $membre->setCodePostal($request->get('code_postal'));
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($membre);
//        $em->flush();

        return $user;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/membres/creerUser")
     */
    public function creerFosUserAction(Request $request) {

        $request_ = new Request();
        $request_->attributes->set('username', $request->get('email'));
        $request_->attributes->set('email', $request->get('email'));
        $request_->attributes->set('plainPassword', $request->get('plainPassword'));

        $response = $this->forward('UserBundle\Controller\RegistrationController::registerAction',array(
            'request'  => $request_));
        return $response;

    }


}