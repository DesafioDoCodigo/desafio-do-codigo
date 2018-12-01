<?php
/**
 * DAO de desafios
 * É quem lida com a coleção de registros, é o repositório de registros
 *
 * Desafio: tiagogouvea
 * Date: 13/06/18
 * Time: 12:48
 */

namespace App\Model;

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;
use PDO;
use App\Model\Desafio;

class DesafioDAO extends DAO implements IDAO
{
    /* @var $pdo PDO */

    protected $pdo;
    protected static $instance;
    protected $tableName = 'desafio';
    protected $instanceClassName = 'Desafio';

    static function getInstance($pdo = null)
    {
        if (self::$instance == null) {
            global $pdo;
            self::$instance = new DesafioDAO($pdo);
        }
        return self::$instance;
    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param $id
     * @return Desafio
     */
    public function findById(int $id)
    {
        return parent::_findById($id);
    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param $id
     * @return Desafio
     */
    public function getAll(string $order = null, string $limit = null)
    {
        return parent::_getAll(($order ? $order : 'ordem asc'),$limit);
    }

    /**
     * Cria um novo registro a partir do objeto
     * @param \App\Model\Desafio $Desafio Objeto a ser inserido no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return \App\Model\Desafio
     */
    public function insert(Instancia $obj, $returnInsertedObject = true)
    {
        return parent::_insert($obj, $returnInsertedObject);
    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param \App\Model\Desafio $Desafio Objeto a ser atualizado no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return Desafio
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
     * @return \App\Model\Desafio[]
     * @internal param \App\Model\Desafio $Desafio Objeto a ser atualizado no banco
     * @internal param bool $returnInsertedObject Retornar o registro criado
     */
    public function getWhere(string $where, string $order = null,string $limit = null)
    {
        return parent::_getWhere($where, ($order ? $order : 'ordem asc'), $limit);
    }

    /**
     * Exclui um registro do banco
     * @param $id
     * @return Desafio
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
                Validator::stringType()->length(4)->setName('Título')->assert($vars['titulo']),
                Validator::stringType()->length(100)->setName('Conteudo')->assert($vars['conteudo'])
            ];

            if (isset($vars['ativo'])) {
                $validacoes[] = Validator::boolVal()->validate($vars['ativo']);
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