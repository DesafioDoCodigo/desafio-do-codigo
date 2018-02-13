<?php


//credita os pontos em uma determinada missão..("id da missão", "quantos pontos", "id do usuário")
mpoints("m_12", "50", $_SESSION['id']);
//função para determinar a última missão que o usuário parou(para quando fizer login novanmente, abrir em sua ultima missão)
upd_miss("12");


?>
<link rel="stylesheet" href="/desafio/home/css/missoes.css" />
<div id="content" >
<div style="float: right;"><p align="center"><span class="btnstar btn-primarystar">
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i>
<i class="fa fa-fw fa-yellow fa-star"></i>  
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i>
</span></p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/incredible-inspiration-70x70.png" />
<?php
/*
<?php
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[27]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#12 Google Arts & Culture</p>
<div class="video"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/q63F3WQy-L4?rel=0&amp;showinfo=0&cc_lang_pref=pt&cc_load_policy=1&autoplay=1" frameborder="0" allowfullscreen></iframe></div>

<p>Para tudo na vida &eacute; preciso ter repert&oacute;rio.
Amplie o seu. Escolha um museu para conhecer no <a href="http://goo.gl/Lz8KDL" target="_blank" class="button-link">Art Project</a></p>
<p>Voc&ecirc; pode pesquisar por museu, cole&ccedil;&atilde;o ou artista. Crie uma galeria com suas obras preferidas.</p>
<p>&nbsp;</p>
<p align="center"><kbd>“Muito a aprender você ainda tem.”</kbd></p>
<div style="clear: both;"></div>

<div class="tips" >
<p align="center">Conhecendo o Google Arts & Culture<br />
<iframe width="240" height="160" src="https://www.youtube.com/embed/b1-wlPFczQA?rel=0" frameborder="0" allowfullscreen></iframe></p>
</div>
<div class="tips">
<p><b>Vis&atilde;o Global</b><br />
Nessa etapa voc&ecirc; vai conhecer a plataforma do Google que permite navegar pelas obras de diversos museus. 
</p>
<p><b>Instru&ccedil;&otilde;es</b><br />
1. Clique <a href="http://goo.gl/Lz8KDL" target="_blank">neste link</a> para come&ccedil;ar a atividade.<br />
2. Fa&ccedil;a o login com sua conta Google para salvar suas obras preferidas.<br />
3. Crie sua pr&oacute;pria galeria.<br />
</p>
<p><b>Atribui&ccedil;&otilde;es</b><br /> Google</p>
</div>

</div>
