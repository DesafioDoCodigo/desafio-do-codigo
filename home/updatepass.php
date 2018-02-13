<?php 

set_time_limit(300);

include '../php/func.php';

$find = mysqli_query($mysql, "SELECT id, senha FROM users WHERE senha NOT LIKE '$2y$10$%' LIMIT 150");

while($linha = mysqli_fetch_array($find)){
	$thisid++;
	$id = $linha['id'];
	$senha = password_hash($linha['senha'], PASSWORD_BCRYPT);

	mysqli_query($mysql, "UPDATE users SET senha = '$senha' WHERE id = $id LIMIT 1");

}

$q = mysqli_query($mysql, "SELECT COUNT(id) as restantes FROM users WHERE senha NOT LIKE '$2y$10$%'");
$linha = mysqli_fetch_array($q);
echo "Faltam: " . $linha['restantes'];

?>
<script>setTimeout(function(){window.location.reload();},1000);</script>
