<?php
/**
 * DAO de usuários
 * Referente a tabela do sistema antigo
 * User: tiagogouvea
 * Date: 24/03/18
 * Time: 12:48
 */

namespace App\Model;

use PDO;
use App\Model\UsuarioOld as User;

class UsuarioOldDAO extends DAO implements IDAO
{
    /* @var $pdo PDO */

    protected $pdo;
    protected static $instance;
    protected $tableName = 'users';
    protected $instanceClassName = 'UsuarioOld';

    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->pdo = $pdo;
        self::$instance = $this;
    }

    static function getInstance($pdo = null)
    {
        if (self::$instance == null) {
            global $pdoOld;
            self::$instance = new UsuarioOldDAO($pdoOld);
        }
        return self::$instance;
    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param $id
     * @return UsuarioOld
     */
    public function findById(int $id)
    {
        return parent::_findById($id);
    }

    /**
     * Cria um novo registro a partir do objeto
     * @param \App\Model\UsuarioOld $user Objeto a ser inserido no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return \App\Model\UsuarioOld
     */
    public function insert(Instancia $user, $returnInsertedObject = false)
    {
        return parent::_insert($user, $returnInsertedObject);
    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param \App\Model\UsuarioOld $user Objeto a ser atualizado no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return UsuarioOld
     */
    public function update(Instancia $user, $returnInsertedObject = false)
    {
        return parent::_update($user, $returnInsertedObject);
    }

    /**
     * Procura no banco de dados pelos registros sob as condições e retorna os objetos
     * @param $where
     * @param $order
     * @param $limit
     * @return \App\Model\UsuarioOld[]
     * @internal param \App\Model\User $user Objeto a ser atualizado no banco
     * @internal param bool $returnInsertedObject Retornar o registro criado
     */
    public function getWhere(string $where, string $order = null,string $limit = null)
    {
        return parent::_getWhere($where, $order, $limit);
    }

    /**
     * Procura no banco de dados pelos registros sob as condições e retorna a quantidade encontrada
     * @param $where
     * @param $order
     * @param $limit
     * @return int
     * @internal param \App\Model\User $user Objeto a ser atualizado no banco
     * @internal param bool $returnInsertedObject Retornar o registro criado
     */
    public function countWhere(string $where)
    {
        return parent::_countWhere($where);
    }

    /**
     * Exclui um registro do banco
     * @param $id
     * @return mixed
     */
    function deleteById(int $id)
    {
        return parent::_deleteById($id);
    }

    /**
     * @todo
     * @param string $order
     */
    function getAll(string $order = null, string $limit = null)
    {
        return parent::_getAll($order, $limit);
    }


    /**
     * Valida os atributos de uma instância, de um registro, quando necessário
     * @param $vars
     * @return mixed - deve retornar true para ser considerado válido
     */
    function validatePostVars($vars)
    {
        return true;
    }
}