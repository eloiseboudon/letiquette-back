<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Pays;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Head;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Patch;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;


class PaysController extends Controller
{

    /**
     * @Get("/pays")
     */
    public function getPaysAction(){

        $pays = $this->getDoctrine()->getRepository('AppBundle:Pays')->findAll();
        $data = $this->get('jms_serializer')
            ->serialize($pays, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/pays/{id}")
     */
    public function getPaysIdAction($id){
        $pays = $this->getDoctrine()->getRepository('AppBundle:Pays')->find($id);

        if (empty($pays)) {
            return new JsonResponse(['message' => 'Pays not found'], Response::HTTP_NOT_FOUND);
        }
        $data = $this->get('jms_serializer')
            ->serialize($pays, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/pays")
     * @param Request $request
     * @return Pays
     */
    public function postPaysAction(Request $request){
        $pays = new Pays();
        $pays->setPays($request->get("name"));

        $em = $this->getDoctrine()->getManager();;
        $em->persist($pays);
        $em->flush();

        return $pays;
    }


    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/pays/{id}")
     * @param Request $request
     */
    public function removePaysAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $pays = $em->getRepository('AppBundle:Pays')
            ->find($request->get('id'));

        $em->remove($pays);
        $em->flush();
    }







}