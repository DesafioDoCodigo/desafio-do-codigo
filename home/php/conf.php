<?php
include"../../php/func.php";
//update conta admin
            if(!empty($_POST['id'])){

                                     $senha_l = mysqli_real_escape_string($mysql, $_POST['senha']);
                                     $login_l = mysqli_real_escape_string($mysql, $_POST['login']);
                                     $email_l = mysqli_real_escape_string($mysql, $_POST['email']);
                                     $nome_l = mysqli_real_escape_string($mysql, $_POST['nome']);   
                                     $apelido_l = mysqli_real_escape_string($mysql, $_POST['apelido']);  
                                     $telefone_l = mysqli_real_escape_string($mysql, $_POST['telefone']);
                                     $cidade_l = mysqli_real_escape_string($mysql, $_POST['cidade']);
                                     $escola_l = mysqli_real_escape_string($mysql, $_POST['escola']);
                                     $serie_l = mysqli_real_escape_string($mysql, $_POST['serie']);                               
                                     $id_l = mysqli_real_escape_string($mysql, $_POST['id']);
                                     $tutor_l = mysqli_real_escape_string($mysql, $_POST['tutor']);
                                     $deletar = mysqli_real_escape_string($mysql, $_POST['deletar']);
                                     echo "Dados alterados:";
                                     
                    if(!empty($senha_l)){
                                    echo " Senha: ".$senha_l;
                                    $sql = "UPDATE `users` SET `senha` = '$senha_l' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                    if(!empty($login_l)){
                                     echo " Login: ".$login_l;
                                     $sql = "UPDATE `users` SET `login` = '$login_l' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                    if(!empty($email_l)){
                                     echo " Email: ".$email_l;
                                     $sql = "UPDATE `users` SET `email` = '$email_l' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                    if(!empty($nome_l)){
                                     echo " Nome: ".$nome_l;
                                     $sql = "UPDATE `users` SET `nome` = '$nome_l' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                    if(!empty($apelido_l)){
                                     echo " Apelido: ".$apelido_l;
                                     $sql = "UPDATE `users` SET `apelido` = '$apelido_l' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                     if(!empty($telefone_l)){
                                     echo " Telefone: ".$telefone_l;
                                     $sql = "UPDATE `users` SET `telefone` = '$telefone_l' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                     if(!empty($cidade_l)){
                                     echo " Cidade: ".$cidade_l;
                                     $sql = "UPDATE `users` SET `cidade` = '$cidade_l' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                    if(!empty($escola_l)){
                                     echo " Escola: ".$escola_l;
                                     $sql = "UPDATE `users` SET `escola` = '$escola_l' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                    if(!empty($serie_l)){
                                     echo " S�rie: ".$serie_l;
                                     $sql = "UPDATE `users` SET `serie` = '$serie_l' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                    if(!empty($tutor_l)){
                                     echo " Tutor: ".$tutor_l;
                                     $sql = "UPDATE `users` SET `tutor` = '$tutor_l' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                    if(!empty($deletar)){
                                     echo " Tutor desvinculado com sucesso!";
                                     $sql = "UPDATE `users` SET `tutor` = '' WHERE `users`.`id` =$id_l;"; 
                                    mysqli_query($mysql, $sql) or die(mysqli_error());
                    };
                   
            atualiza_session();
            };
?>