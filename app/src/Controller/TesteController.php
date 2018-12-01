<?php

namespace App\Controller;

use App\Model\UsuarioOld;
use App\Model\UsuarioOldDAO;
use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class TesteController
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function indexAction(Request $request, Response $response, $args)
    {
        // Teste de conexão e DAO
        echo "<h1>Conectar ao banco</h1>";
        $conexao = $this->container->db;
        $userDao = UsuarioOldDAO::getInstance($conexao);
        var_dump($conexao);

        $data = [];

        echo "<h1>Inserir usuário</h1>";

        // Teste de insert
        $user = new UsuarioOld();
        $user->nome = '_Tiago_';
        $user->login = '_Tiago_';
        $user->sexo = '_Tiago_';
        $user->senha = '_Tiago_';
        $user->email = '_Tiago_';
        $user->ip = '_Tiago_';
        $user->autoriza = true;
        $user->serie = '_Tiago_';
        $user->cidade = '_Tiago_';
        $user->escola = '_Tiago_';
        $user->nasc = '_Tiago_';
        $user->telefone = '_Tiago_';
        $user->tipo = '_Tiago_';
        $user->m_last = '_Tiago_';
        $user = $userDao->insert($user, true);
        var_dump($user);

        echo "<h1>Atualizar usuário</h1>";

        // Teste de update
        $user->nome = '_Tiago updated_';
        $user->login = '_Tiagoupdates_';
        $user->sexo = 'muito';
        $user = $userDao->update($user);
        var_dump($user);

        echo "<h1>Apgar usuário</h1>";
        echo "Por fazer";

        echo "<h1>Obter todos usuários</h1>";
        echo "Por fazer";

        echo "<h1>Obter usuários com where</h1>";
        echo "Por fazer";

        return $response;
    }




}
