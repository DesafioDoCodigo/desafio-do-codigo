<?php
/**
 * Created by PhpStorm.
 * User: tiagogouvea
 * Date: 24/03/18
 * Time: 16:31
 */

namespace App\Model;

class User
{
    public $id;
    public $login;
    public $nome;
    public $sexo;
    public $senha;
    public $email;
    public $ip;
    public $autoriza;
    public $serie;
    public $cidade;
    public $escola;
    public $nasc;
    public $telefone;
    public $apelido;
    public $tipo;
    public $total;
    public $tutor;
    public $DataAdd;
    public $last_login;
    public $m_last;
    public $newsletter;

    public function __set($name, $value)
    {
        echo $name." -> ".$value."<br>";
        // Validar alguns campos antes de salvar
        if ($name == 'email') {
            // Validar
            $value = filter_var($value, FILTER_SANITIZE_EMAIL);
        }

        $this->$value = $value;
    }
}