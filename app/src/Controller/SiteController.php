<?php

namespace App\Controller;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class SiteController
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function indexAction(Request $request, Response $response, $args)
    {
        // Renderizar lista
        $content = $this->fetchView("site/home/home.twig");

        return $this->renderLayout($response, $content);

    }

    protected function renderLayout($response, $content = null, $data = null)
    {
        // Obter isso de uma configuração
        $data['siteTitle'] = "Desafio do Código";
        // $data['slug'] = $this->slug;
        $data['content'] = $content;
        return $this->container->view->render($response, '/site/layout.twig', $data);
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

}
