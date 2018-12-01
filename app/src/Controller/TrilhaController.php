<?php

namespace App\Controller;

use App\Model\DesafioDAO;
use App\Model\JornadaDAO;
use App\Model\Trilha;
use App\Model\TrilhaDAO;
use ReflectionClass;
use Slim\Http\Request;
use Slim\Http\Response;

class TrilhaController extends AdminController
{
    protected $slug = "trilha";

    public function indexAction(Request $request, Response $response, $args)
    {
        // Obter DAO de trilhas
        /* @var $dao TrilhaDAO */
        $dao = $this->getDAO();

        // Obter trilhas
        $trilhas = $dao->getAll();

        // Renderizar lista
        $content = $this->fetchView("admin/trilha/lista.twig", ['registros' => $trilhas]);

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
        $daoJornada = JornadaDAO::getInstance($this->container->db);
        $jornada = $daoJornada->findById($args['id']);
        $content = $this->fetchView("admin/trilha/form.twig", ['jornada' => $jornada]);
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
        // O id da jornada, está na URL.. exemplo: /admin/jornada/1/trilha/incluir/
        $idJornada = $args['id'];
        $vars = $request->getParsedBody();
        $vars['id_jornada'] = $idJornada;
        try {
            /* @var $dao TrilhaDAO */
            $dao = $this->getDao();
            $dao->insertFromArray($vars);
            return $this->redirect($response, "jornadaListTrilhas", ['id' => $idJornada]);
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $content = $this->fetchView("admin/trilha/form.twig", ["error" => $error, "registro" => $vars]);
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
        /* @var $registrto Trilha */
        $registro = $this->getDAO()->findById($args['id']);
        $jornada = $registro->getJornada();
        $content = $this->fetchView("admin/trilha/form.twig", ["jornada"=>$jornada, "registro" => $registro]);
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
            /* @var $dao TrilhaDAO */
            $dao = $this->getDao();
            $trilha = $dao->updateFromArray($args['id'], $vars, true);
            return $this->redirect($response, "jornadaListTrilhas", ['id' => $trilha->id_jornada]);
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $content = $this->fetchView("admin/trilha/form.twig", ["error" => $error, "registro" => $vars]);
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
        $registro = $this->getDAO()->deleteById($args['id']);
        return $this->redirect($response, "trilhaIndex");
    }

    /**
     * Obtem os desafios desta trilha
     * @param Request $request
     * @param Response $response
     * @param $args
     */
    public function listDesafios(Request $request, Response $response, $args)
    {
        // Obter Trilha atual
        $trilha = $this->getDAO()->findById($args['id']);

        // Obter Desafios das Trilha
        $desafios = $trilha->getDesafios();

        // Renderizar lista
        $content = $this->fetchView(
            "admin/desafio/lista.twig",
            [
                'trilha' => $trilha,
                'registros' => $desafios
            ]
        );

        return $this->renderLayout($response, $content);
    }

    /**
     * Retorna o DAO referente a este controller
     * Implementado apenas para forçar o tipo do retorno
     * Pode ser melhorado. :)
     * @return TrilhaDAO
     */
    protected function getDAO($conexao = null)
    {
        return parent::getDAO();
    }


}
