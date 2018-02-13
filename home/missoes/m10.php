<?php


//post do form dessa pagina
$opcao = $_POST['gpu'];

//se houver um submit
if ($_POST['gpu']) {
	//confere se fez login, e se a pontuação é maior que 2500000
	//***********************************************
	if($khan_api && $khan_api['points'] >= "250000"){
	//***********************************************
	//se a opção escolhida for a "b"
		if($opcao == "b"){
			

			//credita 30 pontos
			mpoints("m_10", "130", $_SESSION['id']);
	        upd_miss("10");
			//vai p/ proxima missão
			echo '<script language="JavaScript"> 
				self.location="/desafio/11/"; 
				</script> ';
			}else{
				incorreta(1, "m10");
			}
	}else{
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Você não tem a pontuação necessária (250.000) na Khan Academy para continuar, ou, não se logou na Khan Academy (Botão acima)</div>';
	}
}

?>
<link rel="stylesheet" href="/desafio/home/css/missoes.css" />
<div id="content" >
<div style="float: right;"><p align="center">
<span class="btnstar btn-primarystar">
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
</span>
</p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/perseverance-70x70.png" />
<?php
/*
<?php
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[75]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#10 Khan Academy</p>
<div class="video"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/xtV4QUjnBlI?rel=0&amp;showinfo=0&cc_lang_pref=pt&cc_load_policy=1&autoplay=0" frameborder="0" allowfullscreen></iframe></div>

<p>Domine os conceitos da matemática.</p>
<p>Conquiste 250.000 (Duzentos e cinquenta mil) pontos de energia na <a class="button-link" href="http://goo.gl/n08g2t" target="_blank">Khan Academy</a>.
</p>
<p>Você vai precisar de um tempo para alcançar essa meta, mas não desista. <a href="http://jornal.usp.br/especial/matematica/" target="_blank">A matemática está em tudo!</a> Se preferir, siga em frente, clicando em <kbd>PRÓXIMA</kbd>. Depois retorne aqui para validar esse desafio.</p>
<p>&nbsp;</p>
<p></p>
<p align="center"><kbd>“Treine a si mesmo a deixar partir tudo que teme perder.”</kbd></p>
<div style="clear: both;"></div>
<div class="tips">
<p><b>Visão Global</b><br />
Pratique matemática. Você pode continuar em Fundamentos da Matemática e ir avançando. Você também pode procurar um assunto específico que queira estudar. 
</p>
<p><b>Instruções</b><br />
1. Clique <a href="http://goo.gl/n08g2t" target="_blank">nesse link</a> para começar a atividade.<br />
2. Faça o login com sua conta para registrar seu progresso, confirme se cadastrou a turma BJ82789W.<br />
3. Continue a praticar Matemática até conseguir 250.000 pontos de energia.<br />
4. Volte para a Missão 10 e responda ao quiz.
</p>
<p><b>Atribuições</b><br /> Khan Academy</p>
<p><b>Conte&uacute;do Adicional</b><br /> Jornal da USP Especial</p>
</div>
<div class="quiz" >
<form action="" method="POST" role="form">
<legend><i class="fa fa-2x fa-pencil-square-o"></i> Quais avatares evoluídos são liberados com 250.000 pontos de energia?</legend>	
<input type="radio" name="gpu" value="a"/> Folha, Sr. Rosa, Márcio, Lula Suco de Laranja <br/>
<input type="radio" name="gpu" value="b"/> João, Amélia, Picerátopo, Folhoso, Primossauro<br/>
<input type="radio" name="gpu" value="c"/> Sam Corajoso, Pula Pula, Polvo Roxo<br/>
<input type="radio" name="gpu" value="d"/> Winston, Senhor Sabor, Bolota<br/>
<input type="radio" name="gpu" value="e"/> Nenhuma Delas<br/>
<p>&nbsp;</p>
 	<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span></button>
    <p style="font-size: 85%;"><br />*Esse desafio vale 130 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente concluído. Você pode pular esse desafio e voltar nele depois.</p>


    </form>
</div>
</div>
