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
		mpoints("m_18", "60", $_SESSION['id']);
        upd_miss("18");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/19/"; 
			</script> ';
		}else{
			incorreta(2, "m18");
		}
	}else{
		//mostra aviso de resposta incorreta
		incorreta(1, "m18");
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
</span></p>
<p align="center">
<img src="https://desafiodocodigo.com.br/desafio/home/img/badges-khan/html_css_mastery_badge-70x70.png" />
<?php
/*
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[41]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#18 Linguagens de Programação</p>
<div class="imagem"><a href="https://www.w3schools.com/" target="_blank"><img src="https://desafiodocodigo.com.br/desafio/home/img/w3schools.png"/></a></div>

<p>Acesse <a href="http://goo.gl/tqF1Dv" target="_blank" class="button-link">W3Schools</a> e escolha uma linguagem de programa&ccedil;&atilde;o para voc&ecirc; aprender.</p>
<p>Para se aprofundar nas linguagens conhe&ccedil;a o que est&aacute; dispon&iacute;vel em 
<a href="https://www.codeschool.com/courses" target="_blank" class="button-link">CodeSchool</a>, <a href="https://br.udacity.com/course/intro-to-html-and-css--ud304" target="_blank" class="button-link">Udacity</a> e <a href="https://www.codecademy.com/pt-BR/learn/all" target="_blank" class="button-link">Codecademy</a>.
<p>Estude em Harvard! Introdução à Ciência da Computação, acesse conteúdo completo e gratuito em <a href="http://cs50.harvard.edu" target="_blank">cs50.harvard.edu</a></p>

<p>&nbsp;</p>
<p align="center"><kbd>“Se tão poderoso você é, por que fugir?”</kbd></p>
<div style="clear: both;"></div>


<div class="tips">
<p><b>Vis&atilde;o Global</b><br />
Nesta etapa voc&ecirc; vai conhecer plataformas que permitem estudar diversas linguagens de programa&ccedil;&atilde;o. 
</p>
<p><b>Instru&ccedil;&otilde;es</b><br />
1. Clique <a href="https://www.w3schools.com/" target="_blank">neste link</a> para come&ccedil;ar a atividade.<br />
2. Crie uma conta para registrar o seu progresso.<br />
3. Escolha uma linguagem e comece a praticar.<br />
4. Volte para a Miss&atilde;o 18 e responda ao quiz.
</p>
<p><b>Atribui&ccedil;&otilde;es</b><br />  W3Schools, Codecademy, Udacity e CodeSchool</p>
<p><b>Conte&uacute;do Adicional</b><br /> Harvard</p></div>
<div class="quiz" >
<!--  action tem que estar em branco  -->
<form action="" method="POST" role="form">

	<legend><i class="fa fa-2x fa-pencil-square-o"></i> Quais linguagens de programa&ccedil;&atilde;o voc&ecirc; pode aprender na Codecademy?</legend>
	
<input type="radio" name="cpu" value="a"/> HTLM & CSS, SQL, JavaScript, PHP, CSS, Bootstrap<br/>
<input type="radio" name="cpu" value="b"/> Python, PHP, Javascript, Ruby, Html & CSS<br/>
<input type="radio" name="cpu" value="c"/> Pascal, Java, SQL, Bootstrap, Objective-C, Delphi<br/>
<input type="radio" name="cpu" value="d"/> Basic, Cobol, C++, Fortran, Perl, Delphi<br/>
<input type="radio" name="cpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<legend><i class="fa fa-2x fa-pencil-square-o"></i> Quais linguagens de programa&ccedil;&atilde;o voc&ecirc; pode aprender na W3School?</legend>	
<input type="radio" name="gpu" value="a"/> Basic, Cobol, C++, Fortran, Perl, Delphi<br/>
<input type="radio" name="gpu" value="b"/> Python, PHP, Javascript, Ruby, Html & CSS<br/>
<input type="radio" name="gpu" value="c"/> HTLM & CSS, SQL, JavaScript, PHP, CSS, Bootstrap<br/>
<input type="radio" name="gpu" value="d"/> Pascal, Java, SQL, Bootstrap, Objective-C, Delphi<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span> </button>
    <p style="font-size: 85%;"><br />*Esse desafio vale 60 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente conclu&iacute;do. Voc&ecirc; pode pular esse desafio e voltar nele depois.</p>

</form>
</div>
</div>


