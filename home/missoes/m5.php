<?php


//post do form dessa pagina
$opcao = $_POST['cpu'];
$opcaogpu = $_POST['gpu'];
//se houver um submit
if ($_POST['cpu']) {
//essa linha está com problema, pois não reconhece o coach!!!
//if($khan_api && in_array("http://facebookid.khanacademy.org/100000631422622", $khan_api['coaches'])){	
	//se a opção escolhida for a "c"
	if($opcao == "d"){
		if($opcaogpu == "b"){

			//credita 30 pontos
			mpoints("m_5", "50", $_SESSION['id']);
	        upd_miss("5");
			//vai p/ proxima missão
			echo '<script language="JavaScript"> 
				self.location="/desafio/6/"; 
				</script> ';
		}else{
			incorreta(2, "m5");
		}
	}else{
		//mostra aviso de resposta incorreta
		incorreta(1, "m5");
	}
 // }else{
 // 	echo '<div class="alert alert-danger alert-dismissible" role="alert">
 // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 //   Você não entrou na turma PEM7VJ na Khan Academy, ou, não se logou na Khan Academy (Botão acima)</div>';
 // }
}


?>
<link rel="stylesheet" href="/desafio/home/css/missoes.css" />

<div id="content" >
<div style="float: right; margin-left: 25%;">
<p align="center">
<span class="btnstar btn-primarystar">
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
</span></p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/math-pretest-champion-70x70.png" />
<?php
/*
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[8]['icons']['email']."'>";
*/?>
</p>

</div>
<p class="tituloatividade">#05 Khan Academy</p>
<div class="imagem"><a href="http://goo.gl/n08g2t" target="_blank"><img src="http://soraianovaes.com/edtech/tecnologias/images/sites/KhanAcademy.png"/></a></div>
 <p>&nbsp;</p>
<p>Acesse a plataforma <a class="button-link" href="http://goo.gl/n08g2t" target="_blank">Khan Academy</a>, entre com a sua conta Google ou crie uma conta. 
Comece por Fundamentos da Matemática e explore a plataforma para ver como ela funciona.</p>
<p>
Clique sobre o seu nome, acesse seu perfil, clique em tutores e cadastre o código da turma <kbd>BJ82789W</kbd> para acompanharmos o seu desempenho.
</p>
<!--<p>Antes de responder ao quiz abaixo, você precisa autenticar seu login na Khan, clique onde diz <kbd>Entrar na Khan Academy para Autenticar!</kbd> no topo da página.</p>-->


<div style="clear: both;"></div>
<div class="tips">
<p><b>Visão Global</b><br />
Conheça a maior plataforma do mundo para estudar matemática e programação, além de biologia, química e física. 
</p>
<p><b>Instruções</b><br />
1. Clique <a href="http://goo.gl/n08g2t" target="_blank">nesse link</a> para começar a atividade.<br />
2. Faça o login com sua conta Google ou crie uma conta para registrar seu progresso.<br />
3. Se precisar, assista ao vídeo tutorial "Como Entrar na Khan".<br />
4. Comece a praticar Fundamentos da Matemática.<br />
5. Entre no seu perfil, em Tutores e adicione o código da turma BJ82789W<br /> 
6. Volte para a Missão 5 e clique no topo da página em <i>Entrar na Khan Academy para Autenticar!</i>, você só vai precisar fazer isso uma vez, seus pontos e medalhas ficarão visíveis no topo do site.<br />
7. Responda ao quiz.<br />
<!--8. Se precisar, assista ao vídeo tutorial "Como Completar a Missão 5"<br />-->
</p>
<p><b>Atribuições</b><br /> Khan Academy</p>
</div>


<div class="quiz" >
<p align="center">TUTORIAL - Como Entrar na Khan e Adicionar um Tutor<br />
<iframe width="40%" height="180" src="https://www.youtube.com/embed/qfLFGoKyFyQ?rel=0" frameborder="0" allowfullscreen></iframe>&nbsp;&nbsp;
<iframe width="40%" height="180" src="https://www.youtube.com/embed/qtEcCbHFtbs?rel=0" frameborder="0" allowfullscreen></iframe></p>
<p align="center">Para conhecer mais, inscreva-se no curso online <a href="https://academiadosinovadores.com.br/cursokhan" target="_blank">Como Usar a Khan Academy</a></p>


</div>
 <p>&nbsp;</p>
<p align="center"><kbd>“Faça ou não faça. Tentativa não há.”</kbd></p>
<div class="quiz" >
<!--  action tem que estar em branco  -->
<form action="" method="POST" role="form">
	<legend><i class="fa fa-2x fa-pencil-square-o"></i> Os nomes dos principais avatares são: Folha, Folhoso, ____________, Aqualino.</legend>
			<select name="cpu" id="input" class="form-control" required="required">
			<option value="a">Sr. Ricardo</option>
			<option value="b">Rita Esperta</option>
			<option value="c">Sam Curioso</option>
			<option value="d">Picerátopo</option>
			<option value="e">Nenhuma Delas</option>
		</select><p>&nbsp;</p>
	<legend><i class="fa fa-2x fa-pencil-square-o"></i> Quais são os assuntos que você encontra na Khan.</legend>	
<input type="radio" name="gpu" value="a"/> Matemática, Ciências, Português e Geografia<br/>
<input type="radio" name="gpu" value="b"/> Matemática, Biologia, Física, Química, Economia, Computação, Artes<br/>
<input type="radio" name="gpu" value="c"/> Matemática, Ciências, Economia, Computação, Artes<br/>
<input type="radio" name="gpu" value="d"/> Matemática, Ciências, Economia, Computação, História<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<img src="/desafio/home/img/icons/robot-amarelo-r.png" width="10%" /> &nbsp;&nbsp;<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span> </button>
<p style="font-size: 85%;"><br />*Esse desafio vale 50 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente concluído. Você pode pular esse desafio e voltar nele depois.</p>

</form>
</div>
</div>
