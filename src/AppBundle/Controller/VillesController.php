<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Villes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializationContext;


//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
//header("Access-Control-Allow-Headers: Origin, Content-Type, Accept");


class VillesController extends Controller
{
    /**
     *
     * @Get("/villes")
     */
    public function getVillesAction(){
        $villes = $this->getDoctrine()->getRepository('AppBundle:Villes')->findAll();
        $data = $this->get('jms_serializer')
            ->serialize($villes, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * @Get("/villes/{id}")
     */
    public function getVillesIdAction($id){
        $villes = $this->getDoctrine()->getRepository('AppBundle:Villes')->find($id);

        if (empty($ville)) {
            return new JsonResponse(['message' => 'Ville not found'], Response::HTTP_NOT_FOUND);
        }

        $data = $this->get('jms_serializer')
            ->serialize($villes, 'json',
                SerializationContext::create()->setSerializeNull(true));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
    * @Rest\View()
    * @Rest\Get("/villes/{id}/pays")
    */
    public function getVillePaysAction(Request $request){
        $ville = $this->getDoctrine()->getRepository('AppBundle:Villes')->find($request->get('id'));

        if (empty($ville)){
            return new JsonResponse(['message' => 'Pays not found'], Response::HTTP_NOT_FOUND);
        }

        return $ville->getPays();
    }


    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/villes/pays/{id}")
     */
    public function postVillePaysAction(Request $request){
        $pays = $this->getDoctrine()->getRepository('AppBundle:Pays')->find($request->get('id'));

        if (empty($pays)){
            return new JsonResponse(['message' => 'Pays not found'], Response::HTTP_NOT_FOUND);
        }

        $ville = new Villes();
        $ville->setPays($pays);
        $ville->setVille($request->get('name'));
        $ville->setCodePostal($request->get('codePostal'));

        $em = $this->getDoctrine()->getManager();;
        $em->persist($ville);
        $em->flush();

        return $ville;
    }


    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/villes/{id}")
     */
    public function removeVillesAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $ville = $em->getRepository('AppBundle:Villes')
            ->find($request->get('id'));

        $em->remove($ville);
        $em->flush();
    }

}