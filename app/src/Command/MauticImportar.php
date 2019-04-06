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

use App\Model\UsuarioOldDAO;
use Mautic\Auth\AuthInterface;
use Mautic\MauticApi;
use Rollbar\Rollbar;

class MauticImportar extends Command
{

    /** @var ContainerInterface */
    protected $container;
    /** @var \Mautic\Api\Api $contactApi */
    private $contactApi;
    /** @var UsuarioOldDAO $userDao */
    private $userDao;

    private $limit = 100;

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

        // Obter conexão bom banco e API
        $conexao = $this->container->dbOld;
        $this->userDao = UsuarioOldDAO::getInstance($conexao);

        /** @var AuthInterface $auth */
        $auth = $this->container->mauticAuth;
        $api = new MauticApi();
        $this->contactApi = $api->newApi('contacts', $auth, $this->container['settings']['mautic']['baseUrl']);
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

        $this->log("Limite para obtenção: " . $this->limit);

        $this->importar();
        $this->atualizarEmailsInvalidos();
        $this->atualizarContatos();

        return true;
    }

    private function importar()
    {
        // Obter últimos X registros não sincronizados
        $this->log("============ Importar =============");

        $users = $this->userDao->getWhere("mauticId is null", "id asc", $this->limit);

        $this->log("Usuários para sincronizar agora: " . count($users));
        $this->log("The time is " . date("h:i:sa"));

        foreach ($users as $user) {
            $user->email = str_replace(" ", "", strtolower(trim($user->email)));
            // Ignorar usuários sem email ou com email inválido
            if (filter_var($user->email, FILTER_VALIDATE_EMAIL) == false) {
                $this->log("  Email inválido: " . $user->email);
                // Atualizar usuários com mauticId -1 para saber que não devem ser enviados ao mautic
                $user->mauticId = -1;
                $this->userDao->update($user);
                continue;
            }

            // Obter contato como objeto
            $contact = $user->getMauticObj();
            // var_dump($contact);

            // Enviar ao mautic
            $response = $this->contactApi->create($contact);

            // var_dump($response['contact']['fields']['all']);
            // var_dump($response['contact']);

            // Salvar id remoto, localmente
            if (isset($response['contact']) && $response['contact']['id']) {
                $this->log("  Contato Id: " . $response['contact']['id'] . " - " . $response['contact']['fields']['all']['firstname'] . " - " . $response['contact']['fields']['all']['email']);
                $user->mauticId = $response['contact']['id'];
                $this->userDao->update($user);
            } else {

                $this->log("  FALHA ao criar contato no mautic");
                $this->log("  $user->login (" . mb_detect_encoding($user->login) . ") - $user->nome (" . mb_detect_encoding($user->nome) . ")");
                $code = null;
                if (isset($response['error'])) {
                    // $this->log($response);
                    $this->log("    Code: " . $response['error']['code']);
                    $this->log("    Message: " . $response['error']['message']);
                    $code = $response['error']['code'];
                } else {
                    $this->log($response);
                }
                // die();
                Rollbar::error("Importar Mautic - Code " . $code, ['response' => $response, 'contact' => $contact]);
                // Atualizar usuários com mauticId 0 para saber que devem ser corrigidos futuramente...
                $user->mauticId = 0;
                $this->userDao->update($user);
            }
        }

        $this->log("Fim da sincronização");
        $this->log("The time is " . date("h:i:sa"));

        $todos = $this->userDao->getCount();
        $this->log("Usuários totais: " . $todos);

        $migrarAinda = $this->userDao->countWhere("mauticId is null");
        $this->log("Usuários para migrar ainda: " . $migrarAinda);

        $migrados = $this->userDao->countWhere("mauticId is not null");
        $this->log("Usuários migrados: " . $migrados . " (" . round(($migrados / $todos) * 100, 2) . "%)");
    }

    /**
     * Realiza a atualização dos usuários no mautic
     * - Atualiza pontuação
     * - Atualiza emails inválidos
     * @throws \Mautic\Exception\ContextNotFoundException
     */
    private function atualizarEmailsInvalidos()
    {
        $this->log("============ atualizarEmailsInvalidos =============");

        // mauticId -2 significa totalmente fora (DNC)
        // Atualizar emails inválidos para o mautic, setando DNC lá e mauticid -2 aqui
        $users = $this->userDao->getWhere("email_invalido is not null and mauticId is not null and mauticId<>-2 and mauticId>0", "id asc", $this->limit);
        $this->log("Usuários para sincronizar agora: " . count($users));
        $this->log("The time is " . date("h:i:sa"));

        foreach ($users as $user) {
            // ADD DNC
            $response = $this->contactApi->addDnc($user->mauticId, 'email', 2, null, 'Via API');

            // Salvar id remoto, localmente
            if (isset($response['contact']) && $response['contact']['id']) {
                $this->log("  Contato Id: " . $response['contact']['id'] . " - " . $user->nome);
                $user->mauticId = -2;
                $this->userDao->update($user);
            } else {
                $this->log("  FALHA com contato no mautic");
                $this->log("  $user->login - $user->nome");
                $code = null;
                if (isset($response['error'])) {
                    // $this->log($response);
                    $this->log("    Code: " . $response['error']['code']);
                    $this->log("    Message: " . $response['error']['message']);
                    $code = $response['error']['code'];
                } else {
                    $this->log($response);
                }
                // die();
                // Rollbar::error("Atualizar Mautic - Code " . $code, ['response' => $response, 'contact' => $contact]);
                die();
                // Atualizar usuários com mauticId 0 para saber que devem ser corrigidos futuramente...
                // $user->mauticId = 0;
                // $this->userDao->update($user);
            }
        }

        $this->log("Fim da sincronização");
        $this->log("The time is " . date("h:i:sa"));
    }

    /**
     * Realiza a atualização dos usuários no mautic
     * - Atualizar pontuação
     * - Atualiza último login
     * @throws \Mautic\Exception\ContextNotFoundException
     */
    private function atualizarContatos()
    {
        // Obter últimos X registros não sincronizados
        $this->log("=========== atualizarContatos =============");

        // Atualizar pontuação os usuários no mautic
        $users = $this->userDao->getWhere("coalesce(mauticId)>0 and total>0 and last_mautic_update is null", "total asc", $this->limit);
        $this->log("Usuários para sincronizar agora: " . count($users));
        $this->log("The time is " . date("h:i:sa"));

        foreach ($users as $user) {

            // Obter contato como objeto
            $contact = $user->getMauticObj();

            // Enviar ao mautic
            $response = $this->contactApi->edit($user->mauticId, $contact, false);

            // Salvar id remoto, localmente
            if (isset($response['contact']) && $response['contact']['id']) {
                $this->log("  Contato Id: " . $response['contact']['id'] . " - " . $user->nome . " - " . $user->email);
                $user->last_mautic_update = time();
                $this->userDao->update($user);
            } else {
                $this->log("  FALHA com contato no mautic");
                $this->log("  $user->login - $user->nome");
                $code = null;
                if (isset($response['error'])) {
                    // $this->log($response);
                    $this->log("    Code: " . $response['error']['code']);
                    $this->log("    Message: " . $response['error']['message']);
                    $code = $response['error']['code'];
                } else {
                    $this->log($response);
                }
                // die();
                Rollbar::error("Atualizar Mautic - Code " . $code, ['response' => $response, 'contact' => $contact]);
                // die();
                // Atualizar usuários com mauticId 0 para saber que devem ser corrigidos futuramente...
                $user->mauticId = 0;
                $this->userDao->update($user);
            }
        }

        $this->log("Fim da sincronização");
        $this->log("The time is " . date("h:i:sa"));
    }
}
