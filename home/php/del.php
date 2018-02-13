<?php
include "../../php/func.php";
if($_SESSION['tipo'] == "admin"){
	$idd = $_POST['idd'];
	$tipod = $_POST['tipod'];
	$sql_del = "DELETE FROM `".$tipod."` WHERE `".$tipod."`.`id` = ".$idd."";
	mysqli_query($mysql,$sql_del);
}else{
	echo "Você não tem permissão de realizar essa ação.";
}
?>