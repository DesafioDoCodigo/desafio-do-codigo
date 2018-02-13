<?php

include '../../php/func.php';

$c = 0;

$qry = mysqli_query($mysql, "SELECT COUNT(*) as cnt, GROUP_CONCAT(id) AS ids FROM users GROUP BY login HAVING cnt > 1 ORDER BY `cnt` DESC");

$row = mysqli_num_rows($qry);

if($row>=1){

	while($qry_row = mysqli_fetch_array($qry)){

		$array = explode(",", $qry_row['ids']);



		for ($i=1; $i<$qry_row['cnt']; $i++){



	    	if(mysqli_query($mysql, "DELETE FROM users WHERE id = '".$array[$i]."';")){

	    	$c++;    		

	    	}

	    }





	}



	





	if($c>=1){

		$s = "s";

	};



	$str =  $c." conta".$s." duplicada".$s." foram deletadas com sucesso!";

}else{

	$str =  "Nenhuma conta duplicada encontrada.";

}



echo $str;

?>