<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:49
 */
namespace Core\Classes;

use Config;
use Core\Abstraction;

class LoggerDB extends \Core\Abstraction\LoggerAbstract
{
    protected $dbh;

    protected function _connect()
    {
        $opt = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        );
        $dsn = "mysql:host=" . Config\LoggerConfig::HOST . ";dbname=" . Config\LoggerConfig::DBNAME . "";
        $this->dbh = new \PDO($dsn, Config\LoggerConfig::DBUSER, Config\LoggerConfig::DBPASS, $opt);
    }

    protected function _write($msg, $type)
    {
        try {
            $this->_connect();
            $statement = $this->dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
            $inserted = $statement->execute([$msg, 'error', date('Y-m-d H:i:s')]);
            unset($this->dbh);
        } catch (PDOException $e) {
            die("PDO Exception" . $e->getMessage());
        }
    }
}
