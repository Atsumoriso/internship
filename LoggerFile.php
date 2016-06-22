<?php

/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:50
 */
class LoggerFile extends LoggerAbstract
{
    protected $fileConnect;

    protected function connect()
    {
        $this->fileConnect = fopen(Config::FILEPATH, "a");
    }

    protected function write($msg, $type)
    {
        if(is_writable(Config::FILEPATH))
        {
            $this->connect();
            $readyMessage = date('Y-m-d H:i:s') . "\t| " . $type . $msg . PHP_EOL;
            fwrite($this->fileConnect, $readyMessage);
            fclose($this->fileConnect);
        } else {
            die("File: " . Config::FILEPATH ."is not writeable !");
        }

    }
}