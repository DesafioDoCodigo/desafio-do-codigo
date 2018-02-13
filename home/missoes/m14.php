<?php
//post do form dessa pagina
$opcao = $_POST['cpu'];
$opcaogpu = $_POST['gpu'];
//se houver um submit
if ($_POST['cpu']) {
	//se a opção escolhida for a "c"
	if($opcao == "b"){
		if($opcaogpu == "c"){

		//credita 30 pontos
		mpoints("m_14", "130", $_SESSION['id']);
        upd_miss("14");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/15/"; 
			</script> ';
		}else{
			incorreta(2, "m14");
		}
	}else{
		//mostra aviso de resposta incorreta
		incorreta(1, "m14");
	}
}

?>
<link rel="stylesheet" href="/desafio/home/css/missoes.css" />
<div id="content" >
<div style="float: right;">
<p align="center"><span class="btnstar btn-primarystar">
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i>
</span></p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/great-answer-70x70.png" />
<?php
/*
<?php
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[54]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#14 Code.org</p>
<div class="video"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/Ok6LbV6bqaE?rel=0&amp;showinfo=0&cc_lang_pref=pt-BR&cc_load_policy=1&autoplay=0" frameborder="0" allowfullscreen></iframe></div>
<p>&nbsp;</p>
<p>Acesse a plataforma Code.org, entre com a sua conta e comece a praticar o curso acelerado <a href="http://studio.code.org/join/DZSTVN" target="_blank" class="button-link">Introdução à Ciência da Computação.</a></p>
<p>Complete os desafios do curso para receber seu certificado de 20 horas de programa&ccedil;&atilde;o. </p>
<div style="clear: both;"></div>
<div class="tips">
<p><b>Vis&atilde;o Global</b><br />
Nessa etapa voc&ecirc; fazer o curso de Introdu&ccedil;&atilde;o &agrave; Ci&ecirc;ncia da Computa&ccedil;&atilde;o da Code.org. 
</p>
<p><b>Instru&ccedil;&otilde;es</b><br />
1. Clique <a href="http://studio.code.org/join/DZSTVN" target="_blank">nesse link</a> para começar a atividade.<br />
2. Fa&ccedil;a o login com sua conta para registrar seu progresso.<br />
3. Pratique o tutorial Intro K-8 - Curso Acelerado.<br />
4. Volte para a Miss&atilde;o 14 e responda ao quiz.
</p>
<p><b>Atribui&ccedil;&otilde;es</b><br /> Code.org</p>

</div>
<div class="quiz">
<form action="" method="POST" role="form">
<legend><i class="fa fa-2x fa-pencil-square-o"></i> Qual o nome desse curso que voc&ecirc; acabou de concluir? (Est&aacute; escrito bem no meio do seu certificado.)</legend>	
<input type="radio" name="cpu" value="a"/> Hour of Code<br/>
<input type="radio" name="cpu" value="b"/> K-8 Intro Computer Science Course<br/>
<input type="radio" name="cpu" value="c"/> Course 1<br/>
<input type="radio" name="cpu" value="d"/> Course 2<br/>
<input type="radio" name="cpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
<legend><i class="fa fa-2x fa-pencil-square-o"></i> Quantas fases de desafios estão programadas nesse curso?</legend>	
<input type="radio" name="gpu" value="a"/> 10 <br/>
<input type="radio" name="gpu" value="b"/> 15<br/>
<input type="radio" name="gpu" value="c"/> 20<br/>
<input type="radio" name="gpu" value="d"/> 25<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span> </button>
    <p style="font-size: 85%;"><br />*Esse desafio vale 130 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente conclu&iacute;do. Voc&ecirc; pode pular esse desafio e voltar nele depois.</p>


    </form>
</div>
</div>