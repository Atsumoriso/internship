<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 29.06.16
 * Time: 12:08
 */

namespace App\Cms\Src\Entity;

use Vendor\Sofi\Orm\Src\Api\EntityManager;

class User extends EntityManager
{
    protected $data = array(
        'id'        =>  '',
        'firstName' =>  '',
        'lastName'  =>  ''
    );

    protected $tableName = 'user';

    public function getTableName()
    {
        return $this->tableName;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function getFirstName()
    {
        return $this->data['firstName'];;
    }

    public function getLastName()
    {
        return $this->data['lastName'];
    }

    public function setFirstName($firstName)
    {
        $this->data['firstName'] = $firstName;
    }

    public function setLastName($firstName)
    {
        $this->data['lastName'] = $firstName;
    }
}