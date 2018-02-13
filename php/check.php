<?php
include 'func.php';
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$username = mysqli_real_escape_string($mysql, $username);
	$sql = mysqli_query($mysql, "SELECT * FROM users WHERE login='$username';");
	if(mysqli_num_rows($sql)){
		echo '1';
	}else{
		echo '0';
	}
}
?>