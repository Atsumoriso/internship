<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 30.06.16
 * Time: 12:40
 */

namespace App\Classes;

use App\Classes\DBConnector;
use App\Interfaces\EntityInterface;
use PDO;

class EntityManager implements EntityInterface
{
    public function getCollection()
    {
        $sql = "Select * from " . strtolower($this->_getClassName());
        $result = $this->_queryExecute($sql)->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE);

        return $result;
    }

    public function load($id)
    {
        $sql = "Select * from " . strtolower($this->_getClassName()) . " where id=" . $id;
        $result = $this->_queryExecute($sql)->fetch(PDO::FETCH_ASSOC);

        foreach ($result as $key => $entity) {
            $this->$key = $entity;
        }

        return $this;
    }

    public function save()
    {
        $entity = $this;

        if($entity->getId()==null) {
            $sql = $this->_insertBilder($entity);
        } else {
            $sql = $this->_updateBilder($entity);
        }

        $this->_queryExecute($sql);
    }

    public function delete()
    {
        $entity = $this;
        if($entity->getId()==null) {
            $sql = '';
            unset($entity);
        } else {
            $sql = "DELETE FROM " . strtolower($this->_getClassName()) . " WHERE id={$entity->id}";
        }

        $this->_queryExecute($sql);
    }

    protected function _getClassName() {
        $path = explode('\\', get_class($this));

        return array_pop($path);
    }

    protected function _setLastInsertredId($dbConnnection)
    {
        $this->id = $dbConnnection->lastInsertId();
    }

    protected function _queryExecute($sql)
    {
        try {
            $dbConnectorInstance = DBConnector::getInstance();
            $dbConnnection = $dbConnectorInstance->getConnection();
            $statement = $dbConnnection->prepare($sql);
            $statement->execute();
            $this->_setLastInsertredId($dbConnnection);

            return $statement;

        } catch (PDOException $e) {
            die("PDO Exception" . $e->getMessage());
        }
    }

    private function _countObjectProperties($object)
    {
        $count = 0;
        foreach ($object as $key => $obj) {
            if($key) {
                $count++;
            }
        }

        return $count;
    }

    protected function _insertBilder($entity)
    {
        $sql = "INSERT INTO " . strtolower($this->_getClassName()) . " (";
        $i = 0;
        //-1 because except id property
        $totalProp = $this->_countObjectProperties($this)-1;

        foreach ($entity as $key => $value) {
            if($key!='id') {
                $i++;
                $sql .= $key;

                if($i<$totalProp) {
                    $sql .= ",";
                }
            }
        }

        $sql .= ") VALUES(";
        $i = 0;

        foreach ($entity as $key => $value) {
            if($key!='id') {
                $i++;
                $sql .= "'" . $value . "'";

                if($i<$totalProp) {
                    $sql .= ", ";
                }
            }
        }

        $sql .=");";

        return $sql;
    }

    protected function _updateBilder($entity)
    {
        $sql = "UPDATE " . strtolower($this->_getClassName()) . " SET ";
        $i = 0;
        //-1 because except id property
        $totalProp = $this->_countObjectProperties($this)-1;

        foreach ($entity as $key => $value) {
            if($key!='id') {
                $i++;
                $sql .= $key . "=" . "'" . $value . "'" . " ";

                if($i<$totalProp) {
                    $sql .= ", ";
                }
            }
        }

        $sql .= " WHERE id = {$entity->getId()}";

        return $sql;
    }
}