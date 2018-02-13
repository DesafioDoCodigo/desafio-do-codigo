<?php 

include "../php/func.php";

if(!$_SESSION['login']){
	
	echo json_encode(array('error'=>'Sua sessão expirou. Faça login para utilizar esta ferramenta.'));
	debug_js("sem session");
	exit;

}

$max = 10;
$page = 0;

$where = ' WHERE 1 = 1 ';

if(sizeof($_POST)){

	//tem filtros
	foreach($_POST as $filtername=>$filter){

		//
		switch($filtername){
			case 'page':
				$page = (int)$filter;
				break;
			case 'max':
				$max = (int)$filter;
				break;
                case 'id':
				$where .= "AND id LIKE '%".$filter."%' "; 
				break;
			case 'nome':
				$where .= "AND nome LIKE '%".$filter."%' "; 
				break;
			case 'email':
				$where .= "AND email LIKE '%".$filter."%' "; 
				break;
			case 'cidade':
				$where .= "AND cidade LIKE '%".$filter."%' "; 
				break;
			case 'escola':
				$where .= "AND escola LIKE '%".$filter."%' "; 
				break;
		}

	}

}

$return = array('html', 'error');

$total = mysqli_num_rows(mysqli_query($mysql, "SELECT id FROM users $where "));

$first = $page * $max;

$sql_res = mysqli_query($mysql, "SELECT id, nome, login, sexo, email, cidade, telefone, escola, serie, nasc, total, m_last FROM users $where order by id desc LIMIT $first, $max");

if(mysqli_num_rows($sql_res)){

	while ( $sql_lin = mysqli_fetch_array($sql_res)	) {

		if($sql_lin['tipo'] == "admin") $classe = "danger";
			elseif($sql_lin['tipo'] == "tutor") $classe = "warning";
			else $classe = "primary";
		
		if($sql_lin['autoriza'] == "true") $autoriza = '<i class="fa fa-check"></i>';
			else $autoriza = '<i class="fa fa-times"></i>';
		
		$return['html'] .= '
	    <tr onclick="detalhealuno('.$sql_lin['id'].')" id="'.$sql_lin['id'].'" class="'.$classe.'">
	        <td style="max-width: 30px;">'.$sql_lin['id'].' </td>
	        <td style="max-width: 100px;">'.$sql_lin['nome'].'</td>
	        <td style="max-width: 100px;">'.$sql_lin['login'].'</td>
	        <td style="max-width: 150px;">'.$sql_lin['email'].'</td>
	        <!-- <td style="max-width: 60px;">'.$sql_lin['ip'].'</td> -->
	        <!-- <td style="max-width: 30px;">'.$autoriza.'</td> -->
	        <!-- <td style="max-width: 30px;">'.(empty($sql_lin['serie']) ? '-' : $sql_lin['serie'] ).'</td> -->
	        <!--<td style="max-width: 60px;">'.$sql_lin['cidade'].'</td>
	        <td style="max-width: 80px;">'.(empty($sql_lin['escola']) ? '-' : $sql_lin['escola'] ).'</td> -->
	        <td style="max-width: 50px;">'.$sql_lin['nasc'].'</td>
	       <!--  <td style="max-width: 60px;">'.$sql_lin['telefone'].'</td> 
	        <td style="max-width: 50px;">'.$sql_lin['apelido'].'</td> -->
	        <!-- <td style="max-width: 20px;">'.$sql_lin['tutor'].'</td>
	        <td style="max-width: 20px;">'.nome_tutor($sql_lin['tutor']).'</td>
	        <td style="max-width: 20px;">'.$sql_lin['tipo'].'</td> -->
	        <td style="max-width: 20px;">'.$sql_lin['m_last'].'</td>
	        <!-- <td style="max-width: 20px;">'.$sql_lin['total'].'</td> -->
	        <td style="max-width: 20px;"><i id="xaldel" onclick="alundel('.$sql_lin['id'].')" class="fa fa-times fa-2x delx"></i></td>
	    </tr>';
	}

	$pages = ceil($total / $max); // paginas = total % maximo por pagina




	if($page <= $pages){
		$return['html'] .= "<tr>
			<td colspan=12 style='text-align:center;'>
				Página ".($page + 1)." de ".$pages."<Br />
				<a href='javascript:void(0)' onclick='filter.prevPage();'>Página Anterior</a> | 
				<a href='javascript:void(0)' onclick='filter.nextPage();'>Próxima Página</a><Br />
				<div class='loadinggif'></div>
			</td>
		</tr>";
	}
} else {
	$return['html'] = '<tr><td colspan=12><h4>Não há registros com os filtros inseridos.</h4></td></tr>';
}

echo json_encode($return);