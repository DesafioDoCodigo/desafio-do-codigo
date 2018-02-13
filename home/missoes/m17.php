<?php


//post do form dessa pagina
$opcao = $_POST['gpu'];

//se houver um submit
if ($_POST['gpu']) {
	//se a opção escolhida for a "c"
	if($opcao == "d"){
		

		//credita 30 pontos
		mpoints("m_17", "90", $_SESSION['id']);
        upd_miss("17");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/18/"; 
			</script> ';
		}else{
			incorreta(1, "m17");
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
</span></p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/power-hour-70x70.png" />
<?php
/*
<?php
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[13]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#17 APP Inventor</p>
<div class="imagem"><a href="http://appinventor.mit.edu/explore/hour-of-code.html" target="_blank"><img src="http://appinventor.mit.edu/explore/sites/all/files/hourofcode/csedweek_ai_lg.png"/></a></div>

<p>Teste suas novas habilidades criando um aplicativo para dispositivos m&oacute;veis nessa plataforma
<a href="http://appinventor.mit.edu/explore/hour-of-code.html" target="_blank" class="button-link">APP Inventor</a> com os tutoriais da Maratona de Aplicativos.</p>
<p>&nbsp;</p>
<p>Existem outras op&ccedil;&otilde;es de plataformas para voc&ecirc; criar seus projetos, conhe&ccedil;a tamb&eacute;m 
<a href="https://thimble.mozilla.org/pt-BR/?ref=webmaker.org" target="_blank" class="button-link">WebMaker</a>, 
<a href="https://www.touchdevelop.com/" target="_blank" class="button-link">TouchDevelop</a>,
 <a href="https://developer.android.com/sdk/index.html" target="_blank" class="button-link">Android Studio</a>.</p>
<div style="clear: both;"></div>
<div class="tips">
<p><b>Vis&atilde;o Global</b><br />
Nessa etapa voc&ecirc; vai conhecer uma plataforma que permite criar aplicativos para dispositivos Android. 
</p>
<p><b>Instru&ccedil;&otilde;es</b><br />
1. Clique <a href="http://appinventor.mit.edu/explore/hour-of-code.html" target="_blank">neste link</a> para come&ccedil;ar a atividade.<br />
2. Fa&ccedil;a o login com sua conta Google para salvar seus projetos.<br />
3. Assista aos tutoriais da Maratona de Aplicativos e crie o seu.<br />
4. Volte para a Miss&atilde;o 17 e responda ao quiz.
</p>
<p><b>Atribui&ccedil;&otilde;es</b><br /> App Inventor<br /> WebMaker<br /> TouchDevelop<br /> Android Studio<br /> FIAP</p>
</div>
<div class="quiz" ><p align="center">TUTORIAL - Maratona de Aplicativos <br />
<iframe width="60%" height="315" src="https://www.youtube.com/embed/gv2dqoHjyHw?list=PLriYCqAbxXmDib7o6cUYfsIl4hMPieuR4&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
<p align="center"> Comece com o Jogo da Borracha</p>
</div>



<div class="quiz" ><p align="center">TUTORIAL - Maratona de Aplicativos 2015<br />
<iframe width="60%" height="315" src="https://www.youtube.com/embed/3A0Ze6Y_fnk?list=PLe9iGEQ2t4s6aHM1jUt-F44IaAb9tichR&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
<p align="center"> Participe da  <a href="http://www.maratonadeaplicativos.com.br/" target="_blank" class="button-link">Maratona de Aplicativos</a></p>
</div>
<div class="quiz" >
<form action="" method="POST" role="form">
<legend><i class="fa fa-2x fa-pencil-square-o"></i> Qual institui&ccedil;&atilde;o criou o App Inventor?</legend>	
<input type="radio" name="gpu" value="a"/> Harvard<br/>
<input type="radio" name="gpu" value="b"/> Stanford<br/>
<input type="radio" name="gpu" value="c"/> ITA<br/>
<input type="radio" name="gpu" value="d"/> MIT<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span> </button>
  <p style="font-size: 85%;"><br />*Esse desafio vale 90 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente conclu&iacute;do. Voc&ecirc; pode pular esse desafio e voltar nele depois.</p>

    </form>
</div>
</div>

