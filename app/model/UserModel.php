<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 17:09
 */

namespace App\Model;

use Sofi\Orm\Model\EntityManager;

class UserModel
{
    public function getAllUsers()
    {
        $em = new EntityManager;
        return $em->entity('user')->findAll();
    }
}