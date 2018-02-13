<?php


//post do form dessa pagina
$opcao = $_POST['cpu'];
$opcaogpu = $_POST['gpu'];
//se houver um submit
if ($_POST['cpu']) {

	//confere se fez login, e se a pontuação é maior que 2500000
	//***********************************************
	if($khan_api && $khan_api['points'] >= "50000"){
		//***********************************************
		//se a opção escolhida for a "c"
		if($opcao == "c"){
			if($opcaogpu == "a"){

			//credita 30 pontos
			mpoints("m_7", "90", $_SESSION['id']);
	        upd_miss("7");
			//vai p/ proxima missão
			echo '<script language="JavaScript"> 
				self.location="/desafio/8/"; 
				</script> ';
			}else{
				incorreta(2, "m7");
			}
		}else{
			//mostra aviso de resposta incorreta
			incorreta(1, "m7");
		}
	}else{
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Você não tem a pontuação necessária (50.000) na Khan Academy para continuar, ou, não se logou na Khan Academy (Botão acima)</div>';
	}

}
?>
<link rel="stylesheet" href="/desafio/home/css/missoes.css" />
<div id="content" >
<div style="float: right;"><p align="center">
<span class="btnstar btn-primarystar">
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> </span>
</p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/five-is-alive-70x70.png" />
<?php
/*
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[17]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#07 Khan Academy</p>
<div class="video"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/r2ZTytGkpm8?rel=0&amp;showinfo=0&cc_lang_pref=pt&cc_load_policy=1&autoplay=1" frameborder="0" allowfullscreen></iframe></div>

<p>Sua missão agora é conquistar 50.000 (Cinquenta mil) pontos de energia na Khan Academy.</p>
<p>Acesse a plataforma <a class="button-link" href="http://goo.gl/n08g2t" target="_blank">Khan Academy</a>, entre com a sua conta e comece a jogar. </p>
<p>Confirme se você se cadastrou na turma <kbd>BJ82789W</kbd> para acompanharmos o seu desempenho e validarmos os seus pontos.
</p>
<p>&nbsp;</p>
<p align="center"><kbd>“O seu foco é a sua realidade.”</kbd></p><div style="clear: both;"></div>
<div style="clear: both;"></div>
<div class="tips">
<p><b>Visão Global</b><br />
Pratique matemática. Você pode continuar em Fundamentos da Matemática e ir avançando. Você também pode procurar um assunto específico que queira estudar. 
</p>
<p><b>Instruções</b><br />
1. Clique <a href="http://goo.gl/n08g2t" target="_blank">neste link</a> para começar a atividade.<br />
2. Faça o login com sua conta para registrar seu progresso, confirme se cadastrou a turma BJ82789W.<br />
3. Continue a praticar Fundamentos da Matemática até conseguir 50.000 pontos de energia.<br />
4. Volte para a Missão 7 e responda ao quiz.
</p>
<p><b>Atribuições</b><br /> Khan Academy</p>
</div>
<div class="quiz">
<!--  action tem que estar em branco  -->
<form action="" method="POST" role="form">

	<legend><i class="fa fa-2x fa-pencil-square-o"></i> Qual o nome do botão que você pode clicar durante os desafios que ajusta o conteúdo que você deve praticar primeiro para dominar os assuntos.</legend>
	
		<select name="cpu" id="input" class="form-control" required="required">
			<option value="a">Quero uma Dica</option>
			<option value="b">Verificar Resposta</option>
			<option value="c">Ainda Não Aprendi Isso</option>
			<option value="d">Preciso de Ajuda</option>
			<option value="e">Nenhuma Delas</option>
		</select><p>&nbsp;</p>
	<legend><i class="fa fa-2x fa-pencil-square-o"></i> Qual o nome da medalha de meteoro que você ganha ao conquistar 10.000 pontos de energia?</legend>	
<input type="radio" name="gpu" value="a"/> Dez à quarta potência<br/>
<input type="radio" name="gpu" value="b"/> Progredindo<br/>
<input type="radio" name="gpu" value="c"/> Nota dez<br/>
<input type="radio" name="gpu" value="d"/> Ganhando Força<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span></button>
<p style="font-size: 85%;"><br />*Esse desafio vale 90 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente concluído. Você pode pular esse desafio e voltar nele depois.</p>

</form>
</div>
</div>