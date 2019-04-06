<?php

use App\Command\MauticImportar;

date_default_timezone_set('America/Sao_Paulo');
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Carregar configurações
$settingsFile = __DIR__ . '/../app/settings.php';
if (!file_exists($settingsFile)) {
    die("Você deve copiar o arquivo /app/settings.template.php para /app/settings.php e configura-lo para funcionar em seu ambiente local.");
}
$settings = require $settingsFile;

// Validar configurações
// var_dump($settings);
$cachePath = $settings['settings']['view']['cachePath'];
if ($cachePath !== false && !isWritablePath(realpath($cachePath))) {
    die("É preciso ter permissão de escrita na pasta " . realpath($cachePath));
}

// Definir níveis de erros antes de iniciar o app https://stackoverflow.com/questions/50602776/php-error-reporting-production-vs-development
if ($settings['settings']['environment'] == "dev") {
    // Ver todos os erros que acontecerem direto no navegador
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    error_reporting(E_ALL);
} else {
    // Não exibir erros para o usuário nunca
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}

// @todo mover isso pra outro lugar, um bootstrap mais organizado
$settings['commands'] = [
    'MauticImportar' => MauticImportar::class
];

// Decorar settings com coisas a mais

// Iniciar o app
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../app/dependencies.php';

// Register routes
require __DIR__ . '/../app/routes.php';

// Run!
$app->run();


// Verifica se a pasta é "gravável", se existe permissão de escrita
function isWritablePath($xpath)
{
    $isOK = false;
    $path = trim($xpath);
    if (($path != "") && is_dir($path) && is_writable($path)) {
        $tmpfile = "mPC_" . uniqid(mt_rand()) . '.writable';
        $fullpathname = str_replace('//', '/', $path . "/" . $tmpfile);
        $fp = @fopen($fullpathname, "w");
        if ($fp !== false) {
            $isOK = true;
        }
        @fclose($fp);
        @unlink($fullpathname);
    }
    return $isOK;
}
