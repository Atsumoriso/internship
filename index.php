<?php
use Vendor\Core\Route;

include './vendor/autoloader.php';


$user = new \App\Cms\Src\Entity\User();

$user->setLastName('Moisey');
$user->setFirstName('Bandera');
$user->save();
var_dump($user->getData());
//Route::start();
