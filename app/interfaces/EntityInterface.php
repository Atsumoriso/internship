<?php

/**
 * Created by PhpStorm.
 * User: dor
 * Date: 29.06.16
 * Time: 22:21
 */
namespace App\Interfaces;

interface EntityInterface
{
    public function save();

    public function load($id);

    public function delete();

    public function getCollection();
}