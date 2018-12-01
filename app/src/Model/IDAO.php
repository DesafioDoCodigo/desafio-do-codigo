<?php
/**
 * Created by PhpStorm.
 * User: tiagogouvea
 * Date: 24/03/18
 * Time: 17:00
 */

namespace App\Model;

interface IDAO
{
    /**
     * Retorna o número de registros na tabela
     * @return Integer
     */
    function getCount();

    /**
     * Procura no banco de dados por id e retorna o objeto
     * @param $id
     * @return mixed
     */
    function findById(int $id);

    /**
     * Exclui um registro do banco
     * @param $id
     * @return mixed
     */
    function deleteById(int $id);

    /**
     * Cria um novo registro a partir do objeto
     * @param $obj Objeto a ser inserido no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return \App\Model\UsuarioOld
     */
    function insert(Instancia $obj, $returnInsertedObject = true);

    /**
     * Procura no banco de dados pelo registro e o retorna
     * @param $obj Objeto a ser atualizado no banco
     * @param bool $returnInsertedObject Retornar o registro criado
     * @return UsuarioOld
     */
    function update(Instancia $obj, $returnInsertedObject = true);


    /**
     * @todo
     * @param string $order
     */
    function getAll(string $order = null, string $limit = null);

    /**
     * @todo
     * @param string $where
     * @param string|null $order
     * @param string|null $limit
     * @return array
     */
    function getWhere(string $where, string $order = null, string $limit = null);


    /**
     * Cria um novo registro no banco a partir de um array (certamente vindo do POST)
     * @param $vars
     * @return mixed
     */
    function insertFromArray($vars);

    /**
     * Atualiza um novo registro no banco a partir de um array (certamente vindo do POST)
     * @param $vars
     * @return mixed
     */
    function updateFromArray(int $id, $vars);

    /**
     * Valida os atributos de uma instância, de um registro, quando necessário
     * @param $vars
     * @return mixed - deve retornar true para ser considerado válido
     */
    function validatePostVars($vars);
}