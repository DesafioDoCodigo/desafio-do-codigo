
<?php


//post do form dessa pagina
$opcao = $_POST['cpu'];
//se houver um submit
if ($_POST['cpu']) {
	//se a opção escolhida for a "c"
	if($opcao == "b"){

		//credita 30 pontos
		mpoints("m_3", "30", $_SESSION['id']);
        upd_miss("3");
		//vai p/ proxima missão
		echo '<script language="JavaScript"> 
			self.location="/desafio/4/"; 
			</script> ';
		
	}else{
		//mostra aviso de resposta incorreta
		incorreta(1, "m3");
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
</span></p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/html_css_mastery_badge-70x70.png" />
<?php
/*$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[41]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#03 Code.org</p>

<div class="video"><iframe src="https://www.youtube.com/embed/nKIu9yen5nc?rel=0&amp;showinfo=0&cc_lang_pref=pt-BR&cc_load_policy=1&autoplay=0" frameborder="0" allowfullscreen width="100%" height="100%"></iframe>
</div>
<p>Assista ao video <b>“O que a maioria das escolas não ensinam”.</b> </p>
<p>Acesse a plataforma <b><a href="https://studio.code.org/hoc/1" target="_blank" class="button-link">Code Studio</a></b> crie a sua conta e comece a jogar A Hora do Código - Labirinto Clássico.</p>
<p>Conheça os conceitos básicos da ciência da computação com os personagens do Angry Birds, Plants vs. Zombies e com o Scrat, da Era do Gelo!</p>


<div style="clear: both;"></div>

<div class="tips">
<p align="center"><b>* Ative a Legenda do Vídeo</b></p>
<div style="width: 50%; float: left;">
<img src="/desafio/home/img/iconlegenda.png" width="200" />
</div>
<iframe width="40%" height="117" src="https://www.youtube.com/embed/U3uwMo1xwhg?rel=0" frameborder="0" allowfullscreen></iframe>
</div>
<div class="tips">
<p><b>Seu Primeiro Jogo</b><br />
<div style="float: left; width: 40%; padding-right: 5%;"><a href="https://studio.code.org/flappy/1"><img src="https://studio.code.org/c/video_thumbnails/14.jpg" width="100%" />
</a></div>
<p><br />Se você não vê a hora de criar seu próprio jogo, que tal começar com um <a href="https://studio.code.org/flappy/1" target="_blank" class="button-link">FLAPPY BIRD</a></p><br />


</div>
<div class="tips">
<p><b>Visão Global</b><br />
Neste vídeo grandes nomes do setor da tecnologia apresentam a ciência da computação.<br />
Você vai conhecer uma plataforma para praticar os conceitos básicos da programação. 
</p>
<p><b>Instruções</b><br />
1. Assista ao vídeo "O que a maioria das escolas não ensinam"<br />
2. Clique <a href="https://studio.code.org/hoc/1" target="_blank">neste link</a> para começar a atividade.<br />
3. Crie uma conta para registrar seu progresso.<br />
4. Comece a praticar com o tutorial da Hora do Código do Angry Birds.<br />
5. Volte para a Missão 3 e responda ao quiz.
</p>
<p><b>Atribuições</b><br /> Code.org</p>
</div>

<div class="tips">
<p><b>Fale com um TUTOR PESSOAL</b></p>
<div style="float: left; width: 40%; position: relative; padding-right: 5%;"><a href="http://professoragoogle.com.br/produtos/shop/tutor-para-o-desafio-do-codigo/"><img src="../img/conta-tutor.png" width="100%" />
</a></div>
<p> Acho que será complicado demais pra mim!<br />
Acho difícil entender uma plataforma nova!<br />
Pra quê aprender a programar?<br />
Por onde começar?<br />
Qual a inguagem mais facil para começar?<br /><br /><br />

Se você pensa assim quando ouve falar de programação de computadores, o que você precisa para completar o Desafio do Código é o apoio de um tutor.
 <br/><br/><ul class="pager" style="font-size: 200%;" ><li><a href="http://professoragoogle.com.br/produtos/shop/tutor-para-o-desafio-do-codigo/">Fale com um Tutor!</a></li></ul></p>
</div>

<div class="quiz" >
<!--  action tem que estar em branco  -->
<form action="" method="POST" role="form">

	<legend><i class="fa fa-2x fa-pencil-square-o"></i> Quais são os personagens que você programa na Hora do Código?</legend>
	
		<select name="cpu" id="input" class="form-control" required="required">
			<option value="a">Galinha Pintadinha</option>
			<option value="b">Angry Birds, Plant vs. Zombies, Era do Gelo</option>
			<option value="c">Mickey e Pateta </option>
			<option value="d">Minions</option>
			<option value="e">Nenhuma Delas</option>
		</select><p>&nbsp;</p>
		<img src="/desafio/home/img/icons/robot-amarelo-r.png" width="10%" /> &nbsp;&nbsp;<button type="submit" class="btn btn-primary"><span class="enviar">Enviar Resposta</span> </button>
        <p style="font-size: 85%;"><br />*Esse desafio vale 30 pontos. A cada tentativa de resposta errada, o desafio vale 1 ponto a menos. Responda ao quiz, apenas quando tiver realmente concluído. Seus pontos estão sujeitos à validação. Mesmo que você acerte ao quiz, será necessário ter cumprido tudo o que a missão pede, caso contrário, você perderá seus pontos. Você pode pular esse desafio e voltar nele depois.</p>

</form>
</div>
</div>
