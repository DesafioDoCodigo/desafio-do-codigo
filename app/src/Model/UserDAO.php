<?php
/**
 * DAO de usuários
 * User: tiagogouvea
 * Date: 24/03/18
 * Time: 12:48
 */

namespace App\Model;

use PDO;
use App\Model\User as User;

class UserDAO extends DAO
{
    /* @var $pdo PDO */

    protected $pdo;
    protected static $instance;
    protected $tableName = 'users';
    protected $instanceClassName = 'User';

    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->pdo = $pdo;
        self::$instance = $this;
    }

    static function getInstance($pdo){
        if (self::$instance==null)
            new UserDAO($pdo);
        return self::$instance;
    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param $id
     * @return User
     */
    public function findById($id)
    {
        return parent::_findById($id);
    }

    /**
     * Cria um novo registro a partir do objeto
     * @param \App\Model\User $user Objeto a ser inserido no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return \App\Model\User
     */
    public function insert(User $user, $returnInsertedObject=false)
    {
        return parent::_insert($user, $returnInsertedObject);
    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param \App\Model\User $user Objeto a ser atualizado no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return User
     */
    public function update(User $user, $returnInsertedObject=false)
    {
        return parent::_update($user, $returnInsertedObject);
    }

}