        <link rel="stylesheet" href="/desafio/css/missoes.css"/>
       <!-- Google Code for desafiodocodigo Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 950471659;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "cm4rCMTmu14Q65ecxQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/950471659/?label=cm4rCMTmu14Q65ecxQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- Google Code for desafio Reprograme Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 854817242;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "VHYxCICoxnAQ2vPNlwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/854817242/?label=VHYxCICoxnAQ2vPNlwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- Google Code for DesafioPescadoresdeVidas Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 845725264;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "P9DnCJjp-XIQ0PyikwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/845725264/?label=P9DnCJjp-XIQ0PyikwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Painel das Missões <small>Veja todas as atividades e links, edite suas informações e confira suas conquistas.</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Estatísticas
                            </li>
                        </ol>
                    </div>
                </div>
 
  <!-- Desbloqueia desafios e define em qual missão começa, sem a 0 em 2018 -->
            <?php
                if($_SESSION['m_last'] == '0'){
                echo'<div class="row"><div class="col-lg-12"><div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p style="margin-left:17%"><i class="fa fa-info-circle"></i>  <strong>Seja bem-vindo</strong> <em>'.$_SESSION['apelido'].'</em>! <br/>
                Comece agora a desbravar os desafios. Clique para &nbsp;&nbsp;<a href="/desafio/1/" class="button-ini">DESBLOQUEAR DESAFIOS</a></p></div></div></div>';
                }

            ?>

                <div class="row-fluid circleStats">
                <?

$box = '<div class="col-lg-3">
	<a %HREF%>
		<div class="circleStatsItemBox %COLOR%">
			<div class="header" %STYLECOLOR%>%NOME%</div>
			<input type="text" class="donut" value="%VALUE%" data-min="0" data-max="%MAX%" data-fgColor="%FGCOLOR%" %BGCOLOR% data-displayInput=false data-readOnly=true >
			<div class="footer">
				<span class="count" %STYLECOLOR%>
					<span class="number">%VALUE%</span>
				</span>
				<span class="sep" %STYLECOLOR%> / </span>
				<span class="value" %STYLECOLOR%>
					<span class="number">%MAX%</span>
				</span>
			</div>
		</div>
	</a>
</div>';

$sql = "SELECT * FROM  missoes order by id";
$res = mysqli_query($mysql, $sql);
while ( $lin = mysqli_fetch_array($res) ) {
	$i = $i + 1;
	$value = $_SESSION['missao'][$i];
	if(empty($value)){$value = "0";}

	$enabled = !($value == "0" or $value == "");
	$clickable = $_SESSION['m_last'] >= 0 && $_SESSION['m_last']+1 >= $lin['id'];

	$href = $enabled || $clickable ? 'href="/desafio/'.$lin['id'].'/"' : ''; 
	$stylecolor = !$enabled ? 'style="color: #fff;"' : ''; 
	$color = !$enabled ? 'disable' : $lin['color']; 
	$bgcolor = !$enabled ? 'data-bgColor="#fff"' : ''; 
	$fgcolor = $value == $lin['max'] ? '#248A31' : "#fff";

	echo str_replace(
		array('%STYLECOLOR%', '%MAX%', '%VALUE%', '%BGCOLOR%', '%FGCOLOR%', '%NOME%', '%COLOR%', '%HREF%'), 
		array($stylecolor, $lin['max'], $value, $bgcolor, $fgcolor, $lin['nome'], $color, $href), 
		$box
	);
}

/*                                $sql    =   "SELECT * FROM  missoes order by id";
                                $res    =   mysqli_query($mysql, $sql);
                               while ( $lin =   mysqli_fetch_array($res) ) {
                                $i = $i + 1;
                                $value = $_SESSION['missao'][$i];
                                if(empty($value)){$value = "0";}

                                ?>
                    <div class="col-lg-3">
                    <a <?php if(!($value == "0" or $value == "") || $_SESSION['m_last'] == $lin['id']){ echo 'href="/desafio/'.$lin['id'].'/'; };?>">
                        <div class="circleStatsItemBox <?php if(($value == "0" or $value == "") || $_SESSION['m_last'] == $lin['id']){echo "disable ";}else{echo $lin['color'];};?>">
                            <div class="header" <?php if($value == "0" or $value == ""){echo 'style="color: #7f8c8d;"';} ?>><?php echo $lin['nome']; ?></div>
                            <input type="text" class="donut" value="<?php echo $value; ?>"data-min="0" data-max="<?php echo $lin['max']; ?>" data-fgColor="<?php if($value == $lin['max']){echo '#27ae60"';}else{echo "#34495e";}; ?>"<?php if($value == "0"){echo ' data-bgColor="#7f8c8d"';}; ?> data-displayInput=false data-readOnly=true >  
                            <div class="footer">
                                <span class="count" <?php if($value == "0" or $value == ""){echo 'style="color: #7f8c8d;"';} ?>>
                                    <span class="number"><?php echo $value; ?></span>
                                </span>
                                <span class="sep" <?php if($value == "0" or $value == ""){echo 'style="color: #7f8c8d;"';} ?>> / </span>
                                <span class="value" <?php if($value == "0" or $value == ""){echo 'style="color: #7f8c8d;"';} ?>>
                                    <span class="number"><?php echo $lin['max']; ?></span>
                                </span> 
                            </div>
                        </div>
                        </a>
                    </div>
                              <? };*/ ?>  
                </div>

                <!-- /.row -->
