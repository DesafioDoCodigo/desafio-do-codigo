<?php
/**
 * Instância de Trilha
 * Representa um único registro
 *
 * User: tiagogouvea
 * Date: 13/06/18
 * Time: 16:31
 */

namespace App\Model;

class Trilha implements Instancia
{
    public $id;
    public $id_jornada;
    public $titulo;
    public $resumo;
    public $descricao;
    public $ativa;

    /**
     * Obtem o objeto da Jornada desta trilha
     * @return Jornada
     */
    public function getJornada()
    {
        return JornadaDAO::getInstance()->findById($this->id_jornada);
    }

    public function getDesafios()
    {
        // Obter DAO de Desafio
        /* @var $daoDesafio DesafioDAO */
        $daoDesafio = DesafioDAO::getInstance();

        // Obter desafios
        $desafios = $daoDesafio->getWhere("id_trilha=" . $this->id);

        return $desafios;
    }
}