<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:50
 */
namespace Logger\Core\Classes;

use Logger\Config\LoggerConfig;
use Logger\Core\Abstraction\LoggerAbstract;

class LoggerFile extends LoggerAbstract
{
    protected $fileConnect;

    protected function _connect()
    {
        $this->fileConnect = fopen(LoggerConfig::FILEPATH, "a");
    }

    protected function _write($msg, $type)
    {
        if (is_writable(LoggerConfig::FILEPATH)) {
            $this->_connect();
            $readyMessage = date('Y-m-d H:i:s') . "\t| " . $type . $msg . PHP_EOL;
            fwrite($this->fileConnect, $readyMessage);
            fclose($this->fileConnect);
        } else {
            die("File: " . LoggerConfig::FILEPATH . "is not writeable !");
        }

    }
}
