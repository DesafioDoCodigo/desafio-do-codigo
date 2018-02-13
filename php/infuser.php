<?php

include "func.php";

if(!$_SESSION['login']){

	

	header("location:../index.php");

	debug_js("sem session");

};

if($_SESSION['tipo'] == "admin"){

//admin tá logado e validado

	if($_POST['min']){$min = $_POST['min'];}else{$min = "0";};

	if($_POST['max']){$max = $_POST['max'];}else{$max = "30";};



	$json_response = array();

	$qry = "SELECT * FROM users order by id desc limit ".$min.", ".$max;

    $sql = mysqli_query($mysql, $qry) or die(mysqli_error());

    while ($row = mysqli_fetch_array($sql, mysqli_ASSOC)) {

	        $row_array['id'] = $row['id'];

			$row_array['nome'] = $row['nome'];

            $row_array['sexo'] = $row['sexo'];

			$row_array['login'] = $row['login'];

			$row_array['email'] = $row['email'];

			$row_array['ip'] = $row['ip'];

			$row_array['autoriza'] = $row['autoriza'];

			$row_array['serie'] = $row['serie'];

			$row_array['cidade'] = $row['cidade'];

			$row_array['escola'] = $row['escola'];

			$row_array['nasc'] = $row['nasc'];

			$row_array['telefone'] = $row['telefone'];

			$row_array['apelido'] = $row['apelido'];

			$row_array['tutor'] = $row['tutor'];

			$row_array['tipo'] = $row['tipo'];

			$row_array['m_last'] = $row['m_last'];

			$row_array['total'] = $row['total'];



	        //push the values in the array

	        array_push($json_response,$row_array);

	    }

	    echo json_encode($json_response);



}

?>