<?php
include "../../php/func.php";
if($_SESSION['tipo'] == "admin"){
$html = $_POST['html'];
$nome = $_POST['nome'];
$max = $_POST['max'];
$x = max_m() + 1;

$fp=fopen('../missoes/m'.$x.'.php','w');
fwrite($fp, $html);
fclose($fp);

$color[1] = "cyan";
$color[2] = "orange";
$color[3] = "blue";
$color[4] = "yellow";
$color[5] = "green";
$color[6] = "red";
$color[7] = "purple";

if(mysqli_query($mysql, "INSERT INTO `missoes` (`id`, `nome`, `ref`, `color`, `max`) VALUES ('$x', '$nome', 'm".$x."', '".$color[rand(1,7)]."', '$max');")){

	mysqli_query($mysql, "ALTER TABLE  `users` ADD  `m_".$x."` TEXT NOT NULL ;");
	echo "Missão: ".$nome." adicionada.";
}else{
	echo"Mysql ERROR";
};

}else{
	echo "Você não tem permissão de realizar essa ação.";
}
?>