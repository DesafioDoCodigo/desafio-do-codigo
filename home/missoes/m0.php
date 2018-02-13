<link rel="stylesheet" href="/desafio/home/css/missoes.css" />

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php
		$success = false;
		$dominios = array('gmail.com', 'fcv.edu.br', 'ctmsenai.com.br', 'sergioyamada.com.br');
		$dominio = pega_dominio($_SESSION['email']); //se o dominio cadastrado for gmail, chama a funçao "sucesso"
		$id = $_SESSION['id'];
$verifyDate = true;

$nasc = $_SESSION['nasc'];
if (preg_match("/^[0-9]{4}(-|\/)[0-9]{2}(-|\/)[0-9]{2}$/i", $nasc)){

	$time = strtotime(str_replace("/", "-", $nasc));
        $nasc = date("Y-m-d", $time > 0 ? $time : time() );

} else if (preg_match("/^[0-9]{2}(-|\/)[0-9]{2}(-|\/)[0-9]{4}$/i", $nasc)){

	$myDateTime = DateTime::createFromFormat('d/m/Y', str_replace("-", "/", $nasc));
	$time = strtotime($myDateTime->format('Y-m-d'));

        $nasc = date("Y-m-d", $time > 0 ? $time : time() );

} else {
	$verifyDate = false;
	$nasc = date("Y-m-d");
}


		$date = new DateTime($nasc);
		$now = new DateTime();
		$interval = $now->diff($date);

		if( $interval->y <= 13 ){
			$success = true;

		} else if( in_array($dominio, $dominios) ){
//		if($dominio == "gmail.com" OR $dominio == "fcv.edu.br" OR $dominio == "ctmsenai.com.br" OR $dominio == "sergioyamada.com.br"){
			$success = true;
		}else{	
			if(!empty($_POST)){
			$gmail = mysqli_real_escape_string($mysql, $_POST['gmail']);
			$gid = $_SESSION['id'];
			debug_js("Gmail: ".$gmail);
				$dominiop = pega_dominio($_POST['gmail']);
				if( in_array($dominiop, $dominios) ){	
//				if($dominiop == "gmail.com" OR $dominiop == "fcv.edu.br" OR $dominiop == "ctmsenai.com.br" OR $dominiop == "sergioyamada.com.br"){

					$sql = "UPDATE `users` SET `email` = '$gmail' WHERE `users`.`id` =$gid;"; 
			        mysqli_query($mysql, $sql) or die(mysqli_error());
			        atualiza_session();
			        debug_js("Inserido");
			        $success = true;

				}else{
					$erro_gmail = true;
					$formg = true;
		    	}

			}else{
			debug_js("Gmail nao encontrado");
			$formg = true;
			$pdisabled = "disabled";
			};	
		};

		if($formg){
			if($erro_gmail){
				echo'<div class="row"><div class="col-lg-12"><div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-info-circle"></i> O email inserido nao é da <i>Google</i>! </div></div></div>';
			}
			echo'<div id="content" ><form method="POST" action="">
					<p>Seu primeiro desafio é registrar uma conta google.<br/> 
                    Você pode precisar dela para cumprir algumas missões.<br/> Informe seu email do Gmail:</p>
                    <div class="gmail"> Se preferir NÃO fazer isso agora, deixe o campo vazio, clique em <kbd>ENVIAR</kbd>, que o botão <kbd>PRÓXIMA</kbd> será ativado.<br/>  </div> 

					<div class="form-group">
						<input type="text" class="form-control" name="gmail" id="gmail" placeholder="exemplo@gmail.com">
					</div>
                    <div class="gmail"> Se você ainda não tem uma conta Google <a href="https://accounts.google.com/signup?hl=pt-BR" target="_blank">Crie a sua AQUI!</a><br/>
                    Precisa de ajuda? <a href="https://www.youtube.com/watch?v=kK_U1h0HAW0"  target="_blank"> Assista ao tutorial</a><br/>
                   
                    </div> 
                    
					<button type="submit" class="btn btn-primary" id="submitg" name="submitg">Enviar</button>
			       </form>
                   </div>';
		}
		if($success){
		  echo '<script language="JavaScript"> 
			self.location="/desafio/1/"; 
			</script> ';
		}


	?>
</div>
