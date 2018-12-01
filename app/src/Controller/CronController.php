<?php

namespace App\Controller;

use App\Model\UsuarioOld;
use App\Model\UsuarioOldDAO;
use Interop\Container\ContainerInterface;
use Mautic\MauticApi;
use Slim\Http\Request;
use Slim\Http\Response;

class CronController
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function indexAction(Request $request, Response $response, $args)
    {
        var_dump("cron index");
        return $response;
    }

    /**
     * WIP
     * Rodar novamente para levar os novos campos (citados no modelo
     * de usuario em getMauticObj) e para lidar com usuário com mauticId=0 (falhas)
     * @param Request $request
     * @param Response $response
     * @param $args
     */
    public function mauticSyncAction(Request $request, Response $response, $args)
    {
        $baseUrl = $this->container['settings']['mautic']['baseUrl'];
        $mauticApi = $this->container->mauticAuth;

        $api = new MauticApi();
        $contactApi = $api->newApi('contacts', $mauticApi, $baseUrl);

//        var_dump($mauticApi);

        // Ok! Sincronizar

        echo "<script>
        setInterval(function(){
            location.reload(); 
            },30000);
        </script>";
        flush();
        ob_flush();

        echo "<pre>";
        echo "The time is " . date("h:i:sa") . PHP_EOL . PHP_EOL;

        // Obter conexão

        $conexao = $this->container->dbOld;
        $userDao = UsuarioOldDAO::getInstance($conexao);

        // Obter últimos X registros não sincronizados
        $limit = 15;
        echo "Limite para obtenção: " . $limit . PHP_EOL;
        $users = $userDao->getWhere("mauticId is null", "id desc", $limit);

        echo "Usuários para sincronizar agora: " . count($users) . PHP_EOL;
        echo "The time is " . date("h:i:sa") . PHP_EOL . PHP_EOL;
//        var_dump($users);

//        $fields = $contactApi->getFieldList();
//        var_dump($fields);
        // Certificar campos necessários - login
//
//// Create the contact
//        $response = $contactApi->create($data);
//        $contact = $response[$contactApi->itemName()];

        echo "Sincronização:" . PHP_EOL . PHP_EOL;

        $emailInvalido = 0;

        foreach ($users as $user) {
            // Ignorar usuários sem email ou com email inválido
            if (filter_var($user->email, FILTER_VALIDATE_EMAIL) == false) {
                $emailInvalido++;
                echo "  Email inválido: " . $user->email . PHP_EOL;
                // Atualizar usuários com mauticId -1 para saber que não devem ser enviados ao mautic
                $user->mauticId = -1;
                $userDao->update($user);
                continue;
            }

            // Obter contato como objeto
            $contact = $user->getMauticObj();
            // var_dump($contact);

            // Enviar ao mautic
            $response = $contactApi->create($contact);
            // var_dump($response['contact']['fields']['all']);
//            var_dump($response['contact']);

            // Salvar id remoto, localmente
            if (isset($response['contact']) && $response['contact']['id']) {
                echo "  Contato Id: " . $response['contact']['id'] . " - " . $response['contact']['fields']['all']['firstname'] . " - " . $response['contact']['fields']['all']['email'] . PHP_EOL;
                $user->mauticId = $response['contact']['id'];
                $userDao->update($user);
            } else {
                echo "  FALHA ao criar contato no mautic" . PHP_EOL;
                if (isset($response['error'])) {
                    echo "    " . $response['error']['message'] . PHP_EOL;
                } else {
                    var_dump($response);
                }
                var_dump($user);
                // Atualizar usuários com mauticId 0 para saber que devem ser corrigidos futuramente...
                $user->mauticId = 0;
                $userDao->update($user);
            }
            flush();
            ob_flush();
        }

        echo PHP_EOL . "Fim da sincronização" . PHP_EOL;
        echo "The time is " . date("h:i:sa") . PHP_EOL . PHP_EOL;
        flush();
        ob_flush();

        $todos = $userDao->getCount();
        echo "Usuários totais: " . $todos . PHP_EOL;

        $migrarAinda = $userDao->countWhere("mauticId is null");
        echo "Usuários para migrar ainda: " . $migrarAinda . PHP_EOL;

        $migrados = $userDao->countWhere("mauticId is not null");
        echo "Usuários migrados: " . $migrados . " (" . round(($migrados / $todos) * 100, 2) . "%)" . PHP_EOL;

        echo "</pre>";


        // Bora continuar
        echo "<script>location.reload();</script>";
        flush();
        ob_flush();
    }


}
