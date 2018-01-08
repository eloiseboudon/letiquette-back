<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 18/10/2017
 * Time: 15:50
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Clients;
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


class ClientsController extends Controller
{

    /**
     *
     * @Get("/user/test")
     */
    public function RoleUserAction(Request $request)
    {
        return $this->render('Roles/role-user.html.twig');

    }


    /**
     *
     * @Get("/admin/test")
     */
    public function RoleAdminAction(Request $request)
    {
        return $this->render('Roles/role-admin.html.twig');

    }

}