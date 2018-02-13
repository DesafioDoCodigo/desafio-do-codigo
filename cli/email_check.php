<?php
/**
 * Created by PhpStorm.
 * User: tiagogouvea
 * Date: 13/02/18
 * Time: 10:26
 */

require '../php/func.php';

$sql = "select * from users";

$sql = mysqli_query($mysql, $sql,MYSQLI_USE_RESULT ) or die(mysqli_error());

while ($row = $sql->fetch_assoc()) {
    $email = filter_var($row['email'], FILTER_SANITIZE_EMAIL);
    if (!$email){
        echo "Invalido: ".$row['email']."<br>";
    }
}

die("Fim");

