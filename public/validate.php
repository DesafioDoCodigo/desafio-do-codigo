<?php
/**
 * Created by PhpStorm.
 * User: tiagogouvea
 * Date: 29/12/18
 * Time: 21:01
 */

require './domains.php';
function domain_exists($domain, $record = 'MX')
{
    return checkdnsrr($domain, $record);
}

function isDisposable($domain)
{
    $result = file_get_contents("https://open.kickbox.com/v1/disposable/" . $domain);
    if ($result == null || $result == false) {
        var_dump($result);
        die("disposable fail");
    }
    $result = json_decode($result);
    return $result != null && $result->disposable == true;
}


$valids = [];
$invalids = [];

$i = 0;
foreach ($users as $domain) {
    if ($domain['count'] <= 1)
        break;

    $domain = $domain['domain'];
    // var_dump($domain);

    if (filter_var("tiago@" . $domain, FILTER_VALIDATE_EMAIL) == false) {
        $invalids[] = "'$domain'";
        break;
    }

    // if (domain_exists($domain)) {
    //     // echo($domain. ' - valid<br>');
    //     $valids[] = "'$domain'";
    // } else {
    //     // echo($domain. ' - invalid<br>');
    //     $invalids[] = "'$domain'";
    // }

    if (isDisposable($domain)) {
        // echo "$domain disposable<br>";
        $invalids[] = "'$domain'";
    }

    $i++;

    // if ($i > 50)
    //     break;
}

$invalids = join(",", $invalids);
echo "update users set email_invalido_saldo=COALESCE(email_invalido_saldo,0)-1 where substring_index(email, '@', -1) in (" . $invalids . ")<br><Br>";
