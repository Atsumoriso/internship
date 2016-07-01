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
    protected $id;

    protected $firstName;

    protected $lastName;
    
    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
}