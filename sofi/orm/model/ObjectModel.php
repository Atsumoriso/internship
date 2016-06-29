<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 16:43
 */

namespace Sofi\Orm\Model;


interface ObjectModel
{
    public function findBy($id);

    public function findAll();
}