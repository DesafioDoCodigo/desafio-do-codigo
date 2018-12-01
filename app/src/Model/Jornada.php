<?php
/**
 * Instância de Jornada
 * Representa um único registro
 *
 * User: tiagogouvea
 * Date: 13/06/18
 * Time: 16:31
 */

namespace App\Model;

class Jornada implements Instancia
{
    public $id;
    public $titulo;
    public $resumo;
    public $descricao;
    public $ativa;

    /**
     * @return Trilha[]
     */
    public function getTrilhas()
    {
        /* @var $daoTrilhas TrilhaDAO */
        $daoTrilhas = TrilhaDAO::getInstance();

        // Obter trilhas da jornada
        $trilhas = $daoTrilhas->getWhere("id_jornada=" . $this->id);

        return $trilhas;
    }
}