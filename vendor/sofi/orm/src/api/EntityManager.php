<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 30.06.16
 * Time: 12:40
 *
 * @category classes
 * @package App\Classes
 */

namespace Vendor\Sofi\Orm\Src\Api;

use Vendor\Sofi\Orm\Src\Api\DBConnector;
use App\Cms\Src\Entity\User;
use Vendor\Sofi\Orm\Src\Api\Interfaces\EntityInterface;
use PDO;
use ReflectionClass;
use ReflectionProperty;
/**
 * Class EntityManager
 * @author Ciklum intern https://github.com/leopardiwe/internship
 */
class EntityManager implements EntityInterface
{
    /**
     * this variable marked as true
     * when you try to insert new row
     * and return the latest id
     *
     * and it`s marked as false when
     * you try another sql operation
     *
     */
    private $setIdToggle;

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
            $sql = $this->_insertBuilder($entity);
        } else {
            $sql = $this->_updateBuilder($entity);
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

    /**
     * Get current entity class name
     * needed for sql queries to now
     * which table is needed to select
     *
     * @return string $path
     */
    protected function _getClassName() {
        $path = explode('\\', get_class($this));

        return array_pop($path);
    }

    /**
     * When you save new user this method
     * will help you to set id for new entity
     * object
     *
     * @param resource $dbConnnection
     * @return void
     */
    protected function _setLastInsertredId($dbConnnection)
    {
        $this->id = $dbConnnection->lastInsertId();
    }

    /**
     * This method execute all
     * sql queries
     *
     * @param string $sql
     * @return object $statement
     */
    protected function _queryExecute($sql)
    {
        try {
            $dbConnectorInstance = DBConnector::getInstance();
            $dbConnnection = $dbConnectorInstance->getConnection();
            $statement = $dbConnnection->prepare($sql);
            $statement->execute();

            if($this->setIdToggle) {
                $this->_setLastInsertredId($dbConnnection);
            }
            $this->setIdToggle = false;

            return $statement;

        } catch (PDOException $e) {
            die("PDO Exception" . $e->getMessage());
        }
    }

    /**
     * This method needed for counting all
     * object properties
     *
     * @param object $object
     * @return int count($props)
     */
    private function _countObjectProperties($object)
    {
        $reflect = new ReflectionClass($object);
        $props = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        return count($props);
    }

    /**
     * This method needed to build multiple
     * insert queries
     *
     * @param object $entity
     * @return string $sql
     */
    protected function _insertBuilder($entity)
    {
        $this->setIdToggle = true;
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

    /**
     * This method needed to build multiple
     * update queries
     *
     * @param object $entity
     * @return string $sql
     */
    protected function _updateBuilder($entity)
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