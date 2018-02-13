<?php

//post do form dessa pagina
$opcao = $_POST['cpu'];
$opcaogpu = $_POST['gpu'];
//se houver um submit
if ($_POST['cpu']) {
	//se a opção escolhida for a "c"
	if($opcao == "e"){
		if($opcaogpu == "d"){

		//credita 30 pontos
		mpoints("m_19", "40", $_SESSION['id']);
        upd_miss("19");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/20/"; 
			</script> ';
		}else{
			incorreta(2, "m19");
		}
	}else{
		//mostra aviso de resposta incorreta
		incorreta(1, "m19");
	}
}

?>
<link rel="stylesheet" href="/desafio/home/css/missoes.css" />
<div id="content" >
<div style="float: right;"><p align="center"><span class="btnstar btn-primarystar">
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i>
</span></p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/html_css_mastery_badge-70x70.png" />
<?php
/*
<?php
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[27]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#19 FreeCodeCamp</p>
<div class="imagem"><a href="https://www.freecodecamp.com/" target="_blank"><img src="http://desafiodocodigo.com.br/desafio/home/img/freecodecamp.png"/></a></div>

<p>Acesse <a href="http://freecodecamp.com/" target="_blank" class="button-link">FreeCodeCamp</a> e obtenha sua certificação em Front End Development.</p>
<p>Para encontrar mais conteúdo gratuito para se aprofundar nas linguagens de programação, conhe&ccedil;a tamb&eacute;m o que est&aacute; dispon&iacute;vel em 
<a href="http://thecodeplayer.com/" target="_blank">TheCodePlayer</a>, 
<a href="http://learn.shayhowe.com/" target="_blank">HTMLeCSS</a>, 
<a href="https://www.codingame.com/" target="_blank">CodeinGame</a>,
<a href="https://www.codehunt.com/" target="_blank" >CodeHunt</a>, 
<a href="http://www.programmr.com/" target="_blank">Programmr</a>, 
<a href="https://codelabs.developers.google.com/" target="_blank">Codelabs</a>, 
<a href="http://codingwithchrome.foo/" target="_blank">Coding with Chrome</a>, 
<a href="https://www.madewithcode.com/projects/" target="_blank">Made w/ Code</a>, 
<a href="http://ocw.mit.edu/courses/intro-programming/" target="_blank">MIT Open Courseware</a>, e aprenda a 
<a href="https://www.microsoftvirtualacademy.com/pt-pt/training-courses/crie-seu-jogo-para-kinect-14184?l=" target="_blank">criar um jogo para Kinect</a>, 
e <a href="http://codewars.com" target="_blank">CodeWars.com</a>. 
Quando estiver fera em Javascript, voc&ecirc; pode ainda disputar o <a href="https://codefights.com/" target="_blank">codefights</a>.
</p>
<p>Se você estiver interessado em saber mais sobre a Internet das Coisas, IoT (Internet of Things), pode começar com os recursos do <a href="https://www.tinkercad.com" target="_blank">Tinkercad</a>, do <a href="http://blocklyduino.github.io/BlocklyDuino/blockly/apps/blocklyduino/" target="_blank">BlocklyDuino</a> e com a edição brasileira do 'Comic Book' <a href="https://iotcomicbook.files.wordpress.com/2013/10/iot_comic_book_special_br.pdf" target="_blank">THE INTERNET OF THINGS</a>.</p>

<div style="clear: both;"></div>


<div class="tips">
<p><b>Vis&atilde;o Global</b><br />
Nesta etapa voc&ecirc; vai conhecer plataformas que permitem estudar diversas linguagens de programa&ccedil;&atilde;o. 
</p>
<p><b>Instru&ccedil;&otilde;es</b><br />
1. Clique <a href="http://freecodecamp.com/" target="_blank">neste link</a> para come&ccedil;ar a atividade.<br />
2. Crie uma conta para registrar o seu progresso.<br />
3. Comece a aprender.<br />
4. Volte para a Miss&atilde;o 19 e responda ao quiz.
</p>
<p><b>Atribui&ccedil;&otilde;es</b><br /> FreeCodeCamp, CodeWars, CodeFights, TheCodePlayer, Shay Howe, CodeinGame, CodeHunt, Programmr, Google, MIT, Microsoft Virtual Academy, Tinkercad, BlocklyDuino, Garoa Hacker Club, Alexandra Institute</p>
</div>
<div class="quiz" >
<!--  action tem que estar em branco  -->
<form action="" method="POST" role="form">

	<legend><i class="fa fa-2x fa-pencil-square-o"></i> O que voc&ecirc; pode aprender no FreeCodeCamp?</legend>
	
<input type="radio" name="cpu" value="a"/> HTLM & CSS, SQL, JavaScript, PHP, CSS, Bootstrap<br/>
<input type="radio" name="cpu" value="b"/> Python, PHP, Javascript, Ruby, Html & CSS<br/>
<input type="radio" name="cpu" value="c"/> Pascal, Java, SQL, Bootstrap, Objective-C, Delphi<br/>
<input type="radio" name="cpu" value="d"/> Basic, Cobol, C++, Fortran, Perl, Delphi<br/>
<input type="radio" name="cpu" value="e"/> HTML5, CSS3, JavaScript, Database, Git&GitHub, Node.js, React.js, D3.js<br/>
<p>&nbsp;</p>
	<legend><i class="fa fa-2x fa-pencil-square-o"></i> Qual a carga horária da certificação em Front End Development no FreeCodeCamp?</legend>	
<input type="radio" name="gpu" value="a"/> 2.080<br/>
<input type="radio" name="gpu" value="b"/> 800<br/>
<input type="radio" name="gpu" value="c"/> 80<br/>
<input type="radio" name="gpu" value="d"/> 400<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span> </button>
    <p style="font-size: 85%;"><br />*Esse desafio vale 60 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente conclu&iacute;do. Voc&ecirc; pode pular esse desafio e voltar nele depois.</p>

</form>
</div>
</div>
