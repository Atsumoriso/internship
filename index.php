<?php
require('autoloader.php');

$dbLoger = new Core\Classes\LoggerDB;
$dbLoger->error('my custom error msg, it work2');

$fileLoger = new Core\Classes\LoggerFile;
$fileLoger->error('my custom error msg');

