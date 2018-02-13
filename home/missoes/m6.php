<?php


//credita os pontos em uma determinada missão..("id da missão", "quantos pontos", "id do usuário")
mpoints("m_6", "10", $_SESSION['id']);
//função para determinar a última missão que o usuário parou(para quando fizer login novanmente, abrir em sua ultima missão)
upd_miss("6");

?>
<link rel="stylesheet" href="/desafio/home/css/missoes.css" />
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=1682383425421537";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="content" ><div style="float: right;"><span class="btnstar btn-primarystar">
<i class="fa fa-fw fa-yellow fa-star"></i>
</button>
</div>
<p class="tituloatividade">#06 Compartilhe</p>

<div class="imagem"><img src="../../../images/grupochat.jpg" width="70%" />
</div>

<p>Nessa fase, o seu desafio é compartilhar com seus amigos sua descoberta e convidar todo mundo para participar do Desafio do Código. </p>
<!-- I got these buttons from simplesharebuttons.com -->
<div id="share-buttons">
 
<!-- Facebook -->
<a href="http://www.facebook.com/sharer.php?u=https://www.desafiodocodigo.com.br" target="_blank"><img src="/desafio/home/img/icons/facebook.png" alt="Facebook" /></a>
 
<!-- Twitter -->
<a href="http://twitter.com/share?url=https://www.desafiodocodigo.com.br&text=Desafio do Cógigo&hashtags=codewars" target="_blank"><img src="/desafio/home/img/icons/twitter.png" alt="Twitter" /></a>
 
<!-- Google+ -->
<a href="https://plus.google.com/share?url=https://www.desafiodocodigo.com.br" target="_blank"><img src="/desafio/home/img/icons/google-plus.png" alt="Google" /></a>
 
<!-- Digg -->
<a href="http://www.digg.com/submit?url=https://www.desafiodocodigo.com.br" target="_blank"><img src="/desafio/home/img/icons/digg.png" alt="Digg" /></a>
  
<!-- LinkedIn -->
<a href="http://www.linkedin.com/shareArticle?mini=true&url=www.desafiodocodigo.com.br" target="_blank"><img src="/desafio/home/img/icons/linkedin.png" alt="LinkedIn" /></a>
 
<!-- Pinterest -->
<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><img src="/desafio/home/img/icons/pinterest.png" alt="Pinterest" /></a>
 
<!-- Email -->
<a href="mailto:?Subject=Simple Share Buttons&Body=Eu%20achei%20isso%20e%20lembrei%20de%20voce!%20 https://www.desafiodocodigo.com.br"><img src="/desafio/home/img/icons/email.png" alt="Email" /></a>
 
</div>
<p>Aproveite para deixar seus dados atualizados em nosso sistema, clique no seu nome no menu da barra superior, clique em configurações e preencha os dados pendentes.</p>
<br /><br /><!--
<p><strong>Você também pode Participar de um Grupo de Estudo.</strong> 
<a  class="button-link" href="https://desafiodocodigo.com.br/grupos" target="_top\">Escolha um grupo</a> para ajudar a acelerar sua aprendizagem.
</p>
<p>&nbsp;</p>


<p><strong>Quer falar com um tutor?</strong> <a href="https://www.remind.com/a?" target="_blank">Instale o aplicativo</a> Remind no seu celular e cadastre-se na turma <kbd>@desafio</kbd></p>
<p><a href="https://www.remind.com/join" target="_blank"><img src="/desafio/home/img/remind.svg" width="250px" /></a></p>-->


<!--
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSe__Bfh50W9CMGx2hwbWr8ktphw6mvzk_z9yZNMXFlekhLlUQ/viewform?embedded=true" width="100%" height="1000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>

<div class="tips">
<div style="margin-top: 2%">
     	<h3>Esse site é útil para você?</h3>
	<h3>Faça uma Doação!</h3>
   </div>
        <div style="margin-top: 2%; width: 45%; float: left;">
       
 <form style="margin-left: 5%; margin-bottom: 5%;" action="https://pagseguro.uol.com.br/checkout/v2/donation.html?iot=button" method="post"  target="_blank">

	<input type="hidden" name="currency" value="BRL">
	<input type="hidden" name="receiverEmail" value="sonovaes511@gmail.com">
	<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/205x30-doar.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!">
    
</form>
</div>
<div style="margin-top: 2%; width: 45%; float: left;">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="8Q3FANTXSE8FY">
	<input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">
	<img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
<div style="margin-top: 5%;">
<a mp-mode="dftl" href="http://mpago.la/fZmB" name="MP-payButton" class="green-ar-s-rn-undefined">Doar com Mercado Pago</a> &nbsp;&nbsp;
<a mp-mode="dftl" href="https://www.mercadopago.com/mlb/checkout/start?pref_id=167747647-abb6fd6d-1798-4077-88df-4e59fb946320" name="MP-payButton" class="green-ar-s-rn-none">Doar R$ 50,00</a>
<script type="text/javascript">(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>
        
        
		</div>	</div>
        -->
<div class="tips">
 
<div style="float: left; width: 40%; position: relative; padding-right: 5%;"><a href="http://professoragoogle.com.br/produtos/shop/tutor-para-o-desafio-do-codigo/"><img src="../img/conta-tutor.png" width="100%" />
</a></div>
<p> <b>Use a tecnologia para potencializar o seu aprendizado</b><br/> <br/>Está com dúvidas?<br /> Precisa de orientação?<br />
<p>Conte com um TUTOR PESSOAL para completar o Desafio do Código! <br/><br/><ul class="pager" style="font-size: 200%;" ><li><a href="http://professoragoogle.com.br/produtos/shop/tutor-para-o-desafio-do-codigo/">Quero um Tutor</a></li></ul></p></p>
</div><br /><br />
<div class="tips">
<iframe width="100%" height="420" src="https://www.youtube.com/embed/videoseries?list=PLLYBHe5RzNIuADn67o1R5zubKn-tD5KHE" frameborder="0" allowfullscreen></iframe>
</div><br /><br />
<p align="center"><kbd>
“Sempre passar o que você aprendeu”</kbd>
</p>
</div>

