<?php


//credita os pontos em uma determinada missão..("id da missão", "quantos pontos", "id do usuário")
mpoints("m_11", "40", $_SESSION['id']);
//função para determinar a última missão que o usuário parou(para quando fizer login novanmente, abrir em sua ultima missão)
upd_miss("11");

?>
<link rel="stylesheet" href="/desafio/home/css/missoes.css" />
<div id="content" >
<div style="float: right;"><p align="center"><span class="btnstar btn-primarystar">
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i> 
<i class="fa fa-fw fa-yellow fa-star"></i>
</span>
</p>
<p align="center">
<img src="http://desafiodocodigo.com.br/desafio/home/img/badges-khan/making-progress-70x70.png" />
<?php
/*
<?php
$resposta = file_get_contents('http://www.khanacademy.org/api/v1/badges');
$badges = json_decode($resposta, true);
echo "<img src='".$badges[61]['icons']['email']."'>";
*/?>
</p>
</div>
<p class="tituloatividade">#11 Blockly</p>
<div style="clear: both;"></div>
<iframe src="https://blockly-games.appspot.com/" frameborder="0" width="100%" height="600px"></iframe>
<div class="tips">
<p><b>Visão Global</b><br />
Nessa etapa você vai conhecer o Blockly, uma plataforma Google para praticar programação com blocos. 
</p>
<p><b>Instruções</b><br />
1. Assista ao Tutorial.<br />
2. Clique <a href="https://blockly-games.appspot.com/" target="_blank">neste link</a> para começar a atividade.<br />
</p>
<p><b>Atribuições</b><br /> Google</p>
</div>
<div class="quiz" >
<p align="center">TUTORIAL - Blockly<br />
<iframe src="https://docs.google.com/presentation/d/1GfsJUVp-MKX1HF9IOhUdTHEs5pMsWOqc2vApHyW8eXI/embed?start=false&loop=false&delayms=3000" frameborder="0" width="80%" height="310" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe></p>
</div>
</div>