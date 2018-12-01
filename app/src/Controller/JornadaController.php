<?php

namespace App\Controller;

use App\Model\Jornada;
use App\Model\JornadaDAO;
use App\Model\TrilhaDAO;
use ReflectionClass;
use Slim\Http\Request;
use Slim\Http\Response;

class JornadaController extends AdminController
{
    protected $slug = "jornada";

    public function indexAction(Request $request, Response $response, $args)
    {
        // Obter DAO de jornadas
        /* @var $dao JornadaDAO */
        $dao = $this->getDAO();

        // Obter jornadas
        $jornadas = $dao->getAll();

        // Renderizar lista
        $content = $this->fetchView("admin/jornada/lista.twig", ['registros' => $jornadas]);

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
        $content = $this->fetchView("admin/jornada/form.twig");
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
            /* @var $dao JornadaDAO */
            $dao = $this->getDao();
            $dao->insertFromArray($vars);
            return $this->redirect($response, "jornadaIndex");
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $content = $this->fetchView("admin/jornada/form.twig", ["error" => $error, "registro" => $vars]);
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
        $content = $this->fetchView("admin/jornada/form.twig", ["registro" => $registro]);
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
            /* @var $dao JornadaDAO */
            $dao = $this->getDao();
            $dao->updateFromArray($args['id'], $vars);
            return $this->redirect($response, "jornadaIndex");
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $content = $this->fetchView("admin/jornada/form.twig", ["error" => $error, "registro" => $vars]);
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
        return $this->redirect($response, "jornadaIndex");
    }

    /**
     * Obtem as trilhas desta jornada
     * @param Request $request
     * @param Response $response
     * @param $args
     */
    public function listTrilhas(Request $request, Response $response, $args)
    {
        // Obter Jornada atual
        $jornada = $this->getDAO()->findById($args['id']);

        // Obter trilhas da jornada
        $trilhas = $jornada->getTrilhas();

        // Renderizar lista
        $content = $this->fetchView("admin/trilha/lista.twig", ['jornada' => $jornada, 'registros' => $trilhas]);

        return $this->renderLayout($response, $content);
    }

    /**
     * Retorna o DAO referente a este controller
     * Implementado apenas para forçar o tipo do retorno
     * Pode ser melhorado. :)
     * @return JornadaDAO
     */
    protected function getDAO($conexao = null)
    {
        return parent::getDAO();
    }


}
