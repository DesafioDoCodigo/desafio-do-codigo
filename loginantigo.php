<?php
include 'php/func.php';

if($_POST){
        if(verifica_login($_POST['login'], $_POST['senha'])){    
            header("location: /desafio/home/index.php");
            debug_js("login aprovado");
           debug_js("Login: ".$_POST['login']);
           debug_js("Senha: ".$_POST['senha']);
        }else{
            //retornou falso
            //login incorreto
            $erro = true;
            debug_js("Login Rejeitado");
        };
}

if($_SESSION['login'] && !isset($_GET['newsletter'])){
  header("Location: /desafio/home/");
  exit;
}

?>
<!DOCTYPE html>
<html lang="pt_BR">
    <head>

      
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN: DESAFIO DO CÓDIGO - CodeWars BR</title>
	<meta name="description" content="Aprenda a programar. Programe para Aprender. Seu futuro vai depender cada vez mais desse conhecimento.
        Aprenda a hackear tudo a sua volta e transformar a sua realidade como quiser. Garantimos que vai ser muito divertido!" />
		<meta name="keywords" content="educacao, computador, learning, educational technology" />
        <link rel="canonical" href="https://www.desafiodocodigo.com.br/desafio">
        <!-- CSS -->
        <link href="/desafio/home/css/bootstrap.min.css" rel="stylesheet">
        <link href="/desafio/home/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="/desafio/css/supersized.css">
        <link rel="stylesheet" href="/desafio/css/style.css">
    <link rel="stylesheet" href="/desafio/css/datepicker.css">
    <link rel="stylesheet" href="/desafio/css/alertify.default.css" />
    <link rel="stylesheet" href="/desafio/css/alertify.core.css" />
   
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
<style type="text/css">
            .pace {
          -webkit-pointer-events: none;
          pointer-events: none;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        .pace .pace-progress {
          display: block;
          position: fixed;
          z-index: 2000;
          top: 0;
          left: 0;
          height: 12px;
          background: #f7f009;

          -webkit-transition: -webkit-transform .3s, width 1s;
          -moz-transition: width 1s;
          -o-transform: width 1s;
          transition: transform .3s, width 1s;

          -webkit-transform: translateY(-50px);
          transform: translateY(-50px);

          pointer-events: none;
        }

        .pace.pace-active .pace-progress {
          -webkit-transform: translateY(0);
          transform: translateY(0);
        }

.clear {
    clear: both;
}

.bar-wrap{
    background: rgba(0, 0, 0, .5);
    position: fixed;
bottom: 0px;
width: 100%;
overflow: visible;
z-index: 99;
left: 0px;
float: right; /* Styling */
}
a {
    color: #EAEAEA;
    text-decoration: none;
}

a:hover 
{
     color:#FFFFFF; 
     text-decoration:none; 
     cursor:pointer;  
}
.letranova{
    font-size: 1.3em !important;
    color:#282828;     
    text-align: left;
    
    
}
</style>
<link rel="apple-touch-icon" sizes="57x57" href="../codewars/images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../codewars/images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../codewars/images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../codewars/images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../codewars/images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../codewars/images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../codewars/images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../codewars/images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../codewars/images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../codewars/images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../codewars/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../codewars/images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../codewars/images/favicon-16x16.png">
<link rel="manifest" href="../codewars/images/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../codewars/images/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
  
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48876740-8', 'auto');
  ga('send', 'pageview');

</script>
    </head>

    <body>
        <div class="page-container">
        <div style="max-width: 520px;margin-left: auto;margin-right: auto; margin-top: -2%; padding-top: 2%; background-color:rgba(0, 0, 0, 0.6); ">
        <a href="https://click.linksynergy.com/fs-bin/click?id=bjFg2Qc1ius&offerid=548063.11&subid=0&type=4"><IMG border="0"   alt="submarino.com.br" src="https://ad.linksynergy.com/fs-bin/show?id=bjFg2Qc1ius&bids=548063.11&subid=0&type=4&gridnum=13"></a>
        <br /><br />
         <img src="../images/LOGO-DESAFIO2016white.png" width="300px" class="logo"/>
         <!-- <div style="max-width: 520px;margin-left: auto;margin-right: auto;"><h3>Aprenda GRATUITAMENTE a fazer seus próprios jogos, sites e aplicativos com os melhores professores do mundo.</h3></div> -->
               <h2>Primeira vez por aqui?</h2>
                   <a data-toggle="modal" href='#cria'> <button class="crie">CRIAR CONTA</button>  </a>                   
            <form class="lform" action="" method="post">
            <?php if($erro){echo'<span style="color:red;">Informações Incorretas</span>';} ?>
                <input type="text" id="login" name="login" class="linput" placeholder="Usuário">
                <input type="password" id="senha" name="senha" class="linput" placeholder="Senha">
                <button class="lbutton" type="submit">ENTRAR</button>
                
                </form>
                  
                   <!-- <h3>Clicou e não apareceu um formulário?</h3> <h6>Verifique se você tem um navegador  <br />compatível instalado no seu computador. </h6><h4><a href="https://www.google.com.br/intl/pt-BR/chrome/browser/desktop/" target="_blank">Google Chrome </a>é o preferido, </h4><h6>mas Safari 5, Internet Explorer 9+ e Mozilla Firefox  <br />também funcionam.</h6>
                    <br /><a href="https://www.google.com.br/intl/pt-BR/chrome/browser/desktop/" target="_blank"><img src="img/benefits-5-mobile.png" width="100px" style="margin-bottom: 1%;" /></a>-->
                   <h3><a class="btn senha" data-toggle="modal" href='#senhaesqueci'>Esqueceu a senha?</a>&nbsp; <img src="img/logowhite.png" width="70px" class="logo"></h3>
                   <div style="width: 250px;margin-left: auto;margin-right: auto;"> <h4 style="margin-bottom: 10%">Não consegue criar sua conta? Mande uma mensagem no <a href="https://www.facebook.com/codewarsbr" target="_blank"  style="text-decoration: underline !important;">Facebook</a> ou um <a href="mailto:conselho@desafiodocodigo.com.br"  style="text-decoration: underline !important;">email</a>. Por favor, nos avise, vamos garantir seu acesso! </h4>
 </div>

   <div style="width: 350px;margin-left: auto;margin-right: auto;">
  
      <iframe src="https://desafiodocodigo.com.br/counter/total.php" width="100%"  height="400px" style="border: 0;"></iframe>
<br /><br />
    		
  
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- desafiohome -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3011890130990408"
     data-ad-slot="6019008405"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br />
<br />
<a href="https://click.linksynergy.com/fs-bin/click?id=bjFg2Qc1ius&offerid=503004.15&subid=0&type=4" target="_blank"><IMG border="0"   alt="Games Mais Vendidos" src="https://ad.linksynergy.com/fs-bin/show?id=bjFg2Qc1ius&bids=503004.15&subid=0&type=4&gridnum=13"></a>
   <br /><br />
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- desafiohome-texto -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3011890130990408"
     data-ad-slot="3756697283"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>                       </div>
                        
 <footer>
        <div class="bar">
            <div class="bar-wrap">
            
            <div class="textos">
                
                <div class="copyright">
                <a href="http://desafiodocodigo.com.br/termo-uso.php" target="_blank">Termo de Uso</a> 
                | <a href="http://desafiodocodigo.com.br/termo-uso.php#politica" target="_blank">Política de Privacidade</a> 
                | <a href="http://www.tarikbc.tk" target="_blank">Tarik Caramanico</a> 
                | <a href="https://host.inparsolucoes.com.br/" target="_blank">Abimael Curi</a> 
                | <a href="http://soraianovaes.com/" target="_blank">&copy; SnVas 2017</a> Todos os Direitos Reservados. </div>
            </div>
            </div>
        </div>
    </footer>


<div class="modal fade" id="senhaesqueci" style="color:#282828; text-align:left;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Esqueci minha senha!</h4>
			</div>
			<div class="modal-body">
			Insira seu e-mail, vamos enviar um link para você redefinir sua senha de acesso. Caso não receba imediatamente nosso email, verifique sua caixa de spam!<br /><br />
					<div class="form-group">
						<label for="">Email:</label>
						<input type="text" class="form-control" id="emailrecp" name="emailrecp" placeholder="seunome@dominio.com">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" id="butrecp" name="butrecp" class="btn btn-primary">Recuperar! <i class="fa fa-key"></i></button>
                <h6></h6>
			</div>
		</div>
	</div>
</div>

<?php if(isset($_GET['recovery'])) {

  $code = mysqli_real_escape_string($mysql, $_GET['recovery']);
  $user = mysqli_real_escape_string($mysql, $_GET['user']);

  if($user) $query = mysqli_query($mysql, "SELECT u.id, u.login FROM users u, recovery r WHERE r.code = '$code' AND r.userid = u.id AND u.login = '$user' LIMIT 1");
  else $query = mysqli_query($mysql, "SELECT u.id, u.login FROM users u, recovery r WHERE r.code = '$code' AND r.userid = u.id LIMIT 1");

  $sql=mysqli_num_rows($query);

  if($sql){

    $lin=mysqli_fetch_array($query);
    $username = $lin['login'];


  ?>

<div class="modal fade in" id="novasenha" style="color:#282828;display:block;text-align: left;background-color: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
       
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <p align="center"> <img src="../images/LOGO-DESAFIO2016fb.png" width="200px" class="logo"/></p>
        <h3 class="modal-title">Cadastre uma Nova Senha</h3>
      </div>
      <div class="modal-body">
          
          <div class="form-group">
            <label for="">Usuário:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $username;?>" placeholder="nomedeusuario">
          </div>
          <div class="form-group">
            <label for="">Código de recuperação:</label>
            <input type="text" class="form-control" id="code" value="<?php echo $code; ?>" name="code" placeholder="codigo">
          </div>
          <div class="form-group">
            <label for="">Nova Senha:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Sua nova senha">
          </div>
          <div class="form-group">
            <label for="">Repita a nova Senha:</label>
            <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Sua nova senha">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" id="butpass" name="butpass" class="btn btn-primary">Salvar! <i class="fa fa-key"></i></button>
      </div>
    </div>
  </div>
</div>

<?php
  } 
}

if( isset($_GET['newsletter']) ){
  ?>

<div class="modal fade in" id="novasenha" style="color:#282828;display:block;text-align: left;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Não receber e-mails informativos</h4>
      </div>
      <div class="modal-body">
        <br />
        <br />
          Você não receberá mais e-mails informativos.
        <br /><br />
        <br />
        <br />
      </div>
      <div class="modal-footer">
        <button type="button" id="butgopanel" name="butgopanel" class="btn btn-primary">Fechar</button>
      </div>
    </div>
  </div>
</div>

  <?php
}
?>

            <div class="modal fade letranova" id="cria">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h1 class="modal-title">Crie sua Conta</h1>
                        </div>
                        <div class="modal-body">
                                <label for="nome">Nome Completo<span style="color: red; font-size: 150%;">*</span><span style="color: #999;"> (Para o Certificado)</span></label>
                                <input type="text" class="form-crie" id="nome" placeholder="Seu Nome" required autocomplete="name"/>
                               
                               <div id="divlogin" class="form-group" style="margin-bottom:0px;">
                                  <label id="titulo" class="control-label" for="flogin">Usuário<span style="color: red; font-size: 150%;">*</span> (Defina seu login de acesso sem deixar espaços)</label>
                                  <input name="flogin" type="text" class="form-crie" id="flogin" placeholder="Defina seu Login Único" />
                                </div>
                                <label for="password">Senha<span style="color: red; font-size: 150%;">*</span> (Crie uma senha)</label><input type="password" name="password" id="password" class="form-crie" required="required">
                               <label for="date">Data de nascimento<span style="color: red; font-size: 150%;">*</span></label><input type="date" class="form-crie" id="nasc" placeholder="dd/mm/aaaa" required="required">
                            <label for="email">Email<span style="color: red; font-size: 150%;">*</span></label><input type="email" name="email" placeholder="Informe um email válido" id="email" class="form-crie" value="" required autocomplete="email">
                          
                          
                           <!-- 
                          <label for="telefone" style="color: #999;">Telefone/WhatsApp (DDD-Telefone)</label><input type="tel" class="form-crie" id="telefone" name="telefone" autocomplete="tel" placeholder="" required>
                            
                           <label for="apelido" style="color: #999;">Apelido (Seu nome público)</label><input type="text" class="form-crie" id="apelido" placeholder="" required>
                               <br /><label for="sexo" style="color: #999;">Gênero:</label> 
                                <label><select name="sexo" id="sexo"><option id="sexo" value=""></option><option id="sexo" value="M">Masculino</option><option id="sexo" value="F">Feminino</option> <option id="sexo" value="O">Prefiro não Responder</option>     
                                 
                                 </select>
                                 
                                 </label> <br /><br />
                           
                           
                               <label for="cidade" style="color: #999;">Cidade</label><input type="text" name="cidade" id="cidade" class="form-crie" value="" required autocomplete="address-level2">
                           
                            <label for="escola" style="color: #999;">Nome da sua Escola/Faculdade - (Não está estudando? digite NENHUMA)</label><input type="text" name="escola" id="escola" class="form-crie" value="" required>
                            <label for="serie" style="color: #999;">Ano de Estudo/Série/Curso</label><input type="text" name="serie" id="serie" class="form-crie" value="" placeholder="Último ano concluído" required>
                           --> <div class="checkbox">
                               <!-- <label>
                                    <input type="checkbox" value="true" id="autoriza">
                                    Autorizo o uso das imagens capturadas nos CODE PLACES para fins de divulgação do Desafio do Código - CODE WARS Educatic na mídia.
                                </label>-->
                                <p style="font-size: smaller; text-align: right;"><span style="color: red; font-size: 150%;">* Campos Obrigatórios</span></p>
                                <p style="font-size: 0.7em; text-align: right;color: #999;">Ao criar a sua conta, você concorda com as condições do nosso <a href="https://desafiodocodigo.com.br/termo-uso.php" target="_blank" style="color: #999; text-decoration: underline;">Termo de Uso e Política de Privacidade</a>.</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="button" id="submit" class="btn btn-success" style="padding-left: 100px; padding-right: 100px;">Criar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
              
            
        </div>
        <!-- Javascript -->
        <script src="/desafio/js/jquery-2.1.1.min.js"></script>
        <script src="/desafio/js/codewars.js?m"></script>
        <script src="/desafio/js/supersized.3.2.7.min.js"></script>
        <script src="/desafio/js/supersized-init.js"></script>
        <script src="/desafio/js/load.js"></script>
        <script src="/desafio/home/js/bootstrap.min.js"></script>
        <script src="/desafio/js/alertify.min.js"></script>
        <script src="/desafio/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="/desafio/js/locales/bootstrap-datepicker.pt-BR.js" charset="UTF-8"></script>

<script type="text/javascript">

$(document).ready(function () {
    $("button#butrecp").click(function(){
        var email = $("input#emailrecp").val();
        $.ajax({
            type: "POST",
            url: "php/recp.php", 
            data:{
                email: email
            },
            success: function(msg){
                alertify.success(msg);
                $("#senhaesqueci").modal('hide'); //hide popup 
            },
            error: function(){
                alert("Erro AJAX ao recuperar senha.");
            }
        });
    });
    $("button#butpass").click(function(){
        var user = $("input#usuario").val();
        var code = $("input#code").val();
        var pass = $("input#password").val();
        $.ajax({
            type: "POST",
            url: "php/recp.php", 
            data:{
                user: user,
                code: code,
                pass: pass
            },
            success: function(msg){
                alertify.success(msg);
                setTimeout(function(){document.location='/desafio/';}, 1000);
            },
            error: function(){
                alert("Erro AJAX ao recuperar senha.");
            }
        });
    });
    $("button#butgopanel").click(function(){
        document.location='/desafio/';
    });


});





  logindisponivel = false;
        var loaded = false;

    $(document).ready(function(){
        //quando detectar mudança no campo de login(usuario digitou algo)
        $("input#flogin").change(function() 
        { 
        var username = $("input#flogin").val();
        var msgbox = $("#titulo");
        if(username.length > 2) {
            $("#titulo").html('<i class="fa fa-spinner fa-spin"></i>&nbsp;Login - Verificando disponibilidade...');
            $.ajax({  
                type: "POST",  
                url: "php/check.php",  
                data:{
                    username:username
                },  
                success: function(msg){  
                      if(msg == '0')
                      { 
                      
                          $("#divlogin").removeClass("has-error");
                          $("#divlogin").addClass("has-success");
                          msgbox.html('Login - Disponível! <i class="fa fa-check"></i>');

                          logindisponivel = true;


                      }  
                      else  
                      {  
                           $("#divlogin").removeClass("has-success");
                           $("#divlogin").addClass("has-error");
                          msgbox.html('Login - O login já esta em uso :(');

                          logindisponivel=false;
                      }  
                     
                }, 
                 
                error: function(){
                      $("#titulo").html('<i class="fa fa-cross fa-spin"></i>&nbsp;Login - Erro AJAX!');
                      logindisponivel=false;
                }

            }); 

        } else {
            $("input#flogin").addClass("has-error");
            $("#titulo").html('<label id="titulo" class="control-label" for="flogin">Login</label>');
        }
        return false;
    });

    $("button#submit").click(function(){

        if ($("input#nome").val() == "") {
            alert("Preencha Seu Nome Completo!");
        }else{
          var now = new Date();
            if ($("input#nasc").val() == "") {
              alert("Informe sua data de nascimento!");
            /*}else if (new Date($("input#nasc").val()) > now.setFullYear(now.getFullYear() - 13)) {
              alert("Você precisa ter 13 anos ou mais.")*/
            }else{
                if ($("input#email").val() == "") {
                    alert("Informe seu email!");
                }else{
                    if ($("input#password").val() == "") {
                        alert("Crie uma senha!");
                    }else{
                        if(loaded && logindisponivel){
                            return;
                        }else{
                            criaconta();
                            loaded = true;
                        }

                    };
                };
            };
        };
      });
    });


function criaconta(){

                                var nome = $("input#nome").val();
                                var sexo = $("select#sexo").val();
                                var apelido = $("input#apelido").val();
                                var telefone = $("input#telefone").val();
                                var nasc = $("input#nasc").val();
                                var email = $("input#email").val();
                                var escola = $("input#escola").val();
                                var cidade = $("input#cidade").val();
                                var serie = $("input#serie").val();
                                var autoriza = $("input#autoriza").val();
                                var login = $("input#flogin").val();
                                var senha = $("input#password").val();
                                $.ajax({
                                    type: "POST",
                                    url: "php/cria.php", 
                                    data:{
                                        nome:nome, //
                                        sexo:sexo,//
                                        nasc:nasc,//
                                        email:email,//
                                        login:login,//
                                        senha:senha,//
                                        apelido:apelido,
                                        telefone:telefone,
                                        escola:escola,
                                        cidade:cidade,
                                        serie:serie,
                                        autoriza:autoriza
                                    },
                                    success: function(msg){
                                        alert(msg); //hide button and show thank you
                                        $("#cria").modal('hide'); //hide popup 
                                        //FAZER SISTEMA DE LOGAR AUTOMATICAMENTE
                                                        var login = $("input#flogin").val();
                                                     var senha = $("input#password").val();
                                            $.ajax({
                                            type: "POST",
                                            url: "php/login.php", 
                                            data:{
                                                login: login,
                                                senha: senha
                                            },
                                            success: function(){
                                                self.location="/desafio/home/";
                                            },
                                            error: function(){
                                                alert("AJAX Error: Login depois de criar conta. Será necessário atualizar seu navegador");
                                            }
                                        });



                    },
                    error: function(){
                        alert("Erro AJAX ao criar conta. Por favor, atualize seu navegador e tente novamente");
                    }
                });

}
</script>


    </body>

</html>

