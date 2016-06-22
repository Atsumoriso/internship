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
        $this->_write($msg, 'Warning message: ');
    }

    public function error($msg)
    {
        $this->_write($msg, 'Error message: ');
    }

    public function notice($msg)
    {
        $this->_write($msg, 'Notice message: ');
    }

    abstract protected function _write($msg, $type);
}