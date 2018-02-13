<?php
$idtutor = $_SESSION['tutor'];

?>
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-book fa-1x"></i>Tutor
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="?p=dash"> Painel das Missões</a>
                            </li><!--
                            <li>
                                <i class="<?php echo $lin2_p['icone']; ?>"></i><a href="/adm"><?php echo $lin2_p['nome']; ?></a>
                            </li>-->
                            <li id="tuttab" class="active"><i class="fa fa-user"></i> ID do Tutor</li>
                        </ol>
                    </div>
</div>

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a id="aid" href="#idtut" data-toggle="tab">ID do Tutor</a></li>
   <li><a id="aalun" href="#alunos" data-toggle="tab">Alunos</a></li>
</ul>



<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="idtut">
        <div class="row">
	       <div id="tutorid">
           <p align="center" style="font-size: 60%;">Você tem <span class="label label-danger"><?php echo mysqli_num_rows(mysqli_query($mysql, "SELECT * FROM `users` WHERE  `tutor` =  '$idtutor' AND tipo = 'user' order by id desc")); ?></span> alunos.</p>
           <p align="center" style="font-size: 60%;">Com essa identificação voc&ecirc; tem acesso aos dados dos seus alunos.</p>
           <p align="center">Informe seu ID <span class="button-link"><?php echo $idtutor;  ?></span> <br/>para seus alunos.</p>
           </div>
        </div>
    </div>



   <div class="tab-pane fade" id="alunos">
      <p>
      <div class="row">
                        <div class="col-lg-6">                  	
                        <div style="margin-bottom:10px;" class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-info" data-toggle="modal" href='#motut'><i class="fa fa-plus"></i> Aluno</button>
		   </div>
                        </div>
      </div class="row">
      		<div style="overflow:auto;"> 
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <!--<th>Autoriza Fotos</th>-->
                                    	<th>Serie</th>
                                    	<th>Cidade</th>
                                    	<th>Escola</th>
                                    	<th>Nascimento</th>
                                    	<th>Telefone</th>
                                    	<th>Apelido</th>
                                    	<th>Ultima missao</th>
                                        <!--<th>Pontos</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                            <?
                                //depois dar opção de mudar ordem através do order by
                                $sql_log	=	"SELECT * FROM users WHERE  `tutor` =  '$idtutor' AND tipo = 'user' order by id desc";
                                $sql_res	=	mysqli_query($mysql, $sql_log);
                                while ( $sql_lin	=	mysqli_fetch_array($sql_res)	) {
                                
                                if($sql_lin['autoriza'] == "true"){
                                	$autoriza = '<i class="fa fa-check"></i>';
                                }else{
                                	$autoriza = '<i class="fa fa-times"></i>';
                                }
                                ?>
                                    <tr onclick="detalhealuno(<? echo $sql_lin['id']; ?>)">
                                        <td><? echo $sql_lin['nome']; ?></td>
                                        <td><? echo $sql_lin['email']; ?></td>
                                        <!--<td><? echo $autoriza; ?></td>-->
                                        <td><?if(empty($sql_lin['serie'])){echo '-';}else{ echo $sql_lin['serie']; }?></td>
                                        <td><? echo $sql_lin['cidade']; ?></td>
                                        <td><?if(empty($sql_lin['escola'])){echo '-';}else{ echo $sql_lin['escola']; }?></td>
                                        <td><? echo $sql_lin['nasc']; ?></td>
                                        <td><? echo $sql_lin['telefone']; ?></td>
                                        <td><? echo $sql_lin['apelido']; ?></td>
                                        <td><? echo $sql_lin['m_last']; ?></td>
                                        <!--<td><? echo $sql_lin['c_points']; ?></td>-->
                                    </tr>
                              <? }; ?>  

                                </tbody>
                            </table>
                        </div></p>
   </div>
</div>

<div class="modal fade" id="motut">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-header-primary">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Adicionar Aluno</h4>
			</div>
			<div class="modal-body">
			<form name="fcria" id="fcria">
				<label for="nome">Nome Completo</label><input type="text" class="form-control" id="mtutnome" placeholder="" required>
				<label for="apelido">Apelido</label><input type="text" class="form-control" id="mtutapelido" placeholder="" required>
				<label for="flogin">Login</label><input type="text" name="flogin" id="mtutflogin" class="form-control" value="" required="required" pattern="" title="">
				<label for="password">Senha</label><input type="password" name="password" id="mtutpassword" class="form-control" required="required" title="">
				<label for="telefone">Telefone</label><input type="text" class="form-control" id="mtuttelefone" placeholder="" required>
				<label for="nasc">Data de nascimento</label><input type="nasc" name="" id="mtutnasc" class="form-control" value="" required title="">
				<label for="email">Email</label><input type="email" name="" id="mtutemail" class="form-control" value="" required title="">
				<label for="escola">Escola</label><input type="text" name="escola" id="mtutescola" class="form-control" value="" required pattern="" title="">
				<label for="cidade">Cidade</label><input type="text" name="cidade" id="mtutcidade" class="form-control" value="" required pattern="" title="">
				<label for="serie">Série</label><input type="text" name="serie" id="mtutserie" class="form-control" value="" required pattern="" title="" placeholder="Última série concluida">
                           <input type="hidden" id="mtuttipo" value="user">   
                           <input type="hidden" id="mtuttutor" value="<?php echo $idtutor; ?>">   
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="true" id="mtutautoriza">
                                    Autoriza o uso das imagens capturadas nos <i>Code Places</i> para fins de divulgação do programa <b>Code Wars</b> Educatic na mídia.
                                </label>
                            </div>
                            </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" id="mtutcriar" class="btn btn-primary">Criar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
