<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 15/12/2017
 * Time: 14:49
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Produits;
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

class ImagesProduitController extends Controller
{

    /**
     *
     * @Get("/images")
     */
    public function getImagesAction()
    {
        $imageList = $this->getDoctrine()->getRepository('AppBundle:ImagesProduit')->findAll();
        if (empty($imageList)) {
            return new JsonResponse(['message' => 'Aucun résultat trouvé'], Response::HTTP_NOT_FOUND);
        }
        $formatted = [];

        foreach ($imageList as $image) {
            $formatted[] = array(
                'id' => $image->getId(),
                'produit' => $image->getProduit()->getId(),
                'image' => $image->getImage()
            );
        }
        return new JsonResponse($formatted);
    }

    /**
     *
     * @Get("/images/{id}")
     */
    public function getImagesByProduitAction($id)
    {
        $imageList = $this->getDoctrine()->getRepository('AppBundle:ImagesProduit')->findBy(
            ['produit' => $id]
        );
        if (empty($imageList)) {
            return new JsonResponse(['message' => 'Aucun résultat trouvé'], Response::HTTP_NOT_FOUND);
        }
        $formatted = [];

        foreach ($imageList as $image) {
            $formatted[] = array(
                'id' => $image->getId(),
                'produit' => $image->getProduit()->getId(),
                'image' => $image->getImage()
            );
        }
        return new JsonResponse($formatted);
    }

}