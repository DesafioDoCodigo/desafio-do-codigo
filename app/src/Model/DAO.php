<?php
/**
 * Created by PhpStorm.
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
     * Cria um novo registro a partir do objeto
     * @param $obj Objeto a ser inserido no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return \App\Model\User
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
     * @return User
     */
    protected function _update($obj, $returnInsertedObject = false)
    {
        try {
            // O objeto informado tem id?
            if ($obj->id == null) {
                throw new \Exception("O objeto passado em _update não tem id");
            }
            $props = $this->getProps();
            $fields = [];
            foreach ($props as $prop) {
                $fields[$prop] = $prop . '=:' . $prop;
            }
//            var_dump($fields);
            $values = implode(', ', $fields);
//            var_dump($fields); var_dump($values);

            $sql = "UPDATE $this->tableName SET $values WHERE id=$obj->id";
//            var_dump($sql);

            $sth = $this->pdo->prepare($sql);
            foreach ($fields as $field => $value) {
                $sth->bindValue(':' . $field, $obj->$field);
            }

            $r = $sth->execute();
//            var_dump($r);

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
     * @todo
     */
    public function _delete(User $user)
    {
    }

    /**
     * @todo
     */
    public function _getAll($order)
    {
    }

    /**
     * @todo
     */
    public function _getWhere($where, $order)
    {
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
}