<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:48
 */
namespace Logger\Core\Abstraction;

interface LoggerInterface
{
    function warning($msg);

    function error($msg);

    function notice($msg);
}

