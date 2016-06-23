<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:47
 */
namespace Core\Abstraction;

abstract class LoggerAbstract implements LoggerInterface
{
    protected $typeWarning = 'Warning message: ';

    protected $typeError = 'Error message: ';

    protected $typeNotice = 'Notice message: ';

    public function warning($msg)
    {
        $this->_write($msg, $this->typeWarning);
    }

    public function error($msg)
    {
        $this->_write($msg, $this->typeError);
    }

    public function notice($msg)
    {
        $this->_write($msg, $this->typeNotice);
    }

    abstract protected function _write($msg, $type);
}
