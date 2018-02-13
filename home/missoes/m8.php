<?php


//post do form dessa pagina
$opcao = $_POST['gpu'];

//se houver um submit
if ($_POST['gpu']) {
	//se a opção escolhida for a "c"
	if($opcao == "d"){
		

		//credita 30 pontos
		mpoints("m_8", "90", $_SESSION['id']);
        upd_miss("8");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/9/"; 
			</script> ';
		}else{
			incorreta(1, "m8");
		}

}


?>
<link rel="stylesheet" href="/desafio/home/css/missoes.css" />
<div id="content" ><div style="float: right;">
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
</span>
</p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/apprentice-programmer-70x70.png" />
<?php
/*
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[11]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#08 Code.org</p>
<div class="imagem"><a href="https://studio.code.org/hoc/" target="_blank"><img src="http://code.org/images/fit-520/codehoc3.jpg" /></a></div>
<p>Complete os 20 desafios da Hora do Código para receber seu primeiro certificado. Acesse o  <a class="button-link" href="https://studio.code.org/" target="_blank">Code Studio</a>, 
entre com a sua conta e termine as atividades da Hora do Código do <a class="button-link" href="http://studio.code.org/join/FDXYWD" target="_blank">Angry Birds</a>, 
<a class="button-link" href="http://studio.code.org/join/HYYLTW" target="_blank">Frozen</a>, 
<a class="button-link" href="http://studio.code.org/join/HZDRNN" target="_blank">Star Wars</a> e 
<a class="button-link" href="http://studio.code.org/join/HYQSNS" target="_blank">Minecraft</a>.</p>
<p>&nbsp;</p>
<p align="center"><kbd>“Difícil de ver. Sempre em movimento está o Futuro.”</kbd></p>
<div style="clear: both;"></div>


<div class="tips">
<p><b>Visão Global</b><br />
Nesta etapa você vai conhecer os conceitos básicos da programação. 
</p>
<p><b>Instruções</b><br />
1. Clique <a href="https://studio.code.org/" target="_blank">nesse link</a> e termine as atividades da Hora do Código.<br />
2. Volte para a Missão 8 e responda ao quiz.
</p>
<p><b>Atribuições</b><br /> Code.org</p>
</div>
<div class="quiz" >
<p align="center">TUTORIAL - Praticando no Code<br />
<iframe width="240" height="160" src="https://www.youtube.com/embed/Fehb7eBqxfE?rel=0" frameborder="0" allowfullscreen></iframe>

<iframe width="240" height="160" src="https://www.youtube.com/embed/videoseries?list=PLriYCqAbxXmDIM8Bnb6K_Vl_Q7y5bKgwo" frameborder="0" allowfullscreen></iframe>

</p>
</div>
<div class="quiz" >
<form action="" method="POST" role="form">
<legend><i class="fa fa-2x fa-pencil-square-o"></i> Qual o nome de quem assinou o seu certificado da Hora do Código?</legend>	
<input type="radio" name="gpu" value="a"/> Salman Khan<br/>
<input type="radio" name="gpu" value="b"/> Bill Gates<br/>
<input type="radio" name="gpu" value="c"/> Mark Zuckerberg<br/>
<input type="radio" name="gpu" value="d"/> Hady Partovi<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span></button>
    <p style="font-size: 85%;"><br />*Esse desafio vale 90 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente concluído. Você pode pular esse desafio e voltar nele depois.</p>

 </form>
</div>
</div>