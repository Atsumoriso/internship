<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 16:28
 */

namespace Sofi\Orm\Model;

use Sofi\Common\ObjectRepository;
use Sofi\Orm\Connector\DBConnector;

class Repository implements ObjectRepository
{
    protected $entity;

    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    public function findAll()
    {
        try {
            $dbConnectorInstance = DBConnector::getInstance();
            $dbConnnection = $dbConnectorInstance->getConnection();
            $statement = $dbConnnection->prepare("Select * from " . $this->entity);
            $statement->execute();
            $result = $statement->fetchAll();
            unset($dbConnection);

            return $result;
        } catch (PDOException $e) {
            die("PDO Exception" . $e->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $dbConnectorInstance = DBConnector::getInstance();
            $dbConnnection = $dbConnectorInstance->getConnection();
            $statement = $dbConnnection->prepare("Select * from {$this->entity} where idUser={$id}");
            $statement->execute();
            $result = $statement->fetchAll();
            unset($dbConnection);

            return $result;
        } catch (PDOException $e) {
            die("PDO Exception" . $e->getMessage());
        }
    }

    public function findBy(array $criteria, $limit, $orderBy)
    {
        // TODO: Implement findBy() method.
    }
}