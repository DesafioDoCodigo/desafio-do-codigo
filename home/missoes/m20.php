<?php


//post do form dessa pagina
$opcao = $_POST['gpu'];

//se houver um submit
if ($_POST['gpu']) {
	//se a opção escolhida for a "c"
	if($opcao == "c"){
		

		//credita 30 pontos
		mpoints("m_20", "40", $_SESSION['id']);
        upd_miss("20");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
        	alert("Parabéns, Você conseguiu!!!\n\nGostamos da idéia de desmistificar um assunto e compartilhá-lo com outras pessoas.\n\nEsperamos que você tenha aproveitado essa jornada!");
            self.location="/desafio/home/"; 
			</script> ';
		}else{
			echo incorreta(1, "m20");
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
</span></p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/copernicus-70x70.png" />
<?php
/*
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[10]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#20 EdTecNova</p>
<div class="imagem"><a href="http://edtecnova.com.br" target="_blank"><img src="http://edtecnova.com.br/ebook/images/book-mockup.png" width="80%"/></a></div>
<p>&nbsp;</p>
<p>Aprenda mais sobre outros assuntos. Neste guia <a href="http://edtecnova.com.br" target="_blank" class="button-link">EdTecNova</a> reunimos mais de 90 plataformas gratuitas.</p>
<p>As ferramentas foram analisadas para entendermos como funcionam e para quem se aplicam. Priorizamos as plataformas gratuitas e n&atilde;o limitamos os recursos apenas em portugu&ecirc;s.</p>
<p> Explore as &aacute;reas: Educa&ccedil;&atilde;o &agrave; Dist&acirc;ncia, Criativas, Programa&ccedil;&atilde;o, Idiomas, Infogr&aacute;ficos, Concentra&ccedil;&atilde;o, Brainstorming, Pesquisas, Colaborativas e Educacionais.</p>
<p>&nbsp;</p>
<p align="center"><kbd>“Qual problema do mundo voc&ecirc; quer ajudar a resolver?”</kbd></p>
<div style="clear: both;"></div>
<div class="tips">
<p><b>Vis&atilde;o Global</b><br />
Nessa etapa voc&ecirc; vai conhecer um guia que re&uacute;ne plataformas online para voc&ecirc; aprender o que quiser. 
</p>
<p><b>Instru&ccedil;&otilde;es</b><br />
1. Clique <a href="http://edtecnova.com.br" target="_blank">neste link</a> para come&ccedil;ar a atividade.<br />
2. Explore as categorias das plataformas identificadas como &uacute;teis para o seu processo de aprendizagem.<br />
</p>
<p><b>Atribui&ccedil;&otilde;es</b><br /> SnVas</p>
</div>

<div  class="quiz" >
<form action="" method="POST" role="form">
<legend><i class="fa fa-2x fa-pencil-square-o"></i> Quais os te&oacute;ricos que mencionamos na introdu&ccedil;&atilde;o desse guia?</legend>	
<input type="radio" name="gpu" value="a"/> Rousseau, Pestallozzi, Froebel, Ferrer<br/>
<input type="radio" name="gpu" value="b"/> Vygotsky, Robin, Steiner, Montessori e Piaget<br/>
<input type="radio" name="gpu" value="c"/> Ken Robinson, Sugata Mitra, Salman Khan, Mitch Resnick<br/>
<input type="radio" name="gpu" value="d"/> Dewey, D&egrave;croly, Makarenko, Ferri&egrave;re, Cousinet<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar </span> </button>
    <p style="font-size: 85%;"><br />*Esse desafio vale 40 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente conclu&iacute;do. Voc&ecirc; pode pular esse desafio e voltar nele depois.</p>


    </form>
</div>
</div>



