<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 17:25
 */

namespace App\Classes;

use PDO;

final class DBConnector
{
    const DBNAME = 'pdoLesson';
    const DBUSER = 'root';
    const DBPASS = '1';
    const HOST = 'localhost';
    const DSN = "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . "";
    private static $_instance = null;
    private static $_connection;

    private function __construct(){
        $this->_connection = new PDO(self::DSN, self::DBUSER, self::DBPASS);
    }

    public static function getInstance()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function getConnection() {
        return $this->_connection;
    }

    private function __wakeup(){}

    private function __sleep(){}

    private function __clone(){}
}