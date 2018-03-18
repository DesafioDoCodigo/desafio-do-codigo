<?php
$idtutor = $_SESSION['tutor'];

?>
<style>
.card {
  background: #fff;
  border-radius: 2px;
  display: inline-block;
  margin: 0.3rem;
  position: relative;
  width: 97%;
  padding: 1%;
}
.card-4:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

.card-4 {
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}
* {
    margin: 0;
    padding: 0;
}

h1, h3{
  text-transform: uppercase;
  font-weight: normal;
}

.tabs{
    width: 100%;
    display: block;
    margin: 40px auto;
    position: relative;
}

.tabs .tab{
    float: left;
    display: block;
}

.tabs .tab>input[type="radio"] {
    position: absolute;
    top: -9999px;
    left: -9999px;
}

.tabs .tab>label {
    display: block;
    padding: 6px 21px;
    font-size: 14px;
    text-transform: uppercase;
    cursor: pointer;
    position: relative;
    color: #FFF;
    background: #0020b2;
}

.tabs .content {
    z-index: 0;/* or display: none; */
    overflow: hidden;
    width: 100%;
    padding: 25px;
    position: absolute;
    top: 27px;
    left: 0;
    background:  #FFc107;
    color: #000;
    
    opacity:0;
    transition: opacity 400ms ease-out;
}

.tabs>.tab>[id^="tab"]:checked + label {
    top: 0;
    background:  #FFc107;
    color: #F5F5F5;
}

.tabs>.tab>[id^="tab"]:checked ~ [id^="tab-content"] {
    z-index: 1;/* or display: block; */
   
    opacity: 1;
    transition: opacity 400ms ease-out;
}

</style>
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-book fa-1x"></i>Tutor
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="../dash"> Painel das Missões</a>
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
   <li><a id="aalun" href="#alunos" data-toggle="tab">Estudantes</a></li>
    <li><a id="cursot" href="#curso" data-toggle="tab">Formação para Tutores</a></li>
</ul>



<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="idtut">
        
       

      <div class="row">
	       <div id="tutorid">
           <div class="card">
           <p align="center" style="font-size: 70%;">Você tem <span class="label label-danger"><?php echo mysqli_num_rows(mysqli_query($mysql, "SELECT * FROM users WHERE  tutor =  '$idtutor' AND tipo = 'user' order by id desc")); ?></span> estudantes.</p>
           <p align="center">Informe seu ID <span class="button-link"><?php echo $idtutor;  ?></span> <br/>para seus estudantes.</p>
           
             <p align="center">Acesse o material de apoio na Aba<br/> <kbd>Formação para Tutores</kbd> </p>
           
           
           </div>
           
           </div>
        </div>  
        
    </div>

 <!--
Main Layout

<ul>

  <li class="tab">
       <input type="radio" name="tabs" checked="checked" id="tab1" />
       <label for="tab1">One</label>
       <div id="tab-content1" class="content">Text</div>
  </li>

  <li class="tab">
       <input type="radio" name="tabs" checked="checked" id="tab2" />
       <label for="tab2">Two</label>
       <div id="tab-content2" class="content">Text</div>
  </li>

</ul>  



-->
<div class="tab-pane fade" id="curso">


   <div class="row">
   <div class="col-lg-2">
   <p>&nbsp;</p>
   </div>
   <div class="col-lg-8" style="overflow: -webkit-paged-y;">
   

  <ul class="tabs">
    
    <li class="tab">
        <input type="radio" name="tabs" checked="checked" id="tab1" />
        <label for="tab1">#01</label>
        <div id="tab-content1" class="content">
          <h1>Curso de Formação de Tutores</h1>
          <hr/>
          <h3>Seja Bem-Vindo</h3>
          
          <br/>
          <iframe src="https://www.youtube.com/embed/J0I_sb6a5Oc?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="500px"></iframe>
           
         
           
            </div>
    </li>
    
    <li class="tab">
      <input type="radio" name="tabs" id="tab2" />
      <label for="tab2">#02</label>   
      <div id="tab-content2" class="content">
          <h1>Por que Criamos o Desafio?</h1>
          <hr/>
          <h3>Por que é Importante Aprender Programação?</h3>
          <br/>
        <iframe src="https://www.youtube.com/embed/3MpEZmOilTg?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="500px"></iframe>
        </div>
    </li>

     <li class="tab">
      <input type="radio" name="tabs" id="tab3" />
      <label for="tab3">#03</label>   
      <div id="tab-content3" class="content">
          <h1>Por que Criamos o Desafio?</h1>
          <hr/>
          <h3>Qual a Importância da Lógica e da Matemática?</h3>
          <br/>
          <iframe src="https://www.youtube.com/embed/vGCmGSoOxK8?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="500px"></iframe>
         </div>
    </li>

    <li class="tab">
      <input type="radio" name="tabs" id="tab4" />
      <label for="tab4">#04</label>   
      <div id="tab-content4" class="content">
          <h1>Junte-se ao Movimento! </h1>
          <hr/>
          <h3>Com Matemática nós Podemos!</h3>
          <br/>
         <iframe src="https://www.youtube.com/embed/SxndI_x_I6U?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="500px"></iframe>
            </div>
    </li>
    <li class="tab">
      <input type="radio" name="tabs" id="tab5" />
      <label for="tab5">#05</label>   
      <div id="tab-content5" class="content">
          <h1>Depoimentos</h1>
          <hr/>
          <h3>Desafio do Código e os Jogos na Educação</h3>
          <br/>
          <div class="row">
           <div class="col-lg-6">
  
          
         <iframe src="https://www.youtube.com/embed/8TghDOehmko?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="300px"></iframe>
            <br/>
            </div>
             <div class="col-lg-6">
         <iframe src="https://www.youtube.com/embed/znYtlaLf-CI?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="300px"></iframe>
          <br/>
          </div>
          </div>
           <div class="row">
           <div class="col-lg-6">
         <iframe src="https://www.youtube.com/embed/CbVp1Z-NRPU?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="300px"></iframe>
          <br/>
          </div>
           <div class="col-lg-6">
         <iframe src="https://www.youtube.com/embed/-b5Zuqgsr3Q?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="300px"></iframe>
           </div>
           
           </div>
    </li>
    <li class="tab">
      <input type="radio" name="tabs" id="tab6" />
      <label for="tab6">#06</label>   
      <div id="tab-content6" class="content">
          <h1>Code.org</h1>
          <hr/>
          <h3>Como começar a programar na Code.org</h3>
          <br/>
         <iframe src="https://www.youtube.com/embed/byu6Gg0cI2g?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="500px"></iframe>
            </div>
    </li>
    <li class="tab">
      <input type="radio" name="tabs" id="tab7" />
      <label for="tab7">#07</label>   
      <div id="tab-content7" class="content">
          <h1>Khan</h1>
          <hr/>
          <h3>Como entrar na Khan Academy</h3>
          <br/>
         <iframe src="https://www.youtube.com/embed/qfLFGoKyFyQ?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="500px"></iframe>
           <br /><br />
            <h4>Para saber tudo sobre a Khan Academy <a href="https://www.udemy.com/como-usar-a-khan-academy/?couponCode=ACADEMY_KHAN17" class="button-ini">Acesse o Curso</a></h4>
            </div>
    </li>
    <li class="tab">
      <input type="radio" name="tabs" id="tab8" />
      <label for="tab8">#08</label>   
      <div id="tab-content8" class="content">
          <h1>BaBaDum</h1>
          <hr/>
          <h3>Como jogar BabaDum</h3>
          <br/>
         <iframe src="https://www.youtube.com/embed/PliGVzlSXEc?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="500px"></iframe>
            </div>
    </li>
     <li class="tab">
      <input type="radio" name="tabs" id="tab9" />
      <label for="tab9">#09</label>   
      <div id="tab-content9" class="content">
          <h1>Scratch</h1>
          <hr/>
          <h3>Voando com Scratch</h3>
          <br/>
         <iframe src="https://www.youtube.com/embed/30p_dAn6pYE?rel=0&cc_load_policy=1&iv_load_policy=3&autoplay=false" frameborder="0" allowfullscreen width="100%" height="500px"></iframe>
            </div>
    </li>
    
  </ul>
  </div>
  <div class="col-lg-2">
  <p>&nbsp;</p>
  </div>
  </div>
</div>
   <div class="tab-pane fade" id="alunos">
      <p> <!--
      <div class="row">
                        <div class="col-lg-6">                  	
                        <div style="margin-bottom:10px;" class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-info" data-toggle="modal" href='#motut'><i class="fa fa-plus"></i> Aluno</button>
		   </div>
                        </div>
      </div>
-->
<div class="row">
                        <div class="col-lg-6">                  	
                        <h3>Contas dos Seus Estudantes</h3>
                        </div>
      </div>
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
                                $sql_log	=	"SELECT * FROM users WHERE  `tutor` =  '$idtutor' AND tipo = 'user' order by id desc LIMIT 0 , 25";
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
                            
                            </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" id="mtutcriar" class="btn btn-primary">Criar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
