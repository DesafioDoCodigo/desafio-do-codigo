<?php

include 'php/func.php';

if(isset($_GET['code'])){
	$code = json_decode(base64_decode($_GET['code']));

	$id = mysqli_real_escape_string($mysql, $code->id);
	$login = mysqli_real_escape_string($mysql, $code->login);

	if($id > 0){
		$q = mysqli_query($mysql, "UPDATE users SET newsletter = 0 WHERE id = $id AND login = '$login' LIMIT 1");
	}
}
header("Location: /desafio/?newsletter=".($q ? 1 : 0));