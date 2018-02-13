<?php
include "func.php";
$nome = $_POST['nome'];
$nome = mysqli_real_escape_string($mysql, $nome);
$sexo = $_POST['sexo'];
$sexo = mysqli_real_escape_string($mysql, $sexo);
$apelido = $_POST['apelido'];
$apelido = mysqli_real_escape_string($mysql, $apelido);
$telefone = $_POST['telefone'];
$telefone = mysqli_real_escape_string($mysql, $telefone);
$nasc = $_POST['nasc'];
$nasc = mysqli_real_escape_string($mysql, $nasc);
$email = $_POST['email'];
$email = mysqli_real_escape_string($mysql, $email);
$escola = $_POST['escola'];
$escola = mysqli_real_escape_string($mysql, $escola);
$cidade = $_POST['cidade'];
$cidade = mysqli_real_escape_string($mysql, $cidade);
$serie = $_POST['serie'];
$serie = mysqli_real_escape_string($mysql, $serie);
$autoriza = $_POST['autoriza'];
$autoriza = mysqli_real_escape_string($mysql, $autoriza);
$login = trim($_POST['login']);
$login = mysqli_real_escape_string($mysql, $login);
$senhaaberta = mysqli_real_escape_string($mysql, $_POST['senha']); //usa no email
$senha = password_hash($senhaaberta, PASSWORD_BCRYPT);

$ip = ipUser();
$tipo = "user";
$m_last = "0";

if (!preg_match("/[A-Z0-9._%+-]+@(.*)/i", $email)){

	echo "Erro: E-mail inválido";
	exit;

}

if (preg_match("/^[0-9]{4}(-|\/)[0-9]{2}(-|\/)[0-9]{2}$/i", $nasc)){

	$nasc = date("Y-m-d", strtotime(str_replace("/", "-", $nasc)));

} else if (preg_match("/^[0-9]{2}(-|\/)[0-9]{2}(-|\/)[0-9]{4}$/i", $nasc)){

	$nasc = date("Y-m-d", strtotime(str_replace("-", "/", $nasc)));

} else {
	echo "Erro: data de nascimento deve estar no formato dd/mm/aaaa";
	exit;
}
$search = "SELECT * FROM  `users` WHERE  `login` =  '$login' ";
$query = mysqli_query($mysql, $search);
if(mysqli_num_rows($query) > 0){
	echo"ERRO:Nome de usuário já existente!";
}else{
	$query = mysqli_query($mysql, "INSERT INTO `users` (`id`, `login` ,`nome` ,`sexo` ,`senha` ,`email` ,`ip` ,`autoriza` ,`serie` ,`cidade` ,`escola` ,`nasc` ,`telefone` ,`apelido` , `tipo`, `m_last`) VALUES (NULL, '$login',  '$nome',  '$sexo',  '$senha',  '$email',  '$ip',  '$autoriza',  '$serie',  '$cidade',  '$escola',  '$nasc',  '$telefone',  '$apelido', '$tipo', '$m_last')");
	if(mysqli_affected_rows($mysql) > 0){

		$id = mysqli_insert_id($mysql);

//		require '../mail/PHPMailerAutoload.php';
//		$mail = new PHPMailer;
		//caso vá utilizar servidor externo SMTP: 
		/*$mail->Host = 'smtp1.example.com;smtp2.example.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'user@example.com';
		$mail->Password = 'secret';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;  */

//		$mail->setFrom('suporte@desafiodocodigo.com.br', ('Desafio do Código'));
		//$mail->addAddress('jogosdoconhecimento@fundacaolemann.org.br');
//		$mail->addAddress($email);

		/*if($_FILES['arquivo1']['tmp_name'])
			$mail->addAttachment($_FILES['arquivo1']['tmp_name'], $_FILES['arquivo1']['name']);
*/
//		$mail->isHTML(true);
//		$mail->Subject = ('Seja bem vindo ao Desafio do Código');
//		$keys = array("%LOGIN%", "%PASSWORD%", "%NOME%", "%ID%", "%CODE%");
		$values = array($login, $senhaaberta, $nome, $id, base64_encode(json_encode(array('id'=>$id,'login'=>$login))));

//		$mail->Body    = str_replace($keys, $values, file_get_contents('../mail/templates/novaconta.php'));
/*
		$mail->AltBody = utf8_decode(
		"Nome: ".strip_tags($_POST['name'])."\r\n".
		"Função na escola: ".strip_tags($_POST['escola'])."\r\n".
		"Nome da Escola: ".strip_tags($_POST['email'])."\r\n".
		"E-mail: ".strip_tags($_POST['cargo'])."\r\n".
		"Séries/Alunos: ".strip_tags($_POST['serie'])."\r\n".
		"História: ".strip_tags($_POST['message'])."\r\n\r\n".
		"Link para vídeo: ".strip_tags($_POST['url'])."\r\n");
*/
//		$mail->CharSet = 'UTF-8';
//		$mail->send();

		$vars = json_encode($values);

		$addMailToCron = mysqli_query($mysql, "INSERT INTO cron_mail_list (id, userid, emailid, vars, date_created, date_sended, sended) VALUES (NULL, $id, ".MAIL_TEMPLATE_NEWACCOUNT.", '$vars', NOW(), NULL, 0)");

		echo"Conta criada com sucesso!";
    	
	}else{
		echo"Erro no query sql";
	}
}


?>
