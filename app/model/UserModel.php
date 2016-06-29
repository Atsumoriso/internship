<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 17:09
 */

namespace App\Model;

use Sofi\Orm\Model\Repository;
use App\Entity\User;

class UserModel extends Repository
{
    public function getAllUsers()
    {
        return $this->findAll('user');
    }
}