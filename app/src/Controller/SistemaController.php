<?php

namespace App\Controller;

use App\Model\UsuarioOld;
use App\Model\UsuarioOldDAO;
use Interop\Container\ContainerInterface;
use Mautic\MauticApi;
use Slim\Http\Request;
use Slim\Http\Response;

class SistemaController extends AdminController
{

    public function indexAction(Request $request, Response $response, $args)
    {


        // Obter conexão do sistema antigo
        $conexaoOld = $this->container->dbOld;
        $userDao = UsuarioOldDAO::getInstance($conexaoOld);
        // Usuários
        $total = $userDao->getCount();

        // Mautic
        $migrados = $userDao->countWhere("mauticId>0");
        $emailInvalido = $userDao->countWhere("mauticId=-1");
        $falhaMautic = $userDao->countWhere("mauticId=0");

        // Construir array de dados
        $dados = Array();
        $dados['usuarios']=['total'=>$total, 'emailInvalido'=>$emailInvalido];
        $dados['mautic']=[
            'migrados'=>$migrados,
            "migradosPercentual"=>round(($migrados / ($total -$emailInvalido) ) * 100, 2)
        ];

        $content = $this->fetchView("admin/sistema/index.twig", ["dados" => $dados]);
        return $this->renderLayout($response, $content);
    }


}
