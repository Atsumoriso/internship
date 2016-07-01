<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 01.07.16
 * Time: 9:30
 *
 * @category config
 * @package App\Config
 */

namespace App\Config;

/**
 * Class MySqlConfig
 * @author Ciklum intern https://github.com/leopardiwe/internship
 */
class MySqlConfig
{
    const DB_NAME = 'pdoLesson';
    const DB_USER = 'root';
    const DB_PASS = '1';
    const HOST = 'localhost';
    const DSN = "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME . "";
}