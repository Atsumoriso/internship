<?php
require('autoloader.php');

$dbLoger = new Logger\Core\Classes\LoggerDB;
$dbLoger->error('my custom error msg, it work2');

$fileLoger = new Logger\Core\Classes\LoggerFile;
$fileLoger->error('my custom error msg');

