<?php


if(isset($_GET['m']) && preg_match("/^m[0-9]+/i", $_GET['m']) ){
	$mnum = (int)trim(mysqli_real_escape_string($mysql, $_GET['m']), "m");
} else if( isset($_SESSION['m_last']) && $_SESSION['m_last'] > 0 ){
	$mnum = $_SESSION['m_last'];
} else {
	$mnum = 0;
}
$ref = "m".$mnum;

if($mnum > 0){
	//verifica se a missão existe no banco.
	$query = mysqli_query($mysql, "SELECT ref, nome FROM missoes WHERE id = $mnum LIMIT 1");
	if( mysqli_num_rows($query) ){
		$linha = mysqli_fetch_array($query);
		$ref = $linha['ref'];
		$titulo = $linha['nome'];
	}

} 

/*
	//trecho comentado: reduzindo código.

  if($_GET['m']){
    //se vier p essa pagina via get(pela dashboard)faz o codigo abaixo
        $ref = mysqli_real_escape_string($mysql, $_GET['m']);

        $query_sql = "SELECT * FROM missoes WHERE ref= '$ref'";
        $query = mysqli_query($mysql, $query_sql);
        $sql=mysqli_num_rows($query);
        if($sql >= 1){
	        //encontrou a missão do get
	        $linm=mysqli_fetch_array($query);    
	        
	        $ref = $linm['ref'];
	        $mnum = trim($linm['ref'],"m");
	        debug_js("GET: ref:".$ref);
        }else{
            //não encontrou a missão do get
	        $ref = "m0";  
	        $mnum = "0";
        };
}else{ 
    //se nao tiver get( aberto pelo menu lateral), faz o codigo abaixo
    $idlast = $_SESSION['m_last']+1;
    $mlast = $_SESSION['m_last']+1;
    if($idlast !== "0"){ //se ele fez alguma coisa, ou seja, não parou no "0", continua a partir de onde parou
        if($idlast < $mlast){          
        	$idlast = $idlast + 1;// fazer a próxima
        }

        $query_sql = "SELECT * FROM missoes WHERE id= '$idlast'";
        $query = mysqli_query($mysql, $query_sql);
        $sql=mysqli_num_rows($query);
        if($sql >= 1){
            //encontrou a ultima missão feita pelo user
            $linm=mysqli_fetch_array($query);    

            $mnum = trim($linm['ref'],"m");

            $ref = $linm['ref'];
            echo "<script>$(function(){alertify.alert('SESSION: ref:".$ref."');})</script>";
            debug_js("SESSION: ref:".$ref);
        }else{
            //caso nao tenha feito nada
           	$ref = "m0";   
         	$mnum = "0";
        }
    }else{
        //o user nao teve ultimas missoes
	    $ref = "m0"; 
	    $mnum = "0";

    };
};*/

$dominio = pega_dominio($_SESSION['email']); //se o dominio cadastrado for gmail, chama a funçao "sucesso"
$id = $_SESSION['id'];
if($dominio == "gmail.com"){
    $success = true;
}else{  
    if($id > 405 AND calc_idade($_SESSION['nasc']) < 13){
        $success = true;
    }else{
        $ref = "m0";
        $mnum = "0";
    }
};

//seleciona a maior missão
$result = mysqli_query($mysql, "SELECT max(id) as max FROM missoes");
$mid = mysqli_fetch_array($result);
//proxima missao
$pmnum = $mnum + 1;
//missao anterior
$amnum = $mnum - 1;

if($mnum == "0"){//se a missão for 0, desativa o botão "anterior"
    $adisabled = "disabled";
}else{
    //se a missão nao for a 0, o botao fica ativado e com link
    $ahref = '/desafio/'.$amnum.'/"';
}


if($mnum >= $mid['max']){//se a missão for a ultima, desativa o botao "proxima"
    $pdisabled = "disabled";
}else{
    //se a missão nao for a ultima, o botao fica ativado e com link
    $phref = '/desafio/'.$pmnum.'/"';
}
?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $titulo; ?>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>
                    <a href="/desafio/dash/">Painel das Missões</a>
                </li>
                <li class="active">
                    <i class="fa fa-code"></i> 
                    <?php echo $titulo; ?>
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <?php include 'missoes/'.$ref.'.php';?>
    </div>
    <nav>
        <ul class="pager"  style="margin-bottom: 10%;">
            <li class="<?php echo $adisabled; ?>" id="anterior"><a href="<?php echo $ahref; ?>">Anterior</a></li>
            <li class="<?php echo $pdisabled; ?>" id="proxima"><a href="<?php echo $phref; ?>">Próxima</a></li>
        </ul>
    </nav>
