<?php
/**
 * DAO de trilhas
 * É quem lida com a coleção de registros, é o repositório de registros
 *
 * Trilha: tiagogouvea
 * Date: 13/06/18
 * Time: 12:48
 */

namespace App\Model;

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;
use PDO;
use App\Model\Trilha;

class TrilhaDAO extends DAO implements IDAO
{
    /* @var $pdo PDO */

    protected $pdo;
    protected static $instance;
    protected $tableName = 'trilha';
    protected $instanceClassName = 'Trilha';

    static function getInstance($pdo = null)
    {
        if (self::$instance == null) {
            global $pdo;
            self::$instance = new TrilhaDAO($pdo);
        }
        return self::$instance;
    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param $id
     * @return Trilha
     */
    public function findById(int $id)
    {
        return parent::_findById($id);
    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param $id
     * @return Trilha
     */
    public function getAll(string $order = null, string $limit = null)
    {
        return parent::_getAll($order,$limit);
    }

    /**
     * Cria um novo registro a partir do objeto
     * @param \App\Model\Trilha $Trilha Objeto a ser inserido no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return \App\Model\Trilha
     */
    public function insert(Instancia $obj, $returnInsertedObject = true)
    {
        return parent::_insert($obj, $returnInsertedObject);
    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param \App\Model\Trilha $Trilha Objeto a ser atualizado no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return Trilha
     */
    public function update(Instancia $obj, $returnInsertedObject = true)
    {
        return parent::_update($obj, $returnInsertedObject);
    }

    /**
     * Procura no banco de dados pelos registros sob as condições e retorna os objetos
     * @param $where
     * @param $order
     * @param $limit
     * @return \App\Model\Trilha[]
     * @internal param \App\Model\Trilha $Trilha Objeto a ser atualizado no banco
     * @internal param bool $returnInsertedObject Retornar o registro criado
     */
    public function getWhere(string $where, string $order = null,string $limit = null)
    {
        return parent::_getWhere($where, $order, $limit);
    }

    /**
     * Exclui um registro do banco
     * @param $id
     * @return Trilha
     */
    public function deleteById(int $id)
    {
        return parent::_deleteById($id);
    }

    /**
     * Valida os atributos
     * @param $vars
     * @return true em sucesso ou dispara uma exception em caso de não conformidade
     */
    public function validatePostVars($vars)
    {
        try {
            $validacoes = [
                Validator::stringType()->length(10)->setName('Título')->assert($vars['titulo']),
                Validator::stringType()->length(40)->setName('Resumo')->assert($vars['resumo']),
                Validator::stringType()->length(200)->setName('Descrição')->assert($vars['descricao'])
            ];

            if (isset($vars['ativa'])) {
                $validacoes[] = Validator::boolVal()->validate($vars['ativa']);
            }

        } catch (NestedValidationException $exception) {
            $errors = $exception->findMessages([
                'alnum' => '{{name}} deve ter apenas letras e números',
                'length' => '{{name}} deve ter mais caracteres',
                'noWhitespace' => '{{name}} não pode ter espaços'
            ]);

            throw new \Exception($exception->getFullMessage());
        }

        return true;
    }


}