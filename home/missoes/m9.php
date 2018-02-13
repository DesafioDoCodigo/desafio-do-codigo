<?php


//post do form dessa pagina
$opcao = $_POST['gpu'];

//se houver um submit
if ($_POST['gpu']) {
	//se a opção escolhida for a "c"
	if($opcao == "c"){
		

		//credita 30 pontos
		mpoints("m_9", "60", $_SESSION['id']);
        upd_miss("9");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/10/"; 
			</script> ';
		}else{
			incorreta(1, "m9");
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
</span>
</p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/millionaire-70x70.png" />
<?php
/*
<?php
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[62]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#09 BaBaDum</p>
<div class="imagem"><a href="http://goo.gl/Ac8pF3" target="_blank"><img src="http://soraianovaes.com/edtech/tecnologias/images/sites/babadum.png"/></a></div>
<p>Depois de escrever suas primeiras horas de código você já deve ter percebido que o Inglês é fundamental para programar computadores. Treine o seu inglês jogando!</p>
<p>Acesse  <a class="button-link" href="http://goo.gl/Ac8pF3" target="_blank">BaBaDum</a></p><p>Crie uma conta e amplie seu vocabulário em inglês.</p>
<p>Comece com 15 pontos.</p>
<div style="clear: both;"></div>
<!--<iframe src="https://babadum.com/" width="100%" height="800" style="margin-left: auto; margin-right: auto; margin-top: 30px;border: 0px;"></iframe> -->
<div class="tips">
<p><b>Visão Global</b><br />
Nesta etapa você vai praticar seu vocabulário em Inglês. 
</p>
<p><b>Instruções</b><br />
1. Clique <a href="http://goo.gl/Ac8pF3" target="_blank">nesse link</a> para abrir o BaBaDum em uma nova aba.<br />
2. Crie uma conta para registrar seu progresso.<br />
3. Consiga 15 pontos.<br />
4. Volte para a Missão 9 e responda ao quiz.
</p>
<p><b>Atribuições</b><br /> BaBaDum</p>
</div>
<div class="quiz" >
<p align="center">TUTORIAL - Como Entrar no BaBaDum<br />
<iframe width="240" height="160" src="https://www.youtube.com/embed/PliGVzlSXEc?rel=0" frameborder="0" allowfullscreen></iframe></p>
</div>
<div class="quiz" >
<form action="" method="POST" role="form">
<legend><i class="fa fa-2x fa-pencil-square-o"></i> Quantas op&ccedil;&otilde;es de respostas tem para cada palavra no BaBaDum?</legend>	
<input type="radio" name="gpu" value="a"/> 2<br/>
<input type="radio" name="gpu" value="b"/> 3<br/>
<input type="radio" name="gpu" value="c"/> 4<br/>
<input type="radio" name="gpu" value="d"/> 5<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span></button>
    <p style="font-size: 85%;"><br />*Esse desafio vale 60 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente concluído. Você pode pular esse desafio e voltar nele depois.</p>
 </form>
</div>
</div>