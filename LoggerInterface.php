<?php

/**
 * Created by PhpStorm.
 * User: dor
 * Date: 22.06.16
 * Time: 16:48
 */
interface LoggerInterface
{
    function warning($msg);

    function error($msg);

    function notice($msg);
}