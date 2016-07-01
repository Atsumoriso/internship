<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 17:09
 */

namespace App\Cms\Src\Model;

use Vendor\Sofi\Orm\Src\Api\EntityManager;
use App\Cms\Src\Entity\User;

class UserModel extends EntityManager
{
    public function getAllUsers()
    {
        $user = new User;
        $userCollection = $user->getCollection();
        return $userCollection;
    }

    public function getUser($id)
    {
        $user = new User;
        return $user->load($id);
    }

    public function delUser()
    {
        $user = new User;
        $user->delete();
    }
}