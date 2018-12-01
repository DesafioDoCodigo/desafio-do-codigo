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

class UsuarioOld implements Instancia
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
    public $mauticId;

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

    /**
     * Retorna o usuário, porém no formato correto pra enviar para o Mautic
     * @todo
     * Campos que foram ignorados e precisam ser trabalhados
     * tutor, total, m_last, newsletter
     *
     * @return array
     */
    public function getMauticObj()
    {
        // Arrow Function para formatar datas pro mautic - Recebe algo como "2018-02-13 12:13:19" e retorna "2018-02-13 12:13" (garantidamente)
        $formatMauticDate = function ($date) {
            $format = "Y-m-d H:m";
            if ($date === null || $date === '0000-00-00 00:00:00')
                return null;
            else
                return $date;
        };

        $data = [];
        $data['firstname'] = PLib::capitalize_name($this->nome); // Separar first name do restante
        $data['email'] = trim(strtolower($this->email));
        $data['login'] = trim(strtolower($this->login));
        $data['ipAddress'] = $this->ip;
        $data['birthday'] = $formatMauticDate($this->nasc);
        $data['usertype'] = $this->tipo;
        $data['nickname'] = $this->apelido;
        $data['phone'] = $this->telefone;
        $data['city'] = PLib::capitalize_name($this->cidade);
        $data['school'] = PLib::capitalize_name($this->escola);
        $data['schoolyear'] = $this->serie;
        $data['signupdate'] = $formatMauticDate($this->DataAdd);
        $data['lastlogindate'] = $formatMauticDate($this->last_login);

        return $data;
    }

    public
    function save()
    {
    }
}