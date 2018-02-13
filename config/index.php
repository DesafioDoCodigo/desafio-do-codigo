<?php
/**
 * User: tiagogouvea
 * Date: 11/02/18
 * Time: 09:44
 */

// Carrega o arquivo de configuração adequado por ambiente
$machineName = strtolower(gethostname());
$envFile = dirname(__FILE__)."/envs/".$machineName.".php";
if (!file_exists($envFile)){
    echo "Não foi encontrado seu arquivo de configuração do ambiente. Ele deverá ser criado em:<br>
           $envFile<br>
           Verifique em /config/sampleConfig.php como cria-lo.";
    die('');
}

require_once $envFile;

// Carregar configurações padrão
require_once 'defaults.php';
