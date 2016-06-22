<?php

/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:47
 */
abstract class LoggerAbstract implements LoggerInterface
{
    public function warning($msg)
    {
        $this->write($msg, 'Warning message: ');
    }

    public function error($msg)
    {
        $this->write($msg, 'Error message: ');
    }

    public function notice($msg)
    {
        $this->write($msg, 'Notice message: ');
    }

    abstract protected function write($msg, $type);
}