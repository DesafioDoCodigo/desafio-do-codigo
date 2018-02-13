<?php


//post do form dessa pagina
$opcao = $_POST['gpu'];

//se houver um submit
if ($_POST['gpu']) {
	//se a opção escolhida for a "c"
	if($opcao == "a"){
		

		//credita 30 pontos
		mpoints("m_16", "80", $_SESSION['id']);
        upd_miss("16");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/17/"; 
			</script> ';
		}else{
			incorreta(1, "m16");
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
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i>
</span></p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/hour_of_databases_badge-70x70.png" />&nbsp;
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/hour_of_drawing_badge-70x70.png" />&nbsp;
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/hour_of_drawing_blocks_badge-70x70.png" />
<?php
/*
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
 

echo "<img src='".$badges[37]['icons']['email']."'>&nbsp;<img src='".$badges[38]['icons']['email']."'>&nbsp;<img src='".$badges[39]['icons']['email']."'>";

*/?></p>

</div>
<p class="tituloatividade">#16 Khan Academy</p>

<?php
$resposta = file_get_contents('http://www.khanacademy.org//api/v1/videos/welcome-hour-of-code');
$obj = json_decode($resposta);

//echo "<a href='".$obj->download_urls['mp4'].">" . $obj->download_urls['mp4'] . "</a>";
echo "<div class='video'><iframe src='//www.youtube.com/embed/".$obj->youtube_id."?rel=0&amp;showinfo=0&cc_lang_pref=pt-BR&cc_load_policy=1&autoplay=1' frameborder='0' allowfullscreen width='100%' height='100%'></iframe></div>";

?>
<p>&nbsp;</p>
<p>Conhe&ccedil;a a &aacute;rea de programa&ccedil;&atilde;o da<br /> <a href="https://pt.khanacademy.org/hourofcode" target="_blank" class="button-link"> Khan Academy</a> e desenvolva mais um programa de computador.</p>

<p>Quando estiver pronto, pe&ccedil;a avalia&ccedil;&atilde;o do seu tutor, que deve estar cadastrado. Caso não esteja, clique no seu perfil, na aba Tutores e adicione o c&oacute;digo da turma <kbd>BJ82789W</kbd>.
</p>

<div style="clear: both;"></div>
<div class="tips">
<p><b>Vis&atilde;o Global</b><br />
Pratique programa&ccedil;&atilde;o na Khan. S&atilde;o tr&ecirc;s tutoriais com conceitos de desenho, banco de dados e website. 
</p>
<p><b>Instru&ccedil;&otilde;es</b><br />
1. Clique <a href="https://pt.khanacademy.org/hourofcode" target="_blank">nesse link</a> para come&ccedil;ar a atividade.<br />
2. Fa&ccedil;a o login com sua conta para registrar seu progresso, confirme se cadastrou a turma BJ82789W.<br />
3. Pratique programa&ccedil;&atilde;o, crie seu programa e pe&ccedil;a avalia&ccedil;&atilde;o do tutor.<br />
4. Volte para a Miss&atilde;o 16 e responda ao quiz.
</p>
<p><b>Atribui&ccedil;&otilde;es</b><br /> Khan Academy</p>
</div>
<div class="quiz" >
<form action="" method="POST" role="form">
<legend><i class="fa fa-2x fa-pencil-square-o"></i> Qual a linguagem de programa&ccedil;&atilde;o que a Khan usa na hora do c&oacute;digo?</legend>	
<input type="radio" name="gpu" value="a"/> Javascript<br/>
<input type="radio" name="gpu" value="b"/> Ruby<br/>
<input type="radio" name="gpu" value="c"/> PHP<br/>
<input type="radio" name="gpu" value="d"/> Python<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span> </button>
   <p style="font-size: 85%;"><br />*Esse desafio vale 80 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente concluído. Você pode pular esse desafio e voltar nele depois.</p>

    </form>
</div>
</div>
