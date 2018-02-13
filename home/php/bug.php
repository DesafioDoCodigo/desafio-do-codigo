<?php
include "../../php/func.php";
$idu = mysqli_real_escape_string($mysql, $_POST['id']);
$onde = mysqli_real_escape_string($mysql, $_POST['onde']);
$oque = mysqli_real_escape_string($mysql, $_POST['oque']);
$ip = ipUser();
$url = mysqli_real_escape_string($mysql, $_POST['url']);
$sql = "INSERT INTO  `bug` (`id_report` ,`onde` ,`oque` ,`ip` ,`url`)VALUES ('$idu',  '$onde',  '$oque',  '$ip',  '$url');";
mysqli_query($mysql,$sql);
echo"O problema foi reportado para o suporte com sucesso! Obrigado por contribuir!";
?>
