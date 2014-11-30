<?php
session_start();
$user = "guest";
if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
	$user = $_SESSION['user'];
}


header('Content-Type: text/html; charset=utf-8');

require("classes/products.class.php");

// establish a database connection
try {
	/*** connect to SQLite database ***/
	$cur = new PDO("sqlite:SQL/gamestore.db");
} catch(PDOException $e) {
	echo $e->getMessage();
}

$cartProd = new Products($cur); 

// cart contents for this user generated.
$results = $cartProd->Fetch('*','user',"'$user'",'ShoppingCarts');
$data = $results->fetchAll();

//construct the site
include('views/header.php');
if($user === "guest"){
	include('views/cart_unavailable.php');
}
else{
	include('views/cart_contents.php');
}
include('views/footer.php');