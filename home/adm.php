<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-gear fa-1x"></i> Master
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="/desafio/dash/"> Painel das Missões</a>
                            </li><!--
                            <li>
                                <i class="<?php echo $lin2_p['icone']; ?>"></i><a href="/desafio/adm/"><?php echo $lin2_p['nome']; ?></a>
                            </li>-->
                            <li id="atualtab" class="active"><i class="fa fa-user"></i> Estatísticas</li>
                        </ol>
                    </div>
                </div>
<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a id="aestatisticas" href="#estatisticas" data-toggle="tab">Estatísticas</a></li>
   <li class="dropdown">
      <a href="#" id="missoestab" class="dropdown-toggle" 
         data-toggle="dropdown">Missões 
         <b class="caret"></b>
      </a>
      <ul class="dropdown-menu" role="menu" aria-labelledby="missoestab">
         <li><a id="amissoes" href="#missoes" tabindex="-1" data-toggle="tab">Listar missões</a></li>
         <li><a id="amissoes" href="#addmissoes" tabindex="-1" data-toggle="tab">Adicionar Missões</a></li>
      </ul>
   </li>
   <li><a id="acontas" href="#contas" data-toggle="tab">Contas</a></li>
</ul>



<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="estatisticas">
<div class="row">
            <div class="col-lg-3 col-sm-4">
              <div class="circle-tile ">
                <a href="#"><div class="circle-tile-heading red"><i class="fa fa-bug fa-fw fa-3x"></i></div></a>
                <div class="circle-tile-content red">
                  <div class="circle-tile-description text-faded"> Bugs </div>
                  <div class="circle-tile-number text-faded "><?php echo total_bugs(); ?></div>
                  <a class="circle-tile-footer" data-toggle="modal" href="#count_bugs">Mais <i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div> 
            <div class="col-lg-3 col-sm-4">
          <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading green"><i class="fa fa-list fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content green">
              <div class="circle-tile-description text-faded"> Ranking </div>
              <div class="circle-tile-number text-faded ">10</div>
              <a class="circle-tile-footer" data-toggle="modal"  href="#ranking">Mais <i class="fa fa-chevron-circle-right"></i></a>
            </div>
          </div>
        </div> 
        <div class="col-lg-3 col-sm-4">
          <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading orange"><i class="fa fa-file-code-o fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content orange">
              <div class="circle-tile-description text-faded"> Páginas</div>
              <div class="circle-tile-number text-faded ">Mais visitadas</div>
              <a class="circle-tile-footer" data-toggle="modal" href="#opadmin">Mais <i class="fa fa-chevron-circle-right"></i></a>
            </div>
          </div>
        </div> 
      <!--  <div class="col-lg-4 col-sm-6">
          <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading red"><i class="fa fa-copy fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content red">
              <div class="circle-tile-description text-faded"> Contas Duplicadas </div>
              <div id="nomecontdup" class="circle-tile-number text-faded "><?php echo dup_c(); ?></div>
              <a class="circle-tile-footer" id="contdup" name="contdup">Deletar contas duplicadas <i class="fa fa-chevron-circle-right"></i></a>
            </div>
          </div>
        </div> -->
        <div class="col-lg-3 col-sm-4">
          <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content blue">
              <div class="circle-tile-description text-faded"> Padawans</div>
              <div class="circle-tile-number text-faded "><?php echo c_alunos(); ?></div>
               <a class="circle-tile-footer" data-toggle="modal" href="#alundia">Padawans adicionados no dia <i class="fa fa-chevron-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-4">
          <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading green"><i class="fa fa-star fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content green">
              <div class="circle-tile-description text-faded"> Total de pontos </div>
              <div class="circle-tile-number text-faded "><?php echo total_p(); ?></div>
               <a class="circle-tile-footer" data-toggle="modal" href="#mediapont">Média de pontos por usuário <i class="fa fa-chevron-circle-right"></i></a>
            </div>
          </div>
        </div> 
        <div class="col-lg-3 col-sm-4">
          <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading orange"><i class="fa fa-bar-chart fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content orange">
              <div class="circle-tile-description text-faded"> Estatísticas das </div>
              <div class="circle-tile-number text-faded ">Missões</div>
               <a class="circle-tile-footer" data-toggle="modal" href="#stats">Mais detalhes <i class="fa fa-chevron-circle-right"></i></a>
            </div>
          </div>
        </div> 
        <div class="col-lg-3 col-sm-4">
          <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content blue">
              <div class="circle-tile-description text-faded">Inscritos</div>
              <div class="circle-tile-number text-faded ">por Dia</div>
               <a class="circle-tile-footer" data-toggle="modal" href="#userdia">Mais detalhes <i class="fa fa-chevron-circle-right"></i></a>
            </div>
          </div>
        </div> 
</div>
</div>
   <div class="tab-pane fade" id="missoes">
   <p>
   	<div class="row">
      		<div style="overflow:auto;"> 
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Ref</th>
                                        <th>Cor</th>
                                        <th>Máximo de Pontos</th>
                                        <th>Deletar</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?
                                //depois dar opção de mudar ordem através do order by
                                $sql_miss	=	"SELECT * FROM missoes order by id desc";
                                $sql_res_miss	=	mysqli_query($mysql, $sql_miss);
                                while ( $sql_lin_miss	=	mysqli_fetch_array($sql_res_miss)	) {
                                ?>
                                    <tr id="<? echo $sql_lin_miss['id']; ?>">
                                        <td><? echo $sql_lin_miss['id']; ?> </td>
                                        <td><? echo $sql_lin_miss['nome']; ?></td>
                                        <td><? echo $sql_lin_miss['ref']; ?></td>
                                        <td><? echo $sql_lin_miss['color']; ?></td>
                                        <td><? echo $sql_lin_miss['max']; ?></td>                                      
                                        <td><i id="xmissdel" onclick="missdel(<? echo $sql_lin_miss['id']; ?>)" class="fa fa-times fa-2x delx"></i></td>
                                    </tr>
                              <? }; ?>  

                                </tbody>
                            </table>
                            </div>
                            </div>
                            </div>
                            </p>
   </div>


<div class="tab-pane fade" id="addmissoes">
<div class="row" style="margin-top:10px;">
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="text" name="htmlnome" id="htmlnome" class="form-control" value="" required="required" pattern="" title="" placeholder="Nome">
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" name="htmlmax" id="htmlmax" class="form-control" value="" min="" max="" step="" required="required" title=""placeholder="Pontuação Máxima">   
</div>
</div>
<div class="row">
      <p>
	    <textarea name="htmlmiss" id="htmlmiss" cols="30" rows="10" style="width:95%; height:300px; margin-top:20px; margin-left:15px;"></textarea>
      </p>
    <button name="htmlbut" id="htmlbut" type="button" class="btn btn-success" style="margin-left:15px;">Enviar</button>
</div>
</div>


   <div class="tab-pane fade" id="contas">
      <p>
      <div class="row">
                        <div class="col-lg-6">                  	
                        <div style="margin-bottom:10px;" class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-danger" data-toggle="modal" href='#modal-admin'><i class="fa fa-plus"></i> Administrador</button>
			  <button type="button" class="btn btn-info" data-toggle="modal" href='#modal-user'><i class="fa fa-plus"></i> Usuário</button>
			  <button type="button" class="btn btn-warning" data-toggle="modal" href='#modal-tutor'><i class="fa fa-plus"></i> Tutor</button>
		   
       </div>
                        </div>
      </div>
      		<div style="overflow:auto;"> 
	
	      		<div class="filters ">
	      			
	      			<script>
	      				var currentRequest = null;
	      				var filter = {
	      					data: {
	      						url: '/desafio/home/json.php'
	      					},
							filters: {
	      						max: 30,
	      						page: 0
	      					},
							nextPage: function(){
								this.filters.page++;
								return this.query();
							},
							prevPage: function(){
								if(this.filters.page > 0) this.filters.page--;
								return this.query();
							},
							query: function(){
								currentRequest = $.ajax({
									method: "POST",
								  	url: this.data.url,
								  	data: this.filters,
								  	beforeSend: function( xhr ) {
								  		if( currentRequest != null ){
								  			currentRequest.abort();
								  		} 
								  		$(".loadinggif").show('slow');
								    	xhr.overrideMimeType( "text/plain; charset=utf-8" );
								  	}
								}).done(function( data ) {
									data = JSON.parse(data);
								    $("#tablecontent").html(data.html);
								    $(".loadinggif").hide("slow");
								  });
							},
							addEvents: function(){
								$('input[id^="filtro"]').on('keyup', function(){
									if(this.value.length > 0){
										filter.filters[$(this).data('name')] = this.value;
									} else {
										filter.filters[$(this).data('name')] = null;
									}
									filter.filters.page = 0;
									filter.query();
								})
							}
						}



	      			</script>
					<style>
						.loadinggif{
							background: url(../img/progress.gif) no-repeat;
						    width: 20px;
						    height: 20px;
						    background-size: contain;
						    display: block;
						    margin: auto;
						}
						.filters .line{
							display:none;
						}
						.filters .title{
							float: left;
						    margin: 10px;
							background: #eee;
							display: block;
							width: 77px;
							padding: 10px;
							cursor: pointer;
						}
	
					</style>
	      			<div class="title" onclick='$(".filters > .line").toggle();'>Buscar</div> 
	      			<div class="loadinggif"></div>
	      			<div style='clear:both;'></div>
                    	<div class="line row">
	      				<label class='col-xs-2 col-sm-2 col-md-2 col-lg-2' for="filtronome">ID:</label>
	      				<input class='col-xs-4 col-sm-4 col-md-4 col-lg-4' type="text" id='filtroid' data-name='id'>
	      			</div>
	      			<div class="line row">
	      				<label class='col-xs-2 col-sm-2 col-md-2 col-lg-2' for="filtronome">Nome:</label>
	      				<input class='col-xs-4 col-sm-4 col-md-4 col-lg-4' type="text" id='filtronome' data-name='nome'>
	      			</div>
	      			<div class="line row">
	      				<label class='col-xs-2 col-sm-2 col-md-2 col-lg-2' for="filtroemail">E-mail:</label>
	      				<input class='col-xs-4 col-sm-4 col-md-4 col-lg-4' type="text" id='filtroemail' data-name='email'>
	      			</div>
	      			<div class="line row">
	      				<label class='col-xs-2 col-sm-2 col-md-2 col-lg-2' for="filtrocidade">Cidade:</label>
	      				<input class='col-xs-4 col-sm-4 col-md-4 col-lg-4' type="text" id='filtrocidade' data-name='cidade'>
	      			</div>
	      			<div class="line row">
	      				<label class='col-xs-2 col-sm-2 col-md-2 col-lg-2' for="filtroescola">Escola:</label>
	      				<input class='col-xs-4 col-sm-4 col-md-4 col-lg-4' type="text" id='filtroescola' data-name='escola'>
	      			</div>
	      		</div>


                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped overflow-x: scroll;">
                                <thead>
                                    <tr>
                                        <th  style="max-width: 30px;">Id</th>
                                        <th  style="max-width: 100px;">Nome</th>
                                        <th  style="max-width: 100px;">Login</th>
                                        <th  style="max-width: 150px;">Email</th>
                                        <!-- <th  style="max-width: 60px;">IP</th> -->
                                        <!-- <th  style="max-width: 30px;">Autoriza Fotos</th> -->
                                    	<!-- <th  style="max-width: 30px;">Serie</th> -->
                                    	<!--<th  style="max-width: 60px;">Cidade</th>
                                    	<th  style="max-width: 80px;">Escola</th> -->
                                   	    <th  style="max-width: 50px">Nascimento</th>
                                        <!--<th  style="max-width: 60px;">Telefone</th>
                                    	 <th  style="max-width: 50px;">Apelido</th>
                                        <th  style="max-width: 20px;">ID Tutor</th>
                                        <th  style="max-width: 20px;">Nome Tutor</th>
                                    	<th  style="max-width: 20px;">Classe</th>-->
                                    	<th  style="max-width: 20px;">Última missão</th>
                                        <!--<th  style="max-width: 20px;">Pontos</th>-->
                                    	<th  style="max-width: 20px;">Deletar</th>
                                    </tr>
                                </thead>
                                <tbody id='tablecontent'>
                            <?
                                //depois dar opção de mudar ordem através do order by
                                $sql_log  = "SELECT * FROM users order by id desc LIMIT 0, 1000";
                                

                                ?>
                                </tbody>
                            </table>

                            <script>fakewait = setInterval(function(){if(typeof($) != "undefined"){clearInterval(fakewait);filter.addEvents();filter.query();}}, 100);</script>
                        </div></p>
   </div>
</div>
<div class="modal fade" id="modal-admin">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-header-danger">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Adicionar Administrador</h4>
			</div>
			<div class="modal-body">
				<form name="fcria" id="fcria">







                <label for="nome">Nome Completo</label><input type="text" class="form-control" id="anome" placeholder="" required>
                <label for="apelido">Apelido</label><input type="text" class="form-control" id="aapelido" placeholder="" required>
                <label for="flogin">Login</label><input type="text" name="flogin" id="aflogin" class="form-control" value="" required="required" pattern="" title="">
                <label for="password">Senha</label><input type="password" name="password" id="apassword" class="form-control" required="required" title="">
                <label for="telefone">Telefone</label><input type="text" class="form-control" id="atelefone" placeholder="" required>
                <label for="nasc">Data de nascimento</label><input type="date" name="nasc" id="anasc" class="form-control" value="" required title="" placeholder="dd/mm/aaaa">
                <label for="email">Email</label><input type="email" name="email" id="aemail" class="form-control" value="" required title="">
                <label for="escola">Escola</label><input type="text" name="escola" id="aescola" class="form-control" value="" required pattern="" title="">
                <label for="cidade">Cidade</label><input type="text" name="cidade" id="acidade" class="form-control" value="" required pattern="" title="">
                <label for="serie">Série</label><input type="text" name="serie" id="aserie" class="form-control" value="" required pattern="" title="" placeholder="Última série concluida">


                            <input type="hidden" id="atipo" value="admin"> 
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="true" id="aautoriza">
                                    Autoriza o uso das imagens capturadas nos <i>Code Places</i> para fins de divulgação do programa <b>Code Wars</b> Educatic na mídia.
                                </label>
                            </div>
                            </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" id="acriar" class="btn btn-primary">Criar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-header-primary">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Adicionar Usuário</h4>
			</div>
			<div class="modal-body">
			<form name="fcria" id="fcria">
				<label for="nome">Nome Completo</label><input type="text" class="form-control" id="unome" placeholder="" required>
				<label for="apelido">Apelido</label><input type="text" class="form-control" id="uapelido" placeholder="" required>
				<label for="flogin">Login</label><input type="text" name="flogin" id="uflogin" class="form-control" value="" required="required" pattern="" title="">
				<label for="password">Senha</label><input type="password" name="password" id="upassword" class="form-control" required="required" title="">
				<label for="telefone">Telefone</label><input type="text" class="form-control" id="utelefone" placeholder="" required>
				<label for="nasc">Data de nascimento</label><input type="nasc" name="" id="unasc" class="form-control" value="" required title="">
				<label for="email">Email</label><input type="email" name="" id="uemail" class="form-control" value="" required title="">
				<label for="escola">Escola</label><input type="text" name="escola" id="uescola" class="form-control" value="" required pattern="" title="">
				<label for="cidade">Cidade</label><input type="text" name="cidade" id="ucidade" class="form-control" value="" required pattern="" title="">
				<label for="serie">Série</label><input type="text" name="serie" id="userie" class="form-control" value="" required pattern="" title="" placeholder="Última série concluida">
                           <input type="hidden" id="utipo" value="user">    
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="true" id="uautoriza">
                                    Autoriza o uso das imagens capturadas nos <i>Code Places</i> para fins de divulgação do programa <b>Code Wars</b> Educatic na mídia.
                                </label>
                            </div>
                            </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" id="ucriar" class="btn btn-primary">Criar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal-tutor">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-header-warning">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Adicionar Tutor</h4>
			</div>
			<div class="modal-body">
				<form name="fcria" id="fcria">
                <label for="nome">Nome Completo</label><input type="text" class="form-control" id="tnome" placeholder="" required>
                <label for="apelido">Apelido</label><input type="text" class="form-control" id="tapelido" placeholder="" required>
                <label for="flogin">Login</label><input type="text" name="flogin" id="tflogin" class="form-control" value="" required="required" pattern="" title="">
                <label for="password">Senha</label><input type="password" name="password" id="tpassword" class="form-control" required="required" title="">
                <label for="telefone">Telefone</label><input type="text" class="form-control" id="ttelefone" placeholder="" required>
                <label for="nasc">Data de nascimento</label><input type="nasc" name="" id="tnasc" class="form-control" value="" required title="">
                <label for="email">Email</label><input type="email" name="" id="temail" class="form-control" value="" required title="">
                <label for="escola">Escola</label><input type="text" name="escola" id="tescola" class="form-control" value="" required pattern="" title="">
                <label for="cidade">Cidade</label><input type="text" name="cidade" id="tcidade" class="form-control" value="" required pattern="" title="">
                <label for="serie">Série</label><input type="text" name="serie" id="tserie" class="form-control" value="" required pattern="" title="" placeholder="Última série concluida">
                         <input type="hidden" id="ttipo" value="tutor">   
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="true" id="tautoriza">
                                    Autoriza o uso das imagens capturadas nos <i>Code Places</i> para fins de divulgação do programa <b>Code Wars</b> Educatic na mídia.
                                </label>
                            </div>
                            </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" id="tcriar" class="btn btn-primary">Criar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="count_bugs">
    <div class="modal-dialog"  style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Listagem de bugs</h4>
            </div>
            <div class="modal-body">
             <div style="overflow:auto;"> 
                <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Id do Usuário</th>
                                        <th>E-mail</th>
                                        <th>Onde</th>
                                        <th>Oque</th>
                                        <th>IP</th>
                                        <th>URL</th>
                                        <th>Deletar</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?
                                //depois dar opção de mudar ordem através do order by
                                $sql_bug   =   "SELECT b.id, b.id_report, b.onde, b.oque, b.ip, b.url, u.email FROM bug b, users u WHERE b.id_report = u.id order by b.id desc";
                                $sql_res_bug   =   mysqli_query($mysql, $sql_bug);
                                while ( $sql_lin_bug   =   mysqli_fetch_array($sql_res_bug)    ) {
                                ?>
                                    <tr id="<? echo $sql_lin_bug['id']; ?>">
                                        <td><? echo $sql_lin_bug['id']; ?> </td>
                                        <td><? echo $sql_lin_bug['id_report']; ?></td>
                                        <td><? echo $sql_lin_bug['email']; ?></td>
                                        <td><? echo $sql_lin_bug['onde']; ?></td>
                                        <td><? echo $sql_lin_bug['oque']; ?></td>
                                        <td><? echo $sql_lin_bug['ip']; ?></td>                                      
                                        <td><? echo $sql_lin_bug['url']; ?></td> 
                                      <td><i id="xmissdel" onclick="bugiddel(<? echo $sql_lin_bug['id']; ?>)" class="fa fa-times fa-2x delx"></i></td>
                         
                                    </tr>
                              <? }; ?>  

                                </tbody>
                            </table>
                            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="ranking">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ranking</h4>
            </div>
            <div class="modal-body">
                <div style="overflow:auto;"> 
                <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome do padawan</th>
                                        <th>Total de Pontos</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?
                                //depois dar opção de mudar ordem através do order by
                                $sql_ran   =   "SELECT * FROM users order by total desc LIMIT 0 , 100";
                                $sql_res_ran   =   mysqli_query($mysql, $sql_ran);
                                while ( $sql_lin_ran   =   mysqli_fetch_array($sql_res_ran)    ) {
                                ?>
                                    <tr onclick="detalhealuno(<? echo $sql_lin_ran['id']; ?>)" id="<? echo $sql_lin_ran['id']; ?>">
                                        <td><? echo $sql_lin_ran['id']; ?> </td>
                                        <td><? echo $sql_lin_ran['nome']; ?></td>
                                        <td><? echo $sql_lin_ran['total']; ?></td>
                                    </tr>
                              <? }; ?>  

                                </tbody>
                            </table>
                            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="opadmin">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header modal-header-danger">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Páginas mais visitadas</h4>
      </div>
      <div class="modal-body">
                        <div style="overflow:auto;"> 
                <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>URL</th>
                                        <th>Quantidade de acessos</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?
                                //depois dar opção de mudar ordem através do order by
                                $sql_ac   =   "SELECT * FROM visualizacao order by qtd desc LIMIT 0 , 10";
                                $sql_res_ac   =   mysqli_query($mysql, $sql_ac);
                                while ( $sql_lin_ac   =   mysqli_fetch_array($sql_res_ac)    ) {
                                ?>
                                    <tr id="<? echo $sql_lin_ac['id']; ?>">
                                        <td><? echo $sql_lin_ac['id']; ?></td>
                                        <td><? echo $sql_lin_ac['url']; ?></td>
                                        <td><? echo $sql_lin_ac['qtd']; ?></td>
                                    </tr>
                              <? }; ?>

                                </tbody>
                            </table>
                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="mediapont">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-warning">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Media de pontos por usuário</h4>
      </div>
      <div class="modal-body">
        Média: <h1><?php echo round(total_p()/c_alunos()); ?><i class="fa fa-fw fa-yellow fa-star"></i></h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alundia">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Total de padawans adicionados no dia de hoje</h4>
      </div>
      <div class="modal-body">
        <?php 
          $qry_dia = "SELECT users.id, DATE_FORMAT(users.DataAdd, '%Y-%m-%d') FROM users WHERE DATE_FORMAT(users.DataAdd, '%Y-%m-%d') = CURDATE()";
          $result_dia = mysqli_query($mysql, $qry_dia);
          $qry_dia = date("d/m/y");   
          echo "Total adicionados no dia <kbd>".$qry_dia."</kbd>: <h1>".mysqli_num_rows($result_dia)."</h1>";
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="stats">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-primary">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Estatisticas das missões</h4>
      </div>
      <div class="modal-body">
        <table class="table table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th>Missão</th>
              <th>Quantidade de padawans que fizeram</th>
            </tr>
          </thead>
          <tbody>
          <tr class="warning">
            <td>Nenhuma Missão</td>
            <td><?php echo num_al_m_n(); ?></td>
          </tr>
            <?php
              for($im=1; $im<=max_m(); $im++){
                echo"<tr>";
                echo"<td>Missão ".$im."</td>";
                echo"<td>".num_al_m($im)."</td>";
                echo"<tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="userdia">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Adicionados por dia</h4>
      </div>
      <div class="modal-body">
      
      
     
        <?php
          $qry_dia = "SELECT users.id, DATE_FORMAT(users.DataAdd, '%Y-%m-%d') FROM users WHERE DATE_FORMAT(users.DataAdd, '%Y-%m-%d') = DATE_ADD(CURDATE(), INTERVAL -1 DAY)";
          $result_dia = mysqli_query($mysql, $qry_dia);
          $qry_dia = date("d/m/y");   
          echo "Inscritos Ontem: ".mysqli_num_rows($result_dia)." padawans\n\n<br/>";
          
        $result = mysqli_query($mysql, "SELECT * FROM users WHERE DATE_FORMAT(users.DataAdd, '%Y-%m-%d') = DATE_ADD(CURDATE(), INTERVAL -2 DAY)");
            $num_rows = mysqli_num_rows($result);

            echo "Inscritos há 2 dias: $num_rows padawans\n\n<br/>";
        
        $result1 = mysqli_query($mysql, "SELECT * FROM users WHERE DATE_FORMAT(users.DataAdd, '%Y-%m-%d') = DATE_ADD(CURDATE(), INTERVAL -3 DAY)");
            $num_rows1 = mysqli_num_rows($result1);

            echo "Inscritos há 3 dias: $num_rows1 padawans\n\n<br/>";
        
        $result2 = mysqli_query($mysql, "SELECT * FROM users WHERE DATE_FORMAT(users.DataAdd, '%Y-%m-%d') = DATE_ADD(CURDATE(), INTERVAL -4 DAY)");
            $num_rows2 = mysqli_num_rows($result2);

            echo "Inscritos há 4 dias: $num_rows2 padawans\n\n<br/>";
        
        $result3 = mysqli_query($mysql, "SELECT * FROM users WHERE DATE_FORMAT(users.DataAdd, '%Y-%m-%d') = DATE_ADD(CURDATE(), INTERVAL -5 DAY)");
            $num_rows3 = mysqli_num_rows($result3);

            echo "Inscritos há 5 dias: $num_rows3 padawans\n\n<br/>";
        
        $result4 = mysqli_query($mysql, "SELECT * FROM users WHERE DATE_FORMAT(users.DataAdd, '%Y-%m-%d') = DATE_ADD(CURDATE(), INTERVAL -6 DAY)");
            $num_rows4 = mysqli_num_rows($result4);

            echo "Inscritos há 6 dias: $num_rows4 padawans\n\n<br/>";
    
        $result5 = mysqli_query($mysql, "SELECT * FROM users WHERE DATE_FORMAT(users.DataAdd, '%Y-%m-%d') = DATE_ADD(CURDATE(), INTERVAL -7 DAY)");
            $num_rows5 = mysqli_num_rows($result5);

            echo "Inscritos há 7 dias: $num_rows5 padawans\n\n<br/>";
            
         $result6 = mysqli_query($mysql, "SELECT * FROM users WHERE DATE_FORMAT(users.DataAdd, '%Y-%m-%d') = DATE_ADD(CURDATE(), INTERVAL -1 MONTH)");
            $num_rows6 = mysqli_num_rows($result6);

            echo "Inscritos há 30 dias: $num_rows6 padawans\n\n<br/>";

        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
