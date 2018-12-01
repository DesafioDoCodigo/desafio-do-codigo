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

class Desafio implements Instancia
{
    public $id;
    public $id_trilha;
    public $ordem;
    public $titulo;
    public $conteudo;
    public $ativo;

    /**
     * Obtem o objeto da Trilha deste desafio
     * @return Trilha
     */
    public function getTrilha()
    {
        return TrilhaDAO::getInstance()->findById($this->id_trilha);
    }
    /**
     * Obtem o objeto da Jornada deste desafio
     * @return Jornada
     */
    public function getJornada()
    {
        return JornadaDAO::getInstance()->findById($this->getTrilha()->id_jornada);
    }
}