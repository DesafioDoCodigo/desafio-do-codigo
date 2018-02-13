<?php
include "../../php/func.php";
$idu = $_POST['id'];
$onde = $_POST['onde'];
$oque = $_POST['oque'];
$ip = ipUser();
$url = $_POST['url'];
$sql = "INSERT INTO  `bug` (`id_report` ,`onde` ,`oque` ,`ip` ,`url`)VALUES ('$idu',  '$onde',  '$oque',  '$ip',  '$url');";
mysqli_query($mysql,$sql);
echo"Seu bug foi enviado para o suporte com sucesso! Agradecemos Sua Contribuição!";
?>
