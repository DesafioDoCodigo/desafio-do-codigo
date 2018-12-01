<?php
/**
 * DAO de usuários
 * Referente a tabela do sistema novo
 * User: tiagogouvea
 * Date: 24/03/18
 * Time: 12:48
 */

namespace App\Model;

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;
use PDO;
use App\Model\UsuarioOld as User;

class UsuarioDAO extends DAO implements IDAO
{
    /* @var $pdo PDO */

    protected $pdo;
    protected static $instance;
    protected $tableName = 'usuario';
    protected $instanceClassName = 'Usuario';

    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->pdo = $pdo;
        self::$instance = $this;
    }

    static function getInstance($pdo = null)
    {
        if (self::$instance == null) {
            global $pdo;
            self::$instance = new UsuarioDAO($pdo);
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
     * @todo
     * Mover as mensagens para um único lugar, para todos os DAOS lerem de lá
     * @param $vars
     * @return mixed
     */
    function validatePostVars($vars)
    {
        try {
            $validacoes = [
                Validator::stringType()->length(10)->setName('Nome')->assert($vars['nome']),
                Validator::stringType()->length(4)->setName('Login')->assert($vars['login']),
                Validator::email()->setName('Email')->assert($vars['email'])
            ];
        } catch (NestedValidationException $exception) {
            $errors = $exception->findMessages([
                'alnum' => '{{name}} deve ter apenas letras e números',
                'length' => '{{name}} deve ter mais caracteres',
                'noWhitespace' => '{{name}} não pode ter espaços',
                'email' => 'O email informado não é válido'
            ]);

            throw new \Exception($exception->getFullMessage());
        }

        return true;
    }
}