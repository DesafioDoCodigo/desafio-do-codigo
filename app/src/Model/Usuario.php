<?php
/**
 * Created by PhpStorm.
 * User: tiagogouvea
 * Date: 24/03/18
 * Time: 16:31
 */

namespace App\Model;

use App\Lib\PLib;
use DateTime;

class Usuario implements Instancia
{
    public $id;
    public $login;
    public $nome;
    public $email;
    public $tipo; // admin, tutor, usuario

    public $data_cadastro;
    public $data_ultimo_acesso;

    // Campos "calculados" - para utilizar em exibição
    public $_tipo;

    public function __construct()
    {
        $this->calcularCampos();
    }


    public function __set($name, $value)
    {
        echo $name . " -> " . $value . "<br>";
        // Validar alguns campos antes de salvar
        if ($name == 'email') {
            // Validar
            $value = filter_var($value, FILTER_SANITIZE_EMAIL);
        }

        $this->$value = $value;
    }

    private function calcularCampos()
    {
        // Calcular campo _tipo
        if ($this->tipo) {
            if ($this->tipo == "admin")
                $this->_tipo = "Administrador";
            if ($this->tipo == "tutor")
                $this->_tipo = "Tutor";
            if ($this->tipo == "usuario")
                $this->_tipo = "Usuário";
        }
    }
}