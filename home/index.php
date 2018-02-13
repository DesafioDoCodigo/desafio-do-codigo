<?php
$manutencao = false;
include "../php/func.php";
if(!$_SESSION['login']){
    header("location:../index.php");
    debug_js("sem session");
};



$ref = "dash.php";
$coda = "dash";

if($_GET['p']){
    if($query = mysqli_query($mysql, "SELECT ref FROM paginas WHERE cod = '".$_GET['p']."' AND tipo LIKE '%".$_SESSION['tipo']."%' LIMIT 1") ){
    	if(mysqli_num_rows( $query) > 0){
            $linp = mysqli_fetch_array($query);

            $ref = $linp['ref'];
            $coda = $_GET['p'];
    	}
    }
}
atualiza_session();

if($_GET['k'] == 1 or $_SESSION['khan_api']){

    include_once '../php/oauth-php/library/OAuthStore.php';
    include_once '../php/oauth-php/library/OAuthRequester.php';

    $consumerKey = 'g5Y3yNMyXwe4ytXL';
    $consumerSecret = '59UYyeCfCjJPnxA4';
    $loginCallback = 'http://desafiodocodigo.com.br/desafio/php/ka_client.php';

    $baseUrl = 'https://pt.khanacademy.org';
    $requestTokenUrl = $baseUrl.'/api/auth/request_token';
    $accessTokenUrl = $baseUrl.'/api/auth/access_token';

    $options = array(
        'consumer_key' => $consumerKey,
        'consumer_secret' => $consumerSecret,
        'server_uri' => $baseUrl,
        'signature_methods' => array('HMAC-SHA1'),
        'request_token_uri' => $requestTokenUrl,
        'authorize_uri' => $baseUrl.'/api/auth/authorize',
        'access_token_uri' => $accessTokenUrl,
    );

    $store = OAuthStore::instance('Session', $options);

    $defaultQuery = '/api/v1/user';
    try{
        $request = new OAuthRequester($baseUrl.$defaultQuery, 'GET');
        $result = $request->doRequest(0);
        session_start();
        //session_register("khan_api");

        $_SESSION['khan_api'] = 1;

        $khan_api =  json_decode($result['body'], TRUE);
    } catch (OAuthException2 $e){
        $_SESSION['khan_api'] = false;
    }

}
?>




<!DOCTYPE html>
<html lang="pt_BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Aprenda a programar um computador. Seu futuro vai depender cada vez mais desse conhecimento.
        Aprenda a hackear tudo a sua volta e transformar a sua realidade como quiser. Garantimos que vai ser muito divertido!" />
		<meta name="keywords" content="educacao, computador, learning, educational technology" />

    <title>DESAFIO DO CÓDIGO - EducaTIc Code Wars - Painel de Controle</title>

    <!-- Bootstrap Core CSS -->
    <link href="/desafio/home/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link href="/desafio/home/css/sb-admin.css" rel="stylesheet"/>
    <link href="/desafio/home/css/missoes.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="/desafio/home/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/desafio/css/alertify.default.css" />
    <link rel="stylesheet" href="/desafio/css/alertify.core.css" />
        <link rel="stylesheet" href="/desafio/css/datepicker.css"/>
        <link rel="stylesheet" href="/desafio/css/sweet-alert.css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="apple-touch-icon" sizes="57x57" href="../../codewars/images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../../codewars/images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../../codewars/images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../../codewars/images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../../codewars/images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../../codewars/images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../../codewars/images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../../codewars/images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../../codewars/images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../../codewars/images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../codewars/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../../codewars/images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../codewars/images/favicon-16x16.png">
<link rel="manifest" href="../../codewars/images/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../../codewars/images/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48876740-8', 'auto');
  ga('send', 'pageview');

</script>
<style>

.page-header {  
    margin: 80px 0 20px;
}</style>
</head>

<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NCLWT5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NCLWT5');</script>
<!-- End Google Tag Manager -->
  <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/desafio/home/">Desafio do Código&nbsp;<?php if($_SESSION['tipo'] == "admin"){echo'<span class="label label-danger">Modo Admin</i></span>';}elseif($_SESSION['tipo'] == "tutor"){echo'<span class="label label-warning">Modo Tutor</i></span>';}  if($manutencao == true){echo'  <span class="label label-warning"> Em Manutenção!</span>';}?></a>
            </div>
            <!-- Top Menu Items -->
             <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-left top-nav">
               
           
		<?

		$res_p  = mysqli_query($mysql, "SELECT nome, cod, icone FROM paginas WHERE tipo LIKE '%".$_SESSION['tipo']."%' order by id ASC");
		while ( $lin_p = mysqli_fetch_array($res_p) ) {
			?>
			<li class="<?php echo ($lin_p['cod'] == $coda ? "active":""); ?>">
				<a href="/desafio/<?php echo $lin_p['cod']; ?>/">
					<i class="<?php echo $lin_p['icone']; ?>"></i>
					<?php echo $lin_p['nome']; ?>
				</a>
			</li>
			<?
		}
		?>
        </ul></div>
        <ul class="nav navbar-right top-nav">
                <li>
                <?php
                    if(!$khan_api){
                        echo'<a href="/desafio/php/ka_client.php?login=1">Entrar na Khan Academy para Autenticar! <i style="color:#9DB63B;" class="fa fa-fw fa-green fa-leaf"></i></a></li>';
                    }else{
                        echo'<a data-toggle="modal" href="#khanmodal">'.$khan_api['points'].' <i style="color:#9DB63B;" class="fa fa-fw fa-green fa-leaf"></i></a></li>';
                    }
                ?>
                <li onclick="detalhealuno(<? echo $_SESSION['id']; ?>)"><a href="#"><?php echo c_points($_SESSION['id']); ?> <i class="fa fa-fw fa-star"></i></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="nome"><i class="fa fa-user"></i> <?php if($_SESSION['apelido']==""){echo $_SESSION['login'];}else{echo $_SESSION['apelido'];}?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a data-toggle="modal" href='#meuperfil'><i class="fa fa-fw fa-user"></i> Meu Perfil</a>
                        </li>
                        <li>
                            <a data-toggle="modal" href='#configuracoes'><i class="fa fa-fw fa-sliders"></i> Configurações</a>
                        </li>
                        <li>
                            <a data-toggle="modal" href='#erro'><i class="fa fa-fw fa-bug"></i> Reportar um Problema!</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/desafio/logout/"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
             
              </ul>  
           
            
            
                
                
            
            <!-- /.navbar-collapse -->
        </nav>

</div>

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php
                 include $ref;
                ?>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->


<div class="modal fade" id="khanmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="color:#fff;
                    padding:9px 15px;
                    border-bottom:1px solid #eee;
                    background-color: #9DB63B;
                    -webkit-border-top-left-radius: 5px;
                    -webkit-border-top-right-radius: 5px;
                    -moz-border-radius-topleft: 5px;
                    -moz-border-radius-topright: 5px;
                     border-top-left-radius: 5px;
                     border-top-right-radius: 5px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Khan Academy - Estatísticas</h4>
            </div>
            <div class="modal-body">
                Pontos de energia: <span class="label label-primary" style="font-size:15px;"><?php echo $khan_api['points']; ?> <i style="color:#9DB63B;" class="fa fa-fw fa-green fa-leaf"></i></span></br>
                </br><img src="https://cdn.kastatic.org/images/badges/meteorite-70x70.png"><span class="label label-default" style="font-size:20px;"><?php echo $khan_api['badge_counts'][0]; ?></span>
                </br><img src="https://cdn.kastatic.org/images/badges/moon-70x70.png"><span class="label label-default" style="font-size:20px;"><?php echo $khan_api['badge_counts'][1]; ?></span>
                </br><img src="https://cdn.kastatic.org/images/badges/earth-70x70.png"><span class="label label-default" style="font-size:20px;"><?php echo $khan_api['badge_counts'][2]; ?></span>
                </br><img src="https://cdn.kastatic.org/images/badges/sun-70x70.png"><span class="label label-default" style="font-size:20px;"><?php echo $khan_api['badge_counts'][3]; ?></span>
                </br><img src="https://cdn.kastatic.org/images/badges/eclipse-70x70.png"><span class="label label-default" style="font-size:20px;"><?php echo $khan_api['badge_counts'][4]; ?></span>
                </br><img src="https://cdn.kastatic.org/images/badges/master-challenge-blue-70x70.png"><span class="label label-default" style="font-size:20px;"><?php echo $khan_api['badge_counts'][5]; ?></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="erro">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header <?php if($_SESSION['tipo'] == "admin"){echo'modal-header-danger';}elseif($_SESSION['tipo'] == "tutor"){echo'modal-header-warning';}else{echo'modal-header-primary';} ?>">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-bug fa-2x"></i>  Reportar um Problema!</h4>
            </div>
            <div class="modal-body">
                Esse sistema ainda está em desenvolvimento (<i>beta</i>).<br /> 
                Por conta disso, podem existir alguns erros (<i>bugs</i>) espalhados pelo sistema!
                <br />Nos ajude a encontrá-los:
                <br />
                <div style="margin-top:10px;">
                    <div class="form-group">
                        <label for="">Onde:</label>
                        <input type="text" class="form-control" id="onde" required="required" placeholder="Ex: No Desafio #04">
                    </div>
                    <div class="form-group">
                        <label for="">O que:</label>
                        <input type="text" class="form-control" id="oque" required="required" placeholder="Ex: Não reconhece minha resposta">
                    </div>
                    <input type="hidden" name="url" id="url" class="form-control" value="<?php echo url(); ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" id="matarbug" class="btn btn-success">Enviar o Problema <i class="fa fa-bug"></i></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="alundetalhes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header <?php if($_SESSION['tipo'] == "admin"){echo'modal-header-danger';}elseif($_SESSION['tipo'] == "tutor"){echo'modal-header-warning';}else{echo'modal-header-primary';} ?>">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Desempenho</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Missão</th>
                            <th>Pontos</th>
                            <th>Máximo</th>
                        </tr>
                    </thead>
                    <tbody id="bodytabela">
                         <?
                                //depois dar opção de mudar ordem através do order by
                                $sql_miss   =   "SELECT * FROM missoes order by id";
                                $sql_res_miss   =   mysqli_query($mysql, $sql_miss);
                                while ( $sql_lin_miss   =   mysqli_fetch_array($sql_res_miss)    ) {
                                ?>
                                <tr>
                                        <td><? echo $sql_lin_miss['nome']; ?> </td>
                                        <td id="ponto<? echo $sql_lin_miss['id']; ?>"></td>
                                        <td id="maxim<? echo $sql_lin_miss['id']; ?>"><? echo $sql_lin_miss['max']; ?></td>

                                </tr>
                              <? }; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <div class="modal fade" id="configuracoes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header <?php if($_SESSION['tipo'] == "admin"){echo'modal-header-danger';}elseif($_SESSION['tipo'] == "tutor"){echo'modal-header-warning';}else{echo'modal-header-primary';} ?>">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-fw fa-sliders fa-2x"></i> Configurações da Conta</h4>
            </div>
            <div class="modal-body">
            <form name="conf" id="conf">
                <label for="nome">Nome</label><input type="text" class="form-control" id="nome" placeholder="<?php echo $_SESSION['nome']; ?>"/>
               <label for="apelido">Apelido</label><input type="text" class="form-control" id="apelido" placeholder="<?php echo $_SESSION['apelido']; ?>"/>
               <label for="email">Email</label><input type="text" class="form-control" id="email" placeholder="<?php echo $_SESSION['email']; ?>"/>
                <label for="nasc">Data de Nascimento</label><input type="text" class="form-control" id="nasc" type="date" placeholder="<?php echo $_SESSION['nasc']; ?>"/>
                <label for="telefone">Telefone</label><input type="text" class="form-control" id="telefone" placeholder="<?php echo $_SESSION['telefone']; ?>"/>
                <label for="cidade">Cidade</label><input type="text" class="form-control" id="cidade" placeholder="<?php echo $_SESSION['cidade']; ?>"/>
              <label for="escola">Escola/Faculdade</label><input type="text" class="form-control" id="escola" placeholder="<?php echo $_SESSION['escola']; ?>"/>
                <label for="serie">Série/Curso</label><input type="text" class="form-control" id="serie" placeholder="<?php echo $_SESSION['serie']; ?>"/>
                <label for="login">Login</label><input type="text" class="form-control" id="login" placeholder="<?php echo $_SESSION['login']; ?>"/>
              <!--<label for="senha">Senha</label><input type="text" class="form-control" id="senha" placeholder="******"/>-->
               <?php if($_SESSION['tipo'] !== "tutor"){
              echo'<label for="ctutor">Tutor</label><input type="text" class="form-control" id="ctutor" placeholder="'.$_SESSION['tutor'].'">';
              }
             if($_SESSION['tutor'] AND $_SESSION['tipo'] !== "tutor"){
              echo'<br/><button type="button" id="deltut" class="btn btn-danger">Desvincular Tutor</button>';
               }
               ?>
                <input type="hidden" id="id" value="<?php echo $_SESSION['id']; ?>">
                 
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" id="confsub" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="meuperfil">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header <?php if($_SESSION['tipo'] == "admin"){echo'modal-header-danger';}elseif($_SESSION['tipo'] == "tutor"){echo'modal-header-warning';}else{echo'modal-header-primary';} ?>">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user fa-2x"></i> Meu Perfil</h4>
            </div>
            <div class="modal-body">
                    <div class="row">
               <!-- <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo get_gravatar($_SESSION['email']); ?>" class="img-circle"> </div> -->
                <div class=" col-md-12 col-lg-12 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Tipo:</td>
                        <td><?php if($_SESSION['tipo'] == "admin"){echo "Admin";}elseif ($_SESSION['tipo'] == "user"){echo "Participante";}elseif($_SESSION['tipo'] == "tutor"){echo "Tutor";}; ?></td>
                      </tr>
                      <tr>
                        <td>Nome:</td>
                        <td><?php echo $_SESSION['nome']; ?></td>
                      </tr>
                      <tr>
                        <td>Usuário:</td>
                        <td><?php echo $_SESSION['login']; ?></td>
                      </tr>
                      
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $_SESSION['email']; ?></td>
                      </tr>
                      <tr>
                        <td>Nascimento:</td>
                        <td><?php echo $_SESSION['nasc']; ?></td>
                      </tr>
                   
                        <td>Telefone:</td>
                        <td><?php echo $_SESSION['telefone']; ?></td>
                      </tr>
                        
                      <tr>
                        <td>Cidade:</td>
                        <td><?php echo $_SESSION['cidade']; ?></td>
                      </tr>
                      <tr>
                        <td>Escola:</td>
                        <td><?php echo $_SESSION['escola']; ?></td>
                      </tr>
                      <tr>
                        <td>Série:</td>
                        <td><?php echo $_SESSION['serie']; ?></td>
                      </tr>
                       <?php

                    if($_SESSION['tutor'] !== "" AND $_SESSION['tipo'] !== "tutor"){
                        echo '
                      <tr>
                        <td>Nome do tutor:</td>
                        <td>'.nome_tutor($_SESSION['tutor']).'</td>
                      </tr>';
                  }
                    ?>
                    <?php
                    if ($_SESSION['tipo'] !== "tutor") {
                        ?>
                      <tr>
                        <td>ID do Tutor:</td>
                        <td><?php if($_SESSION['tutor'] == "" ){echo '<a class="" data-toggle="modal" href="#addtutor">Adicionar Tutor</a>';}else{echo "<kbd>".$_SESSION['tutor']."</kbd>"; } ?></td>
                      </tr>
                   <?php
                    }
                    ?>
                       <tr>
                    </tbody>
                  </table>
                </div>
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


<div class="modal fade" id="addtutor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header <?php if($_SESSION['tipo'] == "admin"){echo'modal-header-danger';}elseif($_SESSION['tipo'] == "tutor"){echo'modal-header-warning';}else{echo'modal-header-primary';} ?>">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Adicionar Tutor</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="tutaddid" class="form-control" placeholder="ID do seu Tutor">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" id="submittutaddid" class="btn btn-primary">Salvar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



    <!-- jQuery Version 1.11.0 -->
    <script src="/desafio/home/js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/desafio/home/js/bootstrap.min.js"></script>
     <!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->
    <script src="/desafio/home/js/jquery.knob.js"></script>
            <script src="/desafio/js/bootstrap-wysihtml5.js"></script>
            <script src="/desafio/js/codewars.js?m"></script>
            <script src="/desafio/js/alertify.min.js"></script>
            <script src="/desafio/js/bootstrap-datepicker.js"></script>
            <script src="/desafio/js/sweet-alert.min.js"></script>
            <script src="/desafio/js/ckeditor/ckeditor.js"></script>
            <script type="text/javascript" src="/desafio/js/locales/bootstrap-datepicker.pt-BR.js" charset="UTF-8"></script>
    <script>
    $(function() {
        $(".donut").knob({
            "skin":"tron",
            "value":"0"
        });
    });
    </script>
    <script>
    CKEDITOR.replace( 'htmlmiss', {});</script>
</body>

</html>
