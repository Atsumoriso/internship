<?php

function __autoload($classname) {
    $sitePath = $_SERVER['DOCUMENT_ROOT'];
    $filename = explode("\\", $classname);

    for($i=0; $i<count($filename)-1; $i++)
    {
       $filename[$i] = lcfirst($filename[$i]);
    }

    $filename = implode('/', $filename);
    $file = $sitePath . '/' . $filename . '.php';

    if (!file_exists($file))
    {
        return FALSE;
    }

    require_once $file;
}

$dbLoger = new Core\Classes\LoggerDB;
$dbLoger->error('my custom error msg, it work2');

$fileLoger = new Core\Classes\LoggerFile;
$fileLoger->error('my custom error msg');