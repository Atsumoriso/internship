<?php
use App\Entity\User;
use App\Entity\Product;
require './app/autoloader.php';

$user = new User();
$product = new Product();

//$user->setFirstName("test");
//$user->setLastName("test");
//$user->save();
//echo $user->getId();

$userCollection = $user->getCollection();
var_dump($userCollection);



