<?php

namespace App\Controller;

use App\Model\User;
use App\Model\UserDAO;
use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class DesafioController
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function indexAction(Request $request, Response $response, $args)
    {
        $user = new User();
        $user->nome = "Tiago Gouvêa";
        $user->sexo = "Masculino";

        $data = Array();
        $data['nome']= $user->nome;
        $data['user']= $user;

        return $this->container->view->render($response, '/desafio/home.twig', $data);
    }
}
