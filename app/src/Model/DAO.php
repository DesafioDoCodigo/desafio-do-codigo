<?php
/**
 * User: tiagogouvea
 * Date: 24/03/18
 * Time: 17:00
 */

namespace App\Model;

use Exception;
use PDO;
use PDOException;
use ReflectionClass;
use ReflectionProperty;

class DAO
{
    /* @var $pdo PDO */
    protected $pdo;
    protected $tableName;
    protected $instanceClassName;

    protected $props;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Retorna o número de registros na tabela
     * @return Integer
     */
    public function getCount()
    {
        $result = $this->pdo->prepare('select count(*) as count from ' . $this->tableName);
        $result->execute();
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    /**
     * Procura no banco de dados por id e retorna o objeto
     * @param $id
     * @return mixed
     */
    protected function _findById($id)
    {
        $sql = $this->pdo->prepare('select * from ' . $this->tableName . ' where id=:id');
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sql->execute()) {
            return $sql->fetchObject($this->getInstanceNamespaceClassName());
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    /**
     * Exclui um registro do banco
     * @param $id
     * @return mixed
     */
    protected function _deleteById($id)
    {
        $sql = $this->pdo->prepare('delete from ' . $this->tableName . ' where id=:id');
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sql->execute()) {
            return true;
        } else {
            die($sql->errorCode());
        }
    }


    /**
     * Cria um novo registro a partir do objeto
     * @param $obj Objeto a ser inserido no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return \App\Model\UsuarioOld
     */
    protected function _insert($obj, $returnInsertedObject = false)
    {
        try {
            $props = $this->getProps();
            $insert = [];
            foreach ($props as $prop) {
                $insert[$prop] = ':' . $prop;
            }

            $fields = implode(',', array_keys($insert));
            $values = implode(',', $insert);
//            var_dump($insert); var_dump($fields); var_dump($values);

            $sql = "INSERT INTO $this->tableName ($fields) VALUES ($values)";
//            var_dump($sql);
            $sth = $this->pdo->prepare($sql);
            foreach ($insert as $field => $value) {
                $sth->bindValue(':' . $field, $obj->$field);
            }
            $r = $sth->execute();

            if ($returnInsertedObject) {
                $lastID = $this->pdo->lastInsertId();
                return $this->findById($lastID);
            }

            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage() . "<br><br>";
            die('Database access FAILED!');
        } catch (Exception $e) {
            echo $e->getMessage() . "<br><br>";
            die('Database access FAILED!');
        }

    }

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param $obj Objeto a ser atualizado no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return UsuarioOld
     */
    protected function _update($obj, $returnInsertedObject = true)
    {
        try {
            // O objeto informado tem id?
            if ($obj->id == null) {
                throw new \Exception("O objeto passado em _update não tem id");
            }
            $props = $this->getProps();
            $fields = [];
            foreach ($props as $prop) {
                if (property_exists($obj, $prop))
                    $fields[$prop] = $prop . '=:' . $prop;
            }
            // var_dump($fields);
            $values = implode(', ', $fields);
            // var_dump($fields);
            // var_dump($values);


            $sql = "UPDATE $this->tableName SET $values WHERE id=$obj->id";
            // var_dump($obj);
            // var_dump($sql);
            // die();

            $sth = $this->pdo->prepare($sql);
            foreach ($fields as $field => $value) {
                $sth->bindValue(':' . $field, $obj->$field);
            }

            $r = $sth->execute();
//            var_dump($r);

            if (!$r) {
                var_dump("r is false. Why?");
                var_dump($sql);
            }

            if ($returnInsertedObject) {
                return $this->findById($obj->id);
            }

            return $obj;
        } catch (PDOException $e) {
            echo $e->getMessage() . "<br><br>";
            die('Database access FAILED!');
        } catch (Exception $e) {
            echo $e->getMessage() . "<br><br>";
            die('Database access FAILED!');
        }
    }

    /**
     * @todo
     * @param UsuarioOld $user
     */
    public function _delete(UsuarioOld $user)
    {
    }

    /**
     * @todo
     * @param string $order
     */
    public function _getAll(string $order = null, string $limit = null)
    {
        $query = 'SELECT * FROM ' . $this->tableName;
        if ($order)
            $query .= ' ORDER BY ' . $order;
        if ($limit)
            $query .= ' LIMIT ' . $limit;
        $sql = $this->pdo->prepare($query);
        if ($sql->execute()) {
            return $sql->fetchAll(PDO::FETCH_CLASS, $this->getInstanceNamespaceClassName());
        } else {
            // Query failed.
            // Query failed.
            var_dump($sql->errorInfo());
            var_dump($sql->errorCode());
            die("Erro de sql em _getAll");
        }
    }

    /**
     * @todo
     * @param string $where
     * @param string|null $order
     * @param string|null $limit
     * @return array
     */
    public function _getWhere(string $where, string $order = null, int $limit = null, int $startingAt = null)
    {
        $query = 'SELECT * FROM ' . $this->tableName;
        if ($where)
            $query .= " WHERE $where";
        if ($order)
            $query .= " ORDER BY $order";
        if ($startingAt && $limit)
            $query .= " LIMIT $startingAt, $limit";
        if ($limit)
            $query .= " LIMIT $limit";
        $sql = $this->pdo->prepare($query);
        if ($sql->execute()) {
            return $sql->fetchAll(PDO::FETCH_CLASS, $this->getInstanceNamespaceClassName());
        } else {
            // Query failed.
            var_dump($sql->errorInfo());
            var_dump($sql->errorCode());
            die("Erro de sql em _getWhere");
        }
    }


    /**
     * @todo
     * @param string $where
     * @param string|null $order
     * @param string|null $limit
     * @return array
     */
    public function _countWhere(string $where)
    {
        $query = 'SELECT count(*) as count FROM ' . $this->tableName . ' WHERE ' . $where;
        $sql = $this->pdo->prepare($query);
        if ($sql->execute()) {
            $count = $sql->fetch(PDO::FETCH_ASSOC);
            return $count['count'];
        } else {
            // Query failed.
            var_dump($sql->errorInfo());
            var_dump($sql->errorCode());
            die("Erro de sql em _countWhere");
        }
    }

    /**
     * Retorna o nome da classe DAO com o namespace antes
     * Exemplo: App\Model\User
     * @return string
     */
    protected function getInstanceNamespaceClassName()
    {
        return __NAMESPACE__ . '\\' . $this->instanceClassName;
    }

    /**
     * Retorna as props (atributos) da classe que representamos
     * Se a classe for User por exemplo, retornará um array com
     * ["id","nome","email",etc]
     * @return array
     */
    private function getProps()
    {
        // Se já temos algo, devolvemos
        if ($this->props) return $this->props;

        //
        $reflect = new ReflectionClass($this->getInstanceNamespaceClassName());
        $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED | ReflectionProperty::IS_PRIVATE);
        $this->props = [];
        foreach ($props as $prop) {
            $this->props[$prop->getName()] = $prop->getName();
        }

        // Armazenar na classe pra não precisar mais obter
        return $this->props;
    }


    /**
     * Cria um novo registro no banco a partir de um array (certamente vindo do POST)
     * @param $vars
     * @return mixed
     */
    public function insertFromArray($vars)
    {
        // Validar dados recebidos
        $valid = $this->validatePostVars($vars);

        // Criar novo objeto
        $obj = $this->fromArray($vars);

        // Salvar
        $registro = $this->insert($obj);

        return $registro;
    }

    /**
     * Atualiza um novo registro no banco a partir de um array (certamente vindo do POST)
     * @param $vars
     * @return mixed
     */
    public function updateFromArray(int $id, $vars, $returnInsertedObject = true)
    {
        // Validar dados recebidos
        $valid = $this->validatePostVars($vars);

        // Criar novo objeto
        $obj = $this->fromArray($vars);
        $obj->id = $id;


        // Salvar
        $registro = $this->_update($obj, $returnInsertedObject);

        return $registro;
    }


    /**
     * Cria um objeto do tipo da classe herdeira, a partir de um array
     * @param $array
     * @return mixed
     */
    public function fromArray($array)
    {
        $className = $this->getInstanceNamespaceClassName();
        $obj = new $className;
        foreach ($array as $fieldName => $fieldValue) {
            $obj->$fieldName = $fieldValue;
        }
        return $obj;
    }

}