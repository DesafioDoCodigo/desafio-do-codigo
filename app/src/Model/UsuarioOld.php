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
    public $email_invalido;
    public $email_invalido_saldo;
    public $last_mautic_update;

    public function __set($name, $value)
    {
        echo "Setando campo não declarado ($name) na classe " . self::class;
        // echo $name . " -> " . $value . "<br>";
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
            else if (strpos($date, "/")) {
                $date = explode("/", $date);
                return "$date[2]-$date[1]-$date[0] 00:00:00";
            } else
                return $date;
        };

        $data = [];
        $data['firstname'] = PLib::capitalize_name($this->nome); // Separar first name do restante
        $data['email'] = str_replace(" ", "", trim(strtolower($this->email)));
        $data['login'] = $this->removeAccents(trim(strtolower($this->login)));
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
        $data['oldpoints'] = $this->total;

        // Ajustar encodings
        if (mb_detect_encoding($data['firstname']) != 'UTF-8') {
            // var_dump($data['firstname']);
            $data['firstname'] = mb_convert_encoding($data['firstname'], "UTF-8");
        }
        if (mb_detect_encoding($data['login']) != 'UTF-8') {
            // var_dump($data['login']);
            $data['login'] = mb_convert_encoding($data['login'], "UTF-8");
        }
        if (mb_detect_encoding($data['nickname']) != 'UTF-8') {
            // var_dump($data['login']);
            $data['nickname'] = mb_convert_encoding($data['nickname'], "UTF-8");
        }
        if (mb_detect_encoding($data['school']) != 'UTF-8') {
            // var_dump($data['login']);
            $data['school'] = mb_convert_encoding($data['school'], "UTF-8");
        }
        if (mb_detect_encoding($data['city']) != 'UTF-8') {
            // var_dump($data['login']);
            $data['city'] = mb_convert_encoding($data['city'], "UTF-8");
        }

        return $data;
    }

    public function save()
    {
    }

    public function removeAccents($string)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);
    }
}