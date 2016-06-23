<?php

function __autoload($classname) {
    $sitePath = $_SERVER['DOCUMENT_ROOT'];
    $filename = str_replace('_', '/', lcfirst($classname)).'.php';
    $file = $sitePath . '/' . $filename;

    if (!file_exists($file))
    {
        return FALSE;
    }
    include $file;
}

$dbLoger = new Core_LoggerDB;
$dbLoger->error('my custom error msg, it work2');

$fileLoger = new Core_LoggerFile;
$fileLoger->error('my custom error msg');