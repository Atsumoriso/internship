<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:49
 */
namespace Core\Classes;

use Config\LoggerConfig;
use Core\Abstraction\LoggerAbstract;
use PDO;

class LoggerDB extends LoggerAbstract
{
    protected $dbh;

    protected function _connect()
    {
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $dsn = "mysql:host=" . LoggerConfig::HOST . ";dbname=" . LoggerConfig::DBNAME . "";
        $this->dbh = new PDO($dsn, LoggerConfig::DBUSER, LoggerConfig::DBPASS, $opt);
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
