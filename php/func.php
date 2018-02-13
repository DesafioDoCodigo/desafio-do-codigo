<?php

if ($MANUTENCAO && $_SERVER['REMOTE_ADDR'] != '191.251.52.215') {
    echo "Manutenção temporária. Tente novamente em 2 minutos.";
    exit;
}
session_start();

require dirname(__FILE__) . "/../config/index.php";
require dirname(__FILE__) . "/../db.php";

//verifica se fez requizição de destruir section    
if ($_GET['d']) {
    session_destroy();
    header("location:../index.php");
    mysqli_close($mysql);
};

//cache de query
$Cnum_al_m = array();
$Cnum_al_m_n = null;
$Cacessos = null;

//ativa função de visualização

visualiza();

//function para verificar se conta admin existe
function verifica_login($login, $pass)
{
    global $mysql;
    $login = mysqli_real_escape_string($mysql, $login);
    $pass = mysqli_real_escape_string($mysql, $pass);

    $query_sql = "SELECT * FROM users WHERE login= '$login' LIMIT 1";//and senha= '$pass'";
    $query = mysqli_query($mysql, $query_sql);
    $sql = mysqli_num_rows($query);
    $lin = mysqli_fetch_array($query);

    if ($sql > 0 && password_verify($pass, $lin['senha'])) {

        $i = 0;
        debug_js("Iniciado!");


        $_SESSION['m_last'] = $lin['m_last'];
        /*while($i < max_m()){
            $i++;
            
            $_SESSION['m_'.$i] = $lin['m_'.$i];                    
        }*/

        $missionstatus = mysqli_query($mysql, "SELECT missao, pontos FROM user_mission WHERE userid = " . $lin['id'] . " ");
        while ($linha = mysqli_fetch_array($missionstatus)) {
            $_SESSION['missao'][$linha['missao']] = (int)$linha['pontos'];
        }

        $nasc = $lin['nasc'];

        if (preg_match("/^[0-9]{4}(-|\/)[0-9]{2}(-|\/)[0-9]{2}$/i", $nasc)) {

            $time = strtotime(str_replace("/", "-", $nasc));
            $nasc = $time > 0 ? date("d/m/Y", $time) : "00/00/0000";

        } else if (preg_match("/^[0-9]{2}(-|\/)[0-9]{2}(-|\/)[0-9]{4}$/i", $nasc)) {

            //

        } else {
            $nasc = "00/00/0000";
        }


        $_SESSION['tutor'] = $lin['tutor'];
        $_SESSION['tipo'] = $lin['tipo'];
        $_SESSION['login'] = $lin['login'];
        $_SESSION['id'] = $lin['id'];
        $_SESSION['nome'] = $lin['nome'];
        $_SESSION['sexo'] = $lin['sexo'];
        $_SESSION['email'] = $lin['email'];
        $_SESSION['apelido'] = $lin['apelido'];
        $_SESSION['telefone'] = $lin['telefone'];
        $_SESSION['nasc'] = $nasc;
        $_SESSION['escola'] = $lin['escola'];
        $_SESSION['cidade'] = $lin['cidade'];
        $_SESSION['serie'] = $lin['serie'];
        $_SESSION['autoriza'] = $lin['autoriza'];
        $_SESSION['senha'] = $lin['senha'];

        $lastlogin = mysqli_query($mysql, "UPDATE users SET last_login = NOW() WHERE id = " . $lin['id']);

        //var_dump($_SESSION);exit;

        include_once 'oauth-php/library/OAuthStore.php';
        include_once 'oauth-php/library/OAuthRequester.php';

        $consumerKey = 'g5Y3yNMyXwe4ytXL';
        $consumerSecret = '59UYyeCfCjJPnxA4';
        $loginCallback = 'http://desafiodocodigo.com.br/desafio/php/ka_client.php';

        $query = mysqli_query($mysql, "SELECT oauthToken, oauthTokenSecret, oauth_verifier FROM khantoken WHERE userid = '" . $_SESSION['id'] . "'");
        $sql = mysqli_num_rows($query);
        $linha = mysqli_fetch_array($query);

        if ($sql) {

            $baseUrl = 'https://pt.khanacademy.org';
            $requestTokenUrl = $baseUrl . '/api/auth/request_token';
            $accessTokenUrl = $baseUrl . '/api/auth/access_token';

            $options = array(
                'consumer_key' => $consumerKey,
                'consumer_secret' => $consumerSecret,
                'server_uri' => $baseUrl,
                'signature_methods' => array('HMAC-SHA1'),
                'request_token_uri' => $requestTokenUrl,
                'authorize_uri' => $baseUrl . '/api/auth/authorize',
                'access_token_uri' => $accessTokenUrl,
            );

            $store = OAuthStore::instance('Session', $options);

            $store->addServerToken($consumerKey, 'request', $linha['oauthToken'], $linha['oauthTokenSecret'], 0);

            $accessTokenParams = array(
                'oauth_verifier' => $linha['oauth_verifier'],
                'oauth_callback' => $loginCallback);

            OAuthRequester::requestAccessToken($consumerKey, $linha['oauthToken'], 0, 'POST', $accessTokenParams);

            $_SESSION['khan_api'] = 1;
        }

        return true;
    } else {
        return false;
    }
}

//function para marcar visualização
function url()
{
    global $mysql;
    $endereco = $_SERVER ['REQUEST_URI'];
    $server = $_SERVER['SERVER_NAME'];
    $url = "http://" . $server . $endereco;
    return $url;
}

function action()
{
    global $mysql;
    return $_SERVER ['REQUEST_URI'];
}

function visualiza()
{
    global $mysql;
    $url = url();
    //verificar se já existe a pagina no sql, caso não, criar
    //depois de criar, nas proximas vezes é so fazer uptate da coluna "qtd"
    $query_sql = "SELECT qtd FROM visualizacao WHERE url= '$url' LIMIT 1";
    $query = mysqli_query($mysql, $query_sql);
    $sql = mysqli_num_rows($query);
    $lin = mysqli_fetch_array($query);

    if ($sql == 0) {
        mysqli_query($mysql, "INSERT INTO visualizacao (url, qtd) VALUES ('$url', '1')");
    } else {
        mysqli_query($mysql, "UPDATE visualizacao SET `qtd` = qtd+1 WHERE url = '$url';");
    }
}

;
//Conta acessos totais
function acessos()
{
    global $mysql, $Cacessos;

    if ($Cacessos != null) return $Cacessos;
    $query = mysqli_query($mysql, "SELECT SUM(qtd) as total FROM visualizacao");
    $lin = mysqli_fetch_array($query);
    $Cacessos = $lin['total'];
    return $lin['total'];
}

;

//sistema de mudar os dados do admin
function upd_dados($id, $nome, $email, $login, $senha, $telefone, $cidade, $escola, $serie)
{
    global $mysql;
    //FAZER SEGURANÇA EM MD5 DPS
    //$senha = md5($senha);
    if (!$senha = "") {
        mysqli_query($mysql, "UPDATE users SET `senha` = '" . mysqli_real_escape_string($mysql, $senha) . "' WHERE 'id' = '$id_l';");
    };
    if (!$login = "") {
        mysqli_query($mysql, "UPDATE users SET `login` = '" . mysqli_real_escape_string($mysql, $login) . "' WHERE 'id' = '$id_l';");
    };
    if (!$email = "") {
        mysqli_query($mysql, "UPDATE users SET `email` = '" . mysqli_real_escape_string($mysql, $email) . "' WHERE 'id' = '$id_l';");
    };
    if (!$nome = "") {
        mysqli_query($mysql, "UPDATE users SET `nome` = '" . mysqli_real_escape_string($mysql, $nome) . "' WHERE 'id' = '$id_l';");
    };
    if (!$telefone = "") {
        mysqli_query($mysql, "UPDATE users SET `telefone` = '" . mysqli_real_escape_string($mysql, $telefone) . "' WHERE 'id' = '$id_l';");
    };
    if (!$cidade = "") {
        mysqli_query($mysql, "UPDATE users SET `cidade` = '" . mysqli_real_escape_string($mysql, $cidade) . "' WHERE 'id' = '$id_l';");
    };
    if (!$escola = "") {
        mysqli_query($mysql, "UPDATE users SET `escola` = '" . mysqli_real_escape_string($mysql, $escola) . "' WHERE 'id' = '$id_l';");
    };
    if (!$serie = "") {
        mysqli_query($mysql, "UPDATE users SET `serie` = '" . mysqli_real_escape_string($mysql, $serie) . "' WHERE 'id' = '$id_l';");
    };
}

;
function atualiza_session()
{
    global $mysql;
    $id = $_SESSION['id'];
    $query_sql = "SELECT * FROM users WHERE id= '$id' LIMIT 1";
    $query = mysqli_query($mysql, $query_sql);
    $sql = mysqli_num_rows($query);
    $lin = mysqli_fetch_array($query);
    if ($sql == 1) {
        session_start();
        $i = 0;
        /*
            while($i < max_m()){
                $i++;
                $_SESSION['m_'.$i] = $lin['m_'.$i];
            }*/
        $missionstatus = mysqli_query($mysql, "SELECT missao, pontos FROM user_mission WHERE userid = " . $lin['id'] . " ");
        while ($linha = mysqli_fetch_array($missionstatus)) {
            $_SESSION['missao'][$linha['missao']] = (int)$linha['pontos'];
        }

        $nasc = $lin['nasc'];

        if (preg_match("/^[0-9]{4}(-|\/)[0-9]{2}(-|\/)[0-9]{2}$/i", $nasc)) {

            $time = strtotime(str_replace("/", "-", $nasc));
            $nasc = $time > 0 ? date("d/m/Y", $time) : "00/00/0000";

        } else if (preg_match("/^[0-9]{2}(-|\/)[0-9]{2}(-|\/)[0-9]{4}$/i", $nasc)) {

            //

        } else {
            $nasc = "00/00/0000";
        }


        $_SESSION['tipo'] = $lin['tipo'];
        $_SESSION['tutor'] = $lin['tutor'];
        $_SESSION['login'] = $lin['login'];
        $_SESSION['nome'] = $lin['nome'];
        $_SESSION['sexo'] = $lin['sexo'];
        $_SESSION['email'] = $lin['email'];
        $_SESSION['m_last'] = $lin['m_last'];
        $_SESSION['id'] = $lin['id'];
        $_SESSION['apelido'] = $lin['apelido'];
        $_SESSION['telefone'] = $lin['telefone'];
        $_SESSION['nasc'] = $nasc;
        $_SESSION['escola'] = $lin['escola'];
        $_SESSION['cidade'] = $lin['cidade'];
        $_SESSION['serie'] = $lin['serie'];
        $_SESSION['autoriza'] = $lin['autoriza'];
        $_SESSION['senha'] = $lin['senha'];

        $lastlogin = mysqli_query($mysql, "UPDATE users SET last_login = NOW() WHERE id = " . $lin['id']);

        return true;
    } else {
        return false;
    }

}

;
function ipUser()
{
    global $mysql;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

;

function pega_dominio($email)
{
    global $mysql;
    // Get the data after the @ sign
    $domain = substr(strrchr($email, "@"), 1);

    return $domain;
}

;
function debug_js($data)
{
    global $mysql;
    /*
     $query_sql = "SELECT * FROM adm WHERE id= '1';";
                $query     = mysqli_query($mysql, $query_sql);
                $lin       =mysqli_fetch_array($query);

                    if($lin['Debug'] == "1"){

                      if (
                         is_array( $data ) ){
                            $output = "<script>console.log( 'Debug Array: " . implode( ',', $data) . "' );</script>";
                        }
                        else{
                            $output = "<script>console.log( 'Debug: " . $data . "' );</script>";
                        };

                        echo $output;
                    }
    */
}

;

function max_m()
{
    global $mysql;
    $result = mysqli_query($mysql, "SELECT max(id) as max FROM missoes");
    $mid = mysqli_fetch_array($result);
    return $mid['max'];
}

;


function mpoints($mission, $points, $id)
{
    global $mysql;

    $miss = trim($mission, "m_");

    $mlast = m_last($id);

    debug_js("miss: " . $miss . " mlast: " . $mlast . " points_m: " . point_m($mission, $id));

    //if($mlast <= $miss){ //removido para a pessoa conseguir refazer missões cuja a nota está zero.
    //if($mlast > 0){
    //se os pontos da missão atual estiver vazio(nao tiver feito ainda)faz o codigo abaixo
    if (point_m($mission, $id) == 0) {

        $missao = "m" . $miss;

        $verifica = mysqli_query($mysql, "SELECT l.tentativas, m.max FROM limitador_pontos l, missoes m WHERE l.userid = $id AND l.missao = '$missao' AND m.ref = l.missao LIMIT 1");
        if (mysqli_num_rows($verifica)) {
            $linha = mysqli_fetch_array($verifica);
            $maxpontos = (int)$points;//$linha['max'];

            $points -= (int)$linha['tentativas'];

            if ($points < $maxpontos / 2) {
                $points = $maxpontos / 2;
            }
        }


        $query = c_points($id);

        debug_js("query:" . $query);

        $total = $query + $points;

        mysqli_query($mysql, "UPDATE  `users` SET  `total` =  '" . $total . "', `$mission` = '$points' WHERE  `users`.`id` =" . $id . " LIMIT 1");

        //query dos pontos da missão determinada
        //mysqli_query($mysql, "UPDATE `users` SET `$mission` = '$points' WHERE `users`.`id` =".$id.";");

        //novo sistema de pontuacao:
        mysqli_query($mysql, "INSERT INTO user_mission (id, userid, missao, pontos, `when`) VALUES (NULL, $id, $miss, $points, NOW())");
    }
    //}

}

;


function upd_miss($missatual)
{
    global $mysql;
    $num = m_last($_SESSION['id']) + 1;
    if ($missatual == $num) {
        $sql = "UPDATE `users` SET `m_last` = '" . $missatual . "' WHERE `users`.`id` =" . $_SESSION['id'] . ";";
        mysqli_query($mysql, $sql);
    }

}

function c_points($id)
{
    global $mysql;
    $id = mysqli_real_escape_string($mysql, $id);
    $query = mysqli_query($mysql, "SELECT SUM(pontos) as total FROM `user_mission` WHERE userid = $id");
    $lin = mysqli_fetch_array($query);
    return $lin['total'];
}

function m_last($id)
{
    global $mysql;
    $id = mysqli_real_escape_string($mysql, $id);
    $query = mysqli_query($mysql, "SELECT m_last FROM  `users` WHERE  `id` = " . $id . " LIMIT 1");
    $lin = mysqli_fetch_array($query);
    return $lin['m_last'];
}

function point_m($mission, $id)
{
    global $mysql;
    $id = mysqli_real_escape_string($mysql, $id);
    $missao = trim($mission, "m_");
    $query = mysqli_query($mysql, "SELECT pontos FROM user_mission WHERE userid = $id AND missao = $missao");
    $lin = mysqli_fetch_array($query);
    return $lin['pontos'];
}

function c_alunos()
{
    global $mysql;
    $query = mysqli_query($mysql, "SELECT COUNT(id) as total FROM  users WHERE  `tipo` = 'user'");
    $lin = mysqli_fetch_array($query);
    return $lin['total'];
}

function total_p()
{
    global $mysql;
    $query = mysqli_query($mysql, "SELECT SUM(pontos) as total FROM user_mission");
    $res = mysqli_fetch_array($query);
    return $res['total'];
}

function total_bugs()
{
    global $mysql;
    $query = mysqli_query($mysql, "SELECT COUNT(*) as total FROM bug");
    $lin = mysqli_fetch_array($query);
    return $lin['total'];
}

function gen_str($length = 6)
{
    global $mysql;
    $string = '';
    $characters = "23456789ABCDEFHJKLMNPRTVWXYZ";

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;

}

function incorreta($num, $missao = false)
{
    global $mysql;
    if ($num) {
        $num = " " . $num;
    }
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Resposta' . $num . ' Incorreta!</div>';

    if ($missao) {
        $tentativas = 0;
        $userid = $_SESSION['id'];
        $verifica = mysqli_query($mysql, "SELECT l.tentativas, m.max FROM limitador_pontos l, missoes m WHERE l.userid = $userid AND l.missao = '$missao' AND m.ref = l.missao LIMIT 1");
        if (mysqli_num_rows($verifica)) {
            /*$linha = mysqli_fetch_array($verifica);
            $maxpontos = $linha['max'];

            $tentativas = (int)$linha['tentativas']+1;
            /*
            if($tentativas > $maxpontos/2){
                $tentativas = $maxpontos/2;
            }

            //$pontos = $maxpontos - $tentativas; 
            //if( $pontos < $maxpontos/2 ){ // não permitir menos da metade dos pontos.
            //    $pontos = $maxpontos/2;
            //}
            */
            $update = mysqli_query($mysql, "UPDATE limitador_pontos SET tentativas = tentativas+1 WHERE userid = $userid AND missao = '$missao' LIMIT 1");
        } else {
            $insert = mysqli_query($mysql, "INSERT INTO limitador_pontos (id, userid, missao, tentativas) VALUES (NULL, $userid, '$missao', 1)");
        }
    }

}

function nome_tutor($id)
{
    global $mysql;
    $id = mysqli_real_escape_string($mysql, $id);
    $sql = mysqli_query($mysql, "SELECT nome FROM  `users` WHERE  `tipo` =  'tutor' AND  `tutor` =  '" . $id . "';");
    $query = mysqli_fetch_array($sql);
    $nome = $query['nome'];
    if ($nome == "") {
        $nome = "-";
    }
    return $nome;
}

function json_miss($id)
{
    global $mysql;
    $id = mysqli_real_escape_string($mysql, $id);
    $max = max_m();
    for ($i = 1; $i < $max + 1; $i++) {
        $array[$i] = 0;
    }


    $sql = mysqli_query($mysql, "SELECT missao, pontos FROM user_mission WHERE userid = $id");

    while ($lin = mysqli_fetch_array($sql)) {
        $array[(int)$lin['missao']] = (int)$lin['pontos'];
    }

    $json = json_encode($array);
    return "[" . $json . "]";
}

function calc_idade($data_nasc)
{
    global $mysql;
    $data_nasc = explode('/', $data_nasc);

    $data = date('Y-m-d');

    $data = explode('/', $data);

    $anos = $data[2] - $data_nasc[2];

    if ($data_nasc[1] > $data[1])

        return $anos - 1;

    if ($data_nasc[1] == $data[1])
        if ($data_nasc[0] <= $data[0]) {
            return $anos;
            break;
        } else {
            return $anos - 1;
            break;
        }

    if ($data_nasc[1] < $data[1])
        return $anos;
}

function get_gravatar($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array())
{
    global $mysql;
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img class="img-circle" src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function dup_c()
{
// problema resolvido: nao precisa mais da query
    /*    global $mysql;
        $c = 0;
        $qry = mysqli_query($mysql, "SELECT COUNT(*) as cnt, GROUP_CONCAT(id) AS ids FROM users GROUP BY login HAVING cnt > 1 ORDER BY `cnt` DESC");
        $row = mysqli_num_rows($qry);
        if($row>=1){
            while($qry_row = mysqli_fetch_array($qry)){
                $array = explode(",", $qry_row['ids']);

                for ($i=1; $i<$qry_row['cnt']; $i++){
                    $c++;
                }
            }

            return $c;
    */
    //  }else{
    return "Nenhuma conta duplicada.";
    //   }

}

function num_al_m($miss)
{
    global $mysql, $Cnum_al_m;

    if (!empty($Cnum_al_m[$miss])) return $Cnum_al_m[$miss];

    $query = mysqli_query($mysql, "SELECT COUNT(id) as total FROM user_mission WHERE missao = $miss");
    $row = mysqli_fetch_array($query);

    $Cnum_al_m[$miss] = $row['total'];

    return $Cnum_al_m[$miss];//num_al_m($miss);
}

function num_al_m_n()
{
    global $mysql, $Cnum_al_m_n;

    if ($Cnum_al_m_n !== null) return $Cnum_al_m_n;

    //conta a quantidade de alunos que fizeram nenhuma missão
    $query = mysqli_query($mysql, "SELECT count(id) as qty FROM users where m_last = 0");
    $val = mysqli_fetch_array($query);

    $Cnum_al_m_n = $val['qty'];

    return $val['qty'];
}

