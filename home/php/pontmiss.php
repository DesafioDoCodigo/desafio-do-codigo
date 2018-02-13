<?php
include '../../php/func.php';
if($_POST['id']){
	$missiduser = $_POST['id'];
	echo json_miss($missiduser);
}
?>