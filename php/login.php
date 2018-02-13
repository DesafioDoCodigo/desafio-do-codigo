<?php
include 'func.php';
if($_POST){
    if(!verifica_login(mysqli_real_escape_string($mysql, $_POST['login']), mysqli_real_escape_string($mysql, $_POST['senha']))){
        echo "Erro AJAX";
    }
}

?>