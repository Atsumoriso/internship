<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 29.06.16
 * Time: 11:02
 */

namespace Sofi\Orm\Model;

use Sofi\Orm\Model\RepositoryModel;

class ManagerModel
{
    public function model($entity)
    {
        return new RepositoryModel($entity);
    }
}