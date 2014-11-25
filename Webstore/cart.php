<?php
session_start();
$user = "guest";
if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
	$user = $_SESSION['user'];
}

// skilum UTF-8 til vafra með header
header('Content-Type: text/html; charset=utf-8');


// Þurfum products.class hlutinn
require("classes/products.class.php");

//búum til tengingu við gagnagrunn
try {
	/*** connect to SQLite database ***/
	$cur = new PDO("sqlite:SQL/gamestore.db");
} catch(PDOException $e) {
	echo $e->getMessage();
}

//búum til products hlut
$cartProd = new Products($cur); 

//skilgreinum notandann sem á körfuna
$results = $cartProd->Fetch('*','user',"'$user'",'ShoppingCarts');
$data = $results->fetchAll();
include('views/header.php');
if($user === "guest"){
	//
}
else{
	include('views/cart_contents.php');
}
include('views/footer.php');