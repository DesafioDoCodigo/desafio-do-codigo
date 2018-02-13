<?php


//post do form dessa pagina
$opcao = $_POST['gpu'];

//se houver um submit
if ($_POST['gpu']) {
	//se a opção escolhida for a "c"
	if($opcao == "c"){
		

		//credita 30 pontos
		mpoints("m_15", "90", $_SESSION['id']);
        upd_miss("15");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/16/"; 
			</script> ';
		}else{
			incorreta(1, "m15");
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
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/hour_of_webpages_badge-70x70.png" />
<?php
/*
<?php
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[40]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#15 Scratch</p>
<div class="video"><iframe src="https://player.vimeo.com/video/65583694?autoplay=0&title=0&byline=0&portrait=0" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
<p>&nbsp;</p>
<p>Agora que voc&ecirc; completou o curso introdut&oacute;rio j&aacute; pode testar seus conhecimentos.</p>
<p>Assista ao vídeo, acesse o <a href="https://goo.gl/XgPq7q" target="_blank" class="button-link">Scratch</a>, crie uma conta e comece seu próprio jogo com os tutoriais abaixo.</p>

<p>Compartilhe uma anima&ccedil;&atilde;o ou um jogo criado por voc&ecirc; na nossa <a href="https://www.facebook.com/codewarsbr" target="_blank">Fan Page</a>.</p><div style="clear: both;"></div>
<div style="clear: both;"></div>
<div class="tips">
<p><b>Vis&atilde;o Global</b><br />
Nesta etapa voc&ecirc; vai conhecer uma plataforma que permite criar seus próprios jogos e animações utilizando uma linguagem de programação com blocos. 
</p>
<p><b>Instru&ccedil;&otilde;es</b><br />
1. Clique <a href="https://goo.gl/XgPq7q" target="_blank">nesse link</a> para abrir o Scratch em uma nova aba.<br />
2. Crie uma conta no Scratch para salvar seus projetos.<br />
3. Crie um jogo ou uma animação e compartilhe na Fan Page.<br />
4. Volte para a Miss&atilde;o 15 e responda ao quiz.
</p>
<p><b>Atribui&ccedil;&otilde;es</b><br /> Mitchel Resnick<br /> Progama&ecirc;!<br /> CS First<br /> Scratch Brasil</p>
</div>
<div class="quiz" ><p align="center">TUTORIAL - Programa&ecirc;! <br />
<iframe width="80%" height="350" src="https://www.youtube.com/embed/videoseries?list=PLriYCqAbxXmAK682Rb5GkFq7sMKE9qNAi" frameborder="0" allowfullscreen></iframe>
</p>
</div>
<div class="quiz" ><p align="center">TUTORIAL - CS First <br />
<iframe width="80%" height="350" src="https://www.youtube.com/embed/videoseries?list=PLriYCqAbxXmBMoFSXsDPJFWD84wyaB8Zg&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
<p> Remix <a href="http://scratch.mit.edu/projects/20619111/#editor" target="_blank">Racing Game</a></p>
<p> Remix <a href="http://scratch.mit.edu/projects/19573180/#editor" target="_blank">Maze Game</a></p>
<p> Remix <a href="https://scratch.mit.edu/projects/19646592/#editor" target="_blank">Platform Game</a></p>
<p> Crie um <a href="https://scratch.mit.edu/projects/editor/?tip_bar=getStarted" target="_blank">Escape Game</a></p>
<p> Mais <a href="http://www.scratchbrasil.net.br/index.php/materiais/tutoriais.html" target="_blank">Tutoriais</a></p>
</p>
</div>

<div class="quiz" >
<form action="" method="POST" role="form">
<legend><i class="fa fa-2x fa-pencil-square-o"></i> Qual instituição criou o Scratch?</legend>	
<input type="radio" name="gpu" value="a"/> Harvard<br/>
<input type="radio" name="gpu" value="b"/> Stanford<br/>
<input type="radio" name="gpu" value="c"/> MIT<br/>
<input type="radio" name="gpu" value="d"/> ITA<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span> </button>
    <p style="font-size: 85%;"><br />*Esse desafio vale 90 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente concluído. Você pode pular esse desafio e voltar nele depois.</p>


    </form>
</div>
</div>
