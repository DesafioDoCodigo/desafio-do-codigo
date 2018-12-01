<?php
// DIC configuration
use Mautic\MauticApi;
use Rollbar\Rollbar;

$container = $app->getContainer();

// view > Twig
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig($container['settings']['view']['templatePath'], [
        'cache' => $container['settings']['view']['cachePath']
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

// view > Twig
$container['model'] = function ($container) {
    echo "model";
    return true;
};

// mauticAuth -> retorna instância de autenticação do Mautic
$container['mauticAuth'] = function ($container) {
    // Facilitar visualização das configurações
    $baseUrl = $container['settings']['mautic']['baseUrl'];
    $clientKey = $container['settings']['mautic']['clientKey'];
    $clientSecret = $container['settings']['mautic']['clientSecret'];
    $callback = $container['settings']['mautic']['callback'];
    $accessToken = $container['settings']['mautic']['accessToken'];
    $accessTokenSecret = $container['settings']['mautic']['accessSecret'];

    // Validar parâmetros

    $settings = array(
        'baseUrl' => $baseUrl,
        'clientKey' => $clientKey,
        'clientSecret' => $clientSecret,
        'callback' => $callback,
        'version' => 'OAuth1a',
        'accessToken' => $accessToken,
        'accessTokenSecret' => $accessTokenSecret,
        'accessTokenExpires' => null

    );

    /* @var $auth Mautic\Auth\OAuth */
    $auth = \Mautic\Auth\ApiAuth::initiate($settings);

    if ($auth->validateAccessToken()) {
        // var_dump("validateAccessToken");
        if ($auth->accessTokenUpdated()) {
            // var_dump("accessTokenUpdated");
            $accessTokenData = $auth->getAccessTokenData();
            // var_dump($accessTokenData);
            // @todo Save $accessTokenData
            // @todo Display success authorization message
        } else {
            // var_dump("already authorized");
            // @todo Display info message that this app is already authorized.
        }
    } else {
        // @todo Display info message that the token is not valid.
        var_dump("token is not valid");
    }

    return $auth;
};

//Not Found
$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $container->get('view')->render($response, '404.twig')->withStatus(404);
    };
};

//Database Connection
$pdo = null;
$container['db'] = function ($container) use ($pdo) {
    if ($pdo) {
        return $pdo;
    }

    // Facilitar visualização das configurações
    $host = $container['settings']['db']['host'];
    $port = $container['settings']['db']['port'];
    $dbname = $container['settings']['db']['dbname'];
    $user = $container['settings']['db']['user'];
    $pass = $container['settings']['db']['pass'];

    // Validar o mínimo
    if ($host == null || $dbname == null || $user == null) {
        throw new Exception("Os parametros de conexão com o banco de dados não foram definidos em settings.php na chave 'db'");
    }

    // Tentar conexão
    try {
        $conexao = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("SET CHARACTER SET utf8");

        // Share it over static class...
        global $pdo;
        $pdo = $conexao;
    } catch (PDOException $e) {
        var_dump($e);
        die("Erro de banco de dados");
        throw $e;
    }

    return $conexao;
};

$container['dbOld'] = function ($container) use ($pdo) {
    if ($pdo) {
        return $pdo;
    }

    // Facilitar visualização das configurações
    $host = $container['settings']['dbOld']['host'];
    $port = $container['settings']['dbOld']['port'];
    $dbname = $container['settings']['dbOld']['dbname'];
    $user = $container['settings']['dbOld']['user'];
    $pass = $container['settings']['dbOld']['pass'];

    // Validar o mínimo
    if ($host == null || $dbname == null || $user == null) {
        throw new Exception("Os parametros de conexão com o banco de dados não foram definidos em settings.php na chave 'dbOld'");
    }

    // Tentar conexão
    try {
        $conexao = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("SET CHARACTER SET utf8");

        // Share it over static class...
        global $pdoOld;
        $pdoOld = $conexao;
    } catch (PDOException $e) {
        throw $e;
        die("Erro de banco de dados - doOld");
    }

    return $conexao;
};

// Iniciar Rollbar (https://rollbar.com
if ($container['settings']['rollbar'] && $container['settings']['environment'] !== 'dev')
    Rollbar::init($container['settings']['rollbar']);

$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($container) {

        if ($container['settings']['environment'] !== 'dev') {
            Rollbar::error($exception);
            echo "Algo muito errado aconteceu aqui dentro do servidor. É um problema mesmo, alguém terá que resolver. É você que resolve? Ou ainda está aprendendo?";
            // var_dump($exception);
            // echo $e->getMessage();
            die();
        } else {
            var_dump($exception);
            echo $exception->getMessage();
            die("errorHandler");
        }

        // var_dump("errorHandler");
        // var_dump($exception);
        // return $c['response']->withStatus(500)
        //     ->withHeader('Content-Type', 'text/html')
        //     ->write('Something went wrong!');
    };
};
$container['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($container) {

        if ($container['settings']['environment'] !== 'dev') {
            Rollbar::error($exception);
            echo "Algo muito errado aconteceu aqui dentro do servidor. É um problema mesmo, alguém terá que resolver. É você que resolve? Ou ainda está aprendendo?";
            die();
        } else {
            var_dump($exception);
            echo $exception->getMessage();
            die("phpErrorHandler");
        }

        return $c['response']->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('Something went wrong!');
    };
};

// Adicionar Middleware para executar comandos no CLI
$app->add(\adrianfalleiro\SlimCLIRunner::class);