<?php

function __autoload($classname) {
    $filename = "./". $classname .".php";
    require_once($filename);
}

$dbLoger = new LoggerDB;
$dbLoger->error('my custom error msg, it work2');

$fileLoger = new LoggerFile;
$fileLoger->error('my custom error msg');