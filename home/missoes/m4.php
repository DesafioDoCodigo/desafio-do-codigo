<?php


//post do form dessa pagina
$opcao = $_POST['video'];

//se houver um submit
if ($_POST['video']) {

	//se a opção escolhida for a "c"
	if($opcao == "c"){
		

		//credita 30 pontos
		mpoints("m_4", "20", $_SESSION['id']);
        upd_miss("4");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/5/"; 
			</script> ';
	}else{
		incorreta(1, "m4");
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
			</span>
		</p>
		<p align="center">
			<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/guru-70x70.png" />
			<?php
			/*$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
			$badges = json_decode($resposta, true);
			echo "<img src='".$badges[47]['icons']['email']."'>";
			*/?>
		</p>

	</div>
	<p class="tituloatividade">#04 Você pode aprender qualquer coisa</p>

	<div class="video">
		<iframe width="100%" height="100%" src="https://www.youtube.com/embed/JC82Il2cjqA?rel=0&amp;showinfo=0&cc_lang_pref=pt-BR&cc_load_policy=1&autoplay=1" frameborder="0" allowfullscreen></iframe>
	</div>
    <p>&nbsp;</p>
	<p>Assista ao vídeo “Você pode aprender qualquer coisa” e responda ao quiz abaixo.</p>
    <p>Estudantes que acreditam que a sua capacidade e inteligência pode crescer e mudar, também conhecida como mentalidade de crescimento, superam aqueles que pensam que a sua capacidade e inteligência são fixas. 
    </p>
	<p align="center"><kbd>“Muitas das verdades que temos dependem de nosso ponto de vista.”</kbd> </p>
	<div style="clear: both;"></div>
    <div class="tips">
<p align="center"><b>* Ative a Legenda do Vídeo</b></p>
<div style="width: 50%; float: left;">
<img src="/desafio/home/img/iconlegenda.png" width="200" />
</div>
<iframe width="40%" height="117" src="https://www.youtube.com/embed/U3uwMo1xwhg?rel=0" frameborder="0" allowfullscreen></iframe>
</div>
	<div class="tips">
		<p><b>Visão Global</b><br />
		Esse vídeo apresenta um resumo sobre como aprendemos.
		</p>
		<p><b>Instruções</b><br />
		1. Assista ao vídeo.<br />
		2. Responda ao quiz.
		</p>
	</div>
	<div class="quiz"  >
	<!--  action tem que estar em branco  -->
		<form action="" method="POST" role="form">
			<legend>
				<i class="fa fa-2x fa-pencil-square-o"></i> Qual é o nome que aparece na assinatura no final do vídeo.
			</legend>
			
			<select name="video" id="input" class="form-control" required="required">
				<option value="a">Code.org</option>
				<option value="b">Microsoft</option>
				<option value="c">Khan</option>
				<option value="d">Kogama</option>
				<option value="e">Nenhuma Delas</option>
			</select>
			<p>&nbsp;</p>
			<img src="/desafio/home/img/icons/robot-amarelo-r.png" width="10%" />
			 &nbsp;&nbsp;
			<button type="submit" class="btn btn-primary">
				<span class="enviar">Enviar Resposta</span>
                 
			</button>
            <p style="font-size: 85%;"><br />*Esse desafio vale 20 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente concluído. Você pode pular esse desafio e voltar nele depois.</p>


		</form>
	</div>

</div>
