<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 17/12/2017
 * Time: 11:02
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Couleurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class CouleursController extends Controller
{
    /**
     *
     * @Get("/couleurs")
     */
    public function getCouleursAction()
    {
        $couleursList = $this->getDoctrine()->getRepository('AppBundle:Couleurs')->findAll();
        if (empty($couleursList)) {
            return new JsonResponse(['message' => 'Aucun résultat trouvé'], Response::HTTP_NOT_FOUND);
        }
        $formatted = [];

        foreach ($couleursList as $couleur) {
            $formatted[] = array(
                'id' => $couleur->getId(),
                'hexa' => $couleur->getCouleur(),
                'name' => $couleur->getName()
            );
        }
        return new JsonResponse($formatted);
    }


}