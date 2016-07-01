<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 17:25
 *
 * @category classes
 * @package App\Classes
 */

namespace App\Classes;

use App\Config\MySqlConfig;
use PDO;

/**
 * Class DBConnector
 * @author Ciklum intern https://github.com/leopardiwe/internship
 */
final class DBConnector
{
    private static $_instance = null;
    private  $_connection;

    /**
     * DBConnector constructor, create new database
     * connection
     */
    private function __construct(){
        $this->_connection = new PDO(MySqlConfig::DSN, MySqlConfig::DB_USER, MySqlConfig::DB_PASS);
    }

    /**
     * @return DBConnector instance
     */
    public static function getInstance()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * @return PDO connection to DB
     */
    public function getConnection() {
        return $this->_connection;
    }

    private function __wakeup(){}

    private function __sleep(){}

    private function __clone(){}
}