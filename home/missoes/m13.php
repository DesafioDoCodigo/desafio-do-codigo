<?php


//credita os pontos em uma determinada missão..("id da missão", "quantos pontos", "id do usuário")
mpoints("m_13", "60", $_SESSION['id']);
//função para determinar a última missão que o usuário parou(para quando fizer login novanmente, abrir em sua ultima missão)
upd_miss("13");

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
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/going-transonic-70x70.png" />
<?php
/*
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[35]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#13 Duolingo</p>
<div class="video"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/0ADEBEzPGB4?rel=0&amp;showinfo=0&cc_lang_pref=pt&cc_load_policy=1&autoplay=1" frameborder="0" allowfullscreen></iframe></div>
<p>&nbsp;</p><p>&nbsp;</p>
<p>Para se aprofundar na programação de computadores, você vai precisar de um pouco mais de Inglês.</p>
<p> Conheça o Duolingo. Domine o Inglês praticando online.</p>
<p>Acesse <a href="https://www.duolingo.com/o/ftkvqu" target="_blank" class="button-link">Duolingo</a> e participe da turma <a href="https://www.duolingo.com/o/ftkvqu" target="_blank"><kbd>Desafio do Código</kbd></a>, faça login com sua conta Google e treine seu inglês.</p>

<p>&nbsp;</p>
<div class="tips">
<p><b>Visão Global</b><br />
Nesta etapa você vai praticar seu Inglês. 
</p>
<p><b>Instruções</b><br />
1. Clique <a href="https://www.duolingo.com/o/ftkvqu" target="_blank">neste link</a> para abrir o Duolingo.<br />
2. Crie uma conta para registrar seu progresso.<br />
</p>
<p><b>Atribuições</b><br /> Duolingo</p>
</div>
</div>