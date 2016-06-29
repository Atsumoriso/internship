<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 16:28
 */

namespace Sofi\Orm\Model;

use Sofi\Model;
use Sofi\Orm\Connector\DBConnector;

class RepositoryModel implements ObjectModel
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    private function _queryExecuter($sql)
    {
        try {
            $dbConnectorInstance = DBConnector::getInstance();
            $dbConnnection = $dbConnectorInstance->getConnection();
            $statement = $dbConnnection->prepare($sql);
            $statement->execute();
            unset($dbConnection);

            return $statement;

        } catch (PDOException $e) {
            die("PDO Exception" . $e->getMessage());
        }
    }

    public function queryBilder($sql)
    {
        $result = $this->_queryExecuter($sql);
        return $result->fetchAll();
    }

    public function findAll()
    {
        $sql = "Select * from " . $this->model;
        $result = $this->_queryExecuter($sql);

        return $result->fetchAll();
    }

    public function findBy($id)
    {
        $sql = "Select * from {$this->model} where idUser={$id}";
        $result = $this->_queryExecuter($sql);

        return $result->fetchAll();
    }

    public function save()
    {
        $sql = "INSERT INTO user (idUser,firstName,lastName) VALUES ('7','test','test');";
        $this->_queryExecuter($sql);
    }

    public function delete()
    {

    }
}