<?php
// Iniciar conexão
$mysql = mysqli_connect (Config::DB_SERVER, Config::DB_USERNAME, Config::DB_PASSWORD, Config::DB_NAME);

if (!$mysql) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    die();
}

// Setar utf-8 para o mysql
mysqli_query($mysql, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
if($qry) mysqli_query($mysql, $qry);
