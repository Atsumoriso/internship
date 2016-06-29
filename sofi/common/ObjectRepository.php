<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 16:43
 */

namespace Sofi\Common;


interface ObjectRepository
{
    public function find($id);

    public function findAll();

    public function findBy(array $criteria, $limit, $orderBy);
}