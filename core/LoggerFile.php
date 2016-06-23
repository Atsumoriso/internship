<?php

/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:50
 */
class Core_LoggerFile extends Core_LoggerAbstract
{
    protected $fileConnect;

    protected function _connect()
    {
        $this->fileConnect = fopen(Config_LoggerConfig::FILEPATH, "a");
    }

    protected function _write($msg, $type)
    {
        if(is_writable(Config_LoggerConfig::FILEPATH))
        {
            $this->_connect();
            $readyMessage = date('Y-m-d H:i:s') . "\t| " . $type . $msg . PHP_EOL;
            fwrite($this->fileConnect, $readyMessage);
            fclose($this->fileConnect);
        } else {
            die("File: " . Config::FILEPATH ."is not writeable !");
        }

    }
}