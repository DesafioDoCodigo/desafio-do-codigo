<?php

namespace App\Controller;

use App\Model\usuario;
use App\Model\usuarioDAO;
use App\Model\TrilhaDAO;
use ReflectionClass;
use Slim\Http\Request;
use Slim\Http\Response;

class UsuarioController extends AdminController
{
    protected $slug = "usuario";

    public function indexAction(Request $request, Response $response, $args)
    {
        // Obter DAO de usuarios
        /* @var $dao usuarioDAO */
        $dao = $this->getDAO();

        // Obter usuarios
        $usuarios = $dao->getWhere('','id desc',10);

        // Renderizar lista
        $content = $this->fetchView("admin/usuario/lista.twig", ['registros' => $usuarios]);

        return $this->renderLayout($response, $content);
    }

    /**
     * Renderiza o formulário para inclusão
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function addAction(Request $request, Response $response, $args)
    {
        $content = $this->fetchView("admin/usuario/form.twig");
        return $this->renderLayout($response, $content);
    }

    /**
     * Salva o novo registro incluido
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function addPostAction(Request $request, Response $response, $args)
    {
        $vars = $request->getParsedBody();
        try {
            /* @var $dao usuarioDAO */
            $dao = $this->getDao();
            $dao->insertFromArray($vars);
            return $this->redirect($response, "usuarioIndex");
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $content = $this->fetchView("admin/usuario/form.twig", ["error" => $error, "registro" => $vars]);
            return $this->renderLayout($response, $content);
        }
    }


    /**
     * Renderiza o formulário para edição
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function editAction(Request $request, Response $response, $args)
    {
        $registro = $this->getDAO()->findById($args['id']);
        $content = $this->fetchView("admin/usuario/form.twig", ["registro" => $registro]);
        return $this->renderLayout($response, $content);
    }


    /**
     * Salva o registro alterado
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function editPostAction(Request $request, Response $response, $args)
    {
        $vars = $request->getParsedBody();
        try {
            /* @var $dao usuarioDAO */
            $dao = $this->getDao();
            $dao->updateFromArray($args['id'], $vars);
            return $this->redirect($response, "usuarioIndex");
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $content = $this->fetchView("admin/usuario/form.twig", ["error" => $error, "registro" => $vars]);
            return $this->renderLayout($response, $content);
        }
    }


    /**
     * Exclui (tenta ao menos) um registro
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function deleteAction(Request $request, Response $response, $args)
    {
        $this->getDAO()->deleteById($args['id']);
        return $this->redirect($response, "usuarioIndex");
    }

    /**
     * Retorna o DAO referente a este controller
     * Implementado apenas para forçar o tipo do retorno
     * Pode ser melhorado. :)
     * @return usuarioDAO
     */
    protected function getDAO($conexao = null)
    {
        return parent::getDAO();
    }


}
