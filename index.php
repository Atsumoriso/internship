<?php
use App\Entity\User;
use App\Entity\Product;

require './app/autoloader.php';

$user = new User();
$product = new Product();

$user->load(22);
$user->setFirstName("Karl");
$user->setLastName("Marks");
$user->save();
var_dump($user);

$userCollection = $user->getCollection();
//var_dump($userCollection);



