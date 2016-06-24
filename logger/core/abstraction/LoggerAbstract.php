<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:47
 */
namespace Logger\Core\Abstraction;

abstract class LoggerAbstract implements LoggerInterface
{
    const TYPE_WARNING = 'Warning message: ';

    const TYPE_ERROR = 'Error message: ';

    const TYPE_NOTICE = 'Notice message: ';

    public function warning($msg)
    {
        $this->_write($msg, self::TYPE_WARNING);
    }

    public function error($msg)
    {
        $this->_write($msg, self::TYPE_ERROR);
    }

    public function notice($msg)
    {
        $this->_write($msg, self::TYPE_NOTICE);
    }

    abstract protected function _write($msg, $type);
}
