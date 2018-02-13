<?php
include '../php/func.php';

$login = mysql_real_escape_string($_GET['login']);
$senha = mysql_escape_string($_GET['pass']);


if(verifica_login($login, $senha)){
	echo"{logado:true}";
}

?>