<?php


//post do form dessa pagina
$opcao = $_POST['cpu'];
$opcaogpu = $_POST['gpu'];
//se houver um submit
if ($_POST['cpu']) {
	//se a opção escolhida for a "c"
	if($opcao == "c"){
	//	if($opcaogpu == "e"){

		//credita 30 pontos
		mpoints("m_2", "30", $_SESSION['id']);
        upd_miss("2");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/3/"; 
			</script> ';
	//	}else{
	//		incorreta(2, "m2");
	//	}
	}else{
		//mostra aviso de resposta incorreta
		incorreta(1, "m2");
	}
}


?>

<link rel="stylesheet" href="/desafio/home/css/missoes.css" />
<div id="content" >
<div style="float: right;">
<p align="center">
<span class="btnstar btn-primarystar">
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i>
</span>
</p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/researcher-70x70.png" />
<?php
/*$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
 

echo "<img src='".$badges[2]['icons']['email']."'>";

*/?>
</p>
</div>
<p class="tituloatividade">
#02 Por Dentro de um Computador</p>

<div class="video"><iframe width="100%" height="100%"src="https://www.youtube.com/embed/AkFi90lZmXA?rel=0&cc_lang_pref=pt-BR&cc_load_policy=1&autoplay=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
<p>Assista ao vídeo “Por Dentro de um Computador”, entenda o que o seu computador faz com cada clique do mouse e responda ao quiz abaixo.</p>

<p>O Desafio do Código vai orientar seu caminho para vencer essa batalha e dominar as novas tecnologias e a Ciência da Computação.
</p><div style="clear: both;"></div>


<div class="tips">
<div class="row">
<p align="center"><b>* Ative a Legenda do Vídeo</b><br /><br /></p>
<div class="col-lg-6">
<img src="/desafio/home/img/iconlegenda.png" width="250px"/></div>

<div class="col-lg-6">
<iframe width="250" src="https://www.youtube.com/embed/U3uwMo1xwhg?rel=0" frameborder="0" allowfullscreen></iframe>
</div>
</div>
</div>

</div>
<div class="tips">
<div class="row">
<p align="center">

<b>* Vídeo Dublado</b><br />
<iframe width="250" src="https://www.youtube.com/embed/F92KTv-TWWI?rel=0" frameborder="0" allowfullscreen></iframe>
</p>
</div>
</div>
<div class="tips">
<div class="row">
<p><b>Visão Global</b></p>
<p>Este vídeo apresenta uma animação sobre como seu computador funciona. Os componentes essenciais do seu computador são os periféricos (incluindo o mouse), o subsistema de input/output 
(que controla o que e quanto de informação entra e sai), e a unidade central de processamento (o cérebro), bem como programas escritos por humanos e memória. Bettina Bair nos leva pelos caminhos que o seu computador faz com cada clique do mouse.
</p>
<p><b>Instruções</b><br />
1. Assista ao vídeo.<br />
2. Responda ao quiz.
</p>
<p><b>Atribuições</b><br /> Bettina Bair</p>
</div>
</div>
<div class="tips">
<div class="row">
<p><b>Recurso Adicional: EBook Online</b></p>
<p><a href="http://www.20thingsilearned.com/pt-BR" target="_blank">20 Lições que Aprendi sobre Navegadores e Web</a></p>
</div>
</div>

<div  class="quiz" >
<!--  action tem que estar em branco  -->
<form action="" method="POST" role="form">

	<legend><i class="fa fa-2x fa-pencil-square-o"></i> A CPU pode manipular ________ de instruções por segundo.</legend>
	
		<select name="cpu" id="input" class="form-control" required="required">
			<option value="a">Milhares</option>
			<option value="b">Milhões</option>
			<option value="c">Bilhões</option>
			<option value="d">Gazilhões</option>
			<option value="e">Nenhuma Delas</option>
		</select><p>&nbsp;</p>
    <!--     
	<legend><i class="fa fa-2x fa-pencil-square-o"></i> O trabalho da CPU é .</legend>
			<input type="radio" name="gpu" value="a"/> Armazenar Informação<br/>
			<input type="radio" name="gpu" value="b"/> Lidar com a entrada e saída de periféricos<br/>
			<input type="radio" name="gpu" value="c"/> Editar arquivos na memória    <br/>
			<input type="radio" name="gpu" value="d"/> Buscar e executar instruções<br/>
			<input type="radio" name="gpu" value="e"/> Todas as anteriores<br/>
<p>&nbsp;</p>-->

	<img src="/desafio/home/img/icons/robot-amarelo-r.png" width="10%" /> &nbsp;&nbsp;<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span> </button>
    <h4><strong>Se preferir, você pode pular esse desafio e voltar para responder depois.</strong></h4>
    <p style="font-size: 85%;"><br />*Esse desafio vale 30 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente concluído. </p>

</form>
</div>

