<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 30.06.16
 * Time: 14:39
 */

namespace App\Cms\Src\Entity;

use Vendor\Sofi\Orm\Src\Api\EntityManager;

class Product extends EntityManager
{
    protected $id;

    protected $name;

    protected $price;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}