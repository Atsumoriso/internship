<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 17:09
 */

namespace App\Model;

use Sofi\Orm\Model\ManagerModel;

class UserModel 
{
    public static function getAllUsers()
    {
        $em = new ManagerModel;
        //$user = new User();
        return $em->model('user')->findAll();
    }
}