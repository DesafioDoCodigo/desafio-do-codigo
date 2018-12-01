<?php
/**
 * Classe principal de controller do Admin. Todos outros controllers
 * do admin deverão extender esta para herdar funcionalidades interessantes
 * como "renderLayout"
 *
 */

namespace App\Controller;

use App\Model\DAO;
use App\Model\UsuarioOld;
use App\Model\UsuarioOldDAO;
use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class AdminController
{
    protected $container;
    protected $slug = "";

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    // Isso ficaria aqui mesmo? Ou crio um controler de home de admin?
    public function indexAction(Request $request, Response $response, $args)
    {
        return $this->renderLayout($response);
    }

    protected function renderLayout($response, $content = null, $data = null)
    {
        // Obter isso de uma configuração
        $data['adminTitle'] = "Desafio do Código";
        $data['slug'] = $this->slug;
        $data['content'] = $content;
        return $this->container->view->render($response, '/admin/layout.twig', $data);
    }

    /**
     * Renderiza uma view e retorna o html final
     * @param $view
     * @param null $data
     * @return mixedR
     */
    protected function fetchView($view, $data = null)
    {
        if (!$data)
            $data = array();
        return $this->container->view->fetch($view, $data);
    }

    /**
     * Retorna o DAO referente ao controller que estende
     * Pode ser melhorado. :)
     * @return DAO
     */
    protected function getDAO($conexao = null)
    {
        if (!$conexao)
            $conexao = $this->container->db;
        $className = 'App\Model\\' . ucfirst($this->slug) . "DAO";
        $dao = $className::getInstance($conexao);
        return $dao;
    }


    /**
     * Redireciona a requisição para uma nota rota
     * @param $response
     * @param $routeName
     * @param null $routeArgssssss
     * @return mixed
     */
    protected function redirect($response, $routeName, $routeArgs = [])
    {
        $uri = $this->container->router->pathFor($routeName, $routeArgs);
        return $response->withStatus(302)->withHeader('Location', $uri);
    }
}
