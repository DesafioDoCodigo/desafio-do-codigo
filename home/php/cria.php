<?php
include "../../php/func.php";
$nome = mysqli_real_escape_string($mysql, $_POST['nome']);
$sexo = mysqli_real_escape_string($mysql, $_POST['sexo']);
$apelido = mysqli_real_escape_string($mysql, $_POST['apelido']);
$telefone = mysqli_real_escape_string($mysql, $_POST['telefone']);
$nasc = mysqli_real_escape_string($mysql, $_POST['nasc']);
$email = mysqli_real_escape_string($mysql, $_POST['email']);
$escola = mysqli_real_escape_string($mysql, $_POST['escola']);
$cidade = mysqli_real_escape_string($mysql, $_POST['cidade']);
$serie = mysqli_real_escape_string($mysql, $_POST['serie']);
$autoriza = mysqli_real_escape_string($mysql, $_POST['autoriza']);
$login = mysqli_real_escape_string($mysql, $_POST['login']);
$senha = password_hash(mysqli_real_escape_string($mysql, $_POST['senha']), PASSWORD_BCRYPT);
$ip = ipUser();
$tipo = mysqli_real_escape_string($mysql, $_POST['tipo']);
$tutor = mysqli_real_escape_string($mysql, $_POST['tutor']);
$m_last = 0;
$tipoc = $_SESSION['tipo'];
if($tipo == "tutor"){
	$tutor = gen_str();
}

if($tipoc !== "admin" AND $tipo == "admin"){
		$query = false;
		echo "Você não tem permissão de realizar essa ação. Sua classe é: ".$tipoc;
	}else{
		$query = true;
	}





if($query){
$sql = "INSERT INTO  `users` (`login` ,`nome` ,`sexo` ,`senha` ,`email` ,`ip` ,`autoriza` ,`serie` ,`cidade` ,`escola` ,`nasc` ,`telefone` ,`apelido` , `tipo`, `tutor`, `m_last`) VALUES ('$login',  '$nome', '$sexo',  '$senha',  '$email',  '$ip',  '$autoriza',  '$serie',  '$cidade',  '$escola',  '$nasc',  '$telefone',  '$apelido', '$tipo', '$tutor', '$m_last');";
mysqli_query($mysql, $sql);
echo"Conta criada com sucesso!";
}

?>
