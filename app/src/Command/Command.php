<?php
/**
 * User: tiagogouvea
 * Date: 29/07/18
 * Time: 18:41
 */

namespace App\Command;

class Command
{
    public function log($mensagem)
    {
        $mensagem = date("H:i:s") . " - $mensagem".PHP_EOL;
        print($mensagem);
        flush();
        ob_flush();
    }
}