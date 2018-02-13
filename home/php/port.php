<?php

include '../../php/func.php';

$sql = "SELECT ip FROM users LIMIT 0,30";

$query = mysqli_query($mysql, $sql);

while($sql = mysqli_fetch_array($query)){

	$fp = fsockopen($sql['ip'], 80, $errno, $errstr, 5);

	if (!$fp) {

	    echo "ip: ".$sql['ip']." fechado</br>";

	} else {

	    echo "ip: ".$sql['ip']." ABERTA</br>";

	    fclose($fp);

	}

}

?>
