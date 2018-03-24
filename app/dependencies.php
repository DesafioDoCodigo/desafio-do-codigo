<?php
// DIC configuration
$container = $app->getContainer();


//Smarty
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig($container['settings']['view']['templatePath'], [
        'cache' => $container['settings']['view']['cachePath']
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

//Not Found
$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $container->get('view')->render($response, '404.twig')->withStatus(404);
    };
};

//Database Connection
$container['db'] = function ($container) {
    // Facilitar visualização das configurações
    $host = $container['settings']['db']['host'];
    $port = $container['settings']['db']['port'];
    $dbname = $container['settings']['db']['dbname'];
    $user = $container['settings']['db']['user'];
    $pass = $container['settings']['db']['pass'];

    // Validar o mínimo
    if ($host==null || $dbname==null || $user==null){
        throw new Exception("Os parametros de conexão com o banco de dados não foram definidos em settings.php na chave 'db'");
    }

    // Tentar conexão
    try {
        $conexao = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("SET CHARACTER SET utf8");
    } catch (PDOException $e) {
        echo "Erro conectando ao banco de dados.<br><br>";
        echo $e->getMessage();
        die();
    }

    return $conexao;
};