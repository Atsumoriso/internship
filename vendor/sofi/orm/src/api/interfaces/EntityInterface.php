<?php

/**
 * Created by PhpStorm.
 * User: dor
 * Date: 29.06.16
 * Time: 22:21
 *
 * @category interfaces
 * @package App\Interfaces
 */
namespace Vendor\Sofi\Orm\Src\Api\Interfaces;


/**
 * Interface EntityInterface
 * @author Ciklum intern https://github.com/leopardiwe/internship
 */
interface EntityInterface
{
    /**
     * save current entity object
     *
     * @return void
     */
    public function save();

    /**
     * load entity object by id
     * @param int $id
     * @return void
     */
    public function load($id);

    /**
     * delete current entity object
     *
     * @return void
     */
    public function delete();
}