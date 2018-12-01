<?php
/**
 * Para executar este comando, execute:
 * php ./public/index.php MauticImportar
 *
 * Usei o pacote slim-cli-runner para implementar o comando
 * https://github.com/adrianfalleiro/slim-cli-runner
 *
 * User: tiagogouvea
 * Date: 29/07/18
 * Time: 18:34
 */

namespace App\Command;

use \Interop\Container\ContainerInterface;
use \RuntimeException;

use App\Model\UsuarioOld;
use App\Model\UsuarioOldDAO;
use Mautic\MauticApi;

class MauticImportar extends Command
{

    /** @var ContainerInterface */
    protected $container;

    /**
     * Constructor
     *
     * @param ContainerInterface $container
     * @return void
     */
    public function __construct(ContainerInterface $container)
    {
        // access container classes
        // eg $container->get('redis');
        $this->container = $container;
    }

    /**
     * SampleTask command
     *
     * @param array $args
     * @return void
     */
    public function command($args)
    {
        // Access items in container
        $settings = $this->container->get('settings');

        $this->importar();

        return true;
    }

    private function importar()
    {
        $baseUrl = $this->container['settings']['mautic']['baseUrl'];
        $mauticApi = $this->container->mauticAuth;

        $api = new MauticApi();
        $contactApi = $api->newApi('contacts', $mauticApi, $baseUrl);

//        var_dump($mauticApi);
        // Ok! Sincronizar

        // Obter conexão

        $conexao = $this->container->dbOld;
        $userDao = UsuarioOldDAO::getInstance($conexao);

        error_reporting(E_ALL);

        // Obter últimos X registros não sincronizados
        $limit = 1000;
        $this->log("Limite para obtenção: " . $limit);
        $users = $userDao->getWhere("coalesce(mauticId,0)=0", "id asc", $limit);
        // $users = $userDao->getWhere("mauticId=0", "id asc", $limit);

        $this->log("Usuários para sincronizar agora: " . count($users));
        $this->log("The time is " . date("h:i:sa"));
//        var_dump($users);

//        $fields = $contactApi->getFieldList();
//        var_dump($fields);
        // Certificar campos necessários - login
//
//// Create the contact
//        $response = $contactApi->create($data);
//        $contact = $response[$contactApi->itemName()];

        $emailInvalido = 0;

        foreach ($users as $user) {
            // Ignorar usuários sem email ou com email inválido
            if (filter_var($user->email, FILTER_VALIDATE_EMAIL) == false) {
                $emailInvalido++;
                $this->log("  Email inválido: " . $user->email);
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
                $this->log("  Contato Id: " . $response['contact']['id'] . " - " . $response['contact']['fields']['all']['firstname'] . " - " . $response['contact']['fields']['all']['email']);
                $user->mauticId = $response['contact']['id'];
                $userDao->update($user);
            } else {
                $this->log("  FALHA ao criar contato no mautic");
                if (isset($response['error'])) {
                    $this->log("    " . $response['error']['message']);
                } else {
                    var_dump($response);
                }
                var_dump($user);
                // Atualizar usuários com mauticId 0 para saber que devem ser corrigidos futuramente...
                $user->mauticId = 0;
                $userDao->update($user);
            }
        }

        $this->log("Fim da sincronização");
        $this->log("The time is " . date("h:i:sa"));

        $todos = $userDao->getCount();
        $this->log("Usuários totais: " . $todos);

        $migrarAinda = $userDao->countWhere("mauticId is null");
        $this->log("Usuários para migrar ainda: " . $migrarAinda);

        $migrados = $userDao->countWhere("mauticId is not null");
        $this->log("Usuários migrados: " . $migrados . " (" . round(($migrados / $todos) * 100, 2) . "%)");
    }
}