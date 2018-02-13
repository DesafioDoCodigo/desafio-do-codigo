<?php

include 'func.php';

if(isset($_POST['code'])){

  	$code = mysqli_real_escape_string($mysql, $_POST['code']);
  	$pass = mysqli_real_escape_string($mysql, $_POST['pass']);
  	$user = mysqli_real_escape_string($mysql, $_POST['user']);

	$query = mysqli_query($mysql, "SELECT u.id, u.login FROM users u, recovery r WHERE r.code = '".$code."' AND u.login = '".$user."' AND r.userid = u.id LIMIT 1");

	$sql=mysqli_num_rows($query);

	if($sql){
    	$lin=mysqli_fetch_array($query);

		$newpass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
		$update = mysqli_query($mysql, "UPDATE users SET senha = '".$newpass."' WHERE id = ".$lin['id']);

		$removeolder = mysqli_query($mysql, "DELETE FROM recovery WHERE userid = ".$lin['id']);
		echo "Senha alterada com sucesso.";

	}
	exit;

}


$email = mysqli_real_escape_string($mysql, $_POST['email']);

$query = mysqli_query($mysql, "SELECT id, login, senha FROM users WHERE email= '$email'");

$sql=mysqli_num_rows($query);

if($sql){

	$lin=mysqli_fetch_array($query);


	$code = md5(rand()*time());

	$removeolder = mysqli_query($mysql, "DELETE FROM recovery WHERE userid = ".$lin['id']);

	$insert = mysqli_query($mysql, "INSERT INTO recovery (id, userid, expires, code) VALUES (NULL, ".$lin['id'].", NOW(), '".$code."') ");

	$email_subject = "[DESAFIO DO CÓDIGO] Redefina sua Senha de Acesso";

	$email_body = "Saudações Padawan,\n\nVocê solicitou recuperação de senha para sua conta no site https://www.desafiodocodigo.com.br/desafio.\n\n"."Login: ".$lin['login']."\nCódigo de recuperação: ".$code."\r\n\r\nPara criar uma nova senha, acesse https://www.desafiodocodigo.com.br/desafio/recovery.php?code=".$code."&user=".$lin['login'];

	$headers = "From: suporte@desafiodocodigo.com.br\n";

	if( mail($email,$email_subject,$email_body,$headers)){

	echo "Foi enviado um email para ".$email." com as informações para redefinir sua senha. Verifique sua caixa de spam para ter certeza que não chegou.";

	}else{

		"Erro no php";

	}
} else {
	echo "E-mail não encontrado.";
}

?>
