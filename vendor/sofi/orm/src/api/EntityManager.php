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

    public function load($id)
    {
        $sql = "Select * from {$this->getTableName()} where id=" . $id;
        $result = $this->_queryExecute($sql)->fetch(PDO::FETCH_ASSOC);

        foreach ($result as $key => $entity) {
            $this->setData($key, $entity);
        }

        return $this->data;
    }

    public function save()
    {
        $entity = $this;

        if($entity->getId()==null) {
            $this->_insertBuilder($entity);
        } else {
            $this->_updateBuilder($entity);
        }
    }

    public function delete()
    {
        $entity = $this;
        if($entity->getId()==null) {
            $sql = '';
            unset($entity);
        } else {
            $sql = "DELETE FROM {$this->getTableName()} WHERE id={$entity->getId()}";
        }

        $this->_queryExecute($sql);
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
     * This method needed to build multiple
     * insert queries
     *
     * @param object $entity
     * @return string $sql
     */
    protected function _insertBuilder($entity)
    {
        $dbConnectorInstance = DBConnector::getInstance();
        $dbConnnection = $dbConnectorInstance->getConnection();

        $this->setIdToggle = true;
        $data = array_slice($this->getData(), 1);
        $sql = "INSERT INTO {$this->getTableName()} ("
             .  implode(', ', array_keys($data)) . ") VALUES("
             .  implode(', ', array_map(function ($str) {
                        return sprintf(":%s", $str);
                },
                array_keys($data)))
             .  ")";


        $statement = $dbConnnection->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindParam(":" . $key, $value);
        }

        $statement->execute();
        $this->_setLastInsertredId($dbConnnection);
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
        $sql = "UPDATE {$this->getTableName()} SET ";
        $i = 0;
        //-1 because except id property
        $totalProp = count($this->getData())-1;

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