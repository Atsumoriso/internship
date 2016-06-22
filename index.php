<?php

require_once('LoggerInterface.php');
require_once('LoggerAbstract.php');
require_once('LoggerDB.php');
require_once('LoggerFile.php');
require_once('Config.php');


$dbLoger = new LoggerDB;
$dbLoger->error('my custom error msg, it work2');

$fileLoger = new LoggerFile;
$fileLoger->error('my custom error msg');