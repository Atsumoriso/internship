<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 29.06.16
 * Time: 11:02
 */

namespace Sofi\Orm\Model;

use Sofi\Orm\Model\Repository;

class EntityManager
{
    public function entity($entity)
    {
        return new Repository($entity);;
    }
}