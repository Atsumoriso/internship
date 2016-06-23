<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:50
 */
namespace Core\Classes;

use Config;
use Core\Abstraction;

class LoggerFile extends \Core\Abstraction\LoggerAbstract
{
    protected $fileConnect;

    protected function _connect()
    {
        $this->fileConnect = fopen(Config\LoggerConfig::FILEPATH, "a");
    }

    protected function _write($msg, $type)
    {
        if (is_writable(Config\LoggerConfig::FILEPATH)) {
            $this->_connect();
            $readyMessage = date('Y-m-d H:i:s') . "\t| " . $type . $msg . PHP_EOL;
            fwrite($this->fileConnect, $readyMessage);
            fclose($this->fileConnect);
        } else {
            die("File: " . Config\LoggerConfig::FILEPATH . "is not writeable !");
        }

    }
}
