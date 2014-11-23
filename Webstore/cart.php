<?php
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
$user = "guest";
if (isset($_GET['user']) && !empty($_GET['user'])){
	$user = $_GET['user'];
}

$results = $cartProd->Fetch('*','user',"'$user'",'ShoppingCarts');
$data = $results->fetchAll();

include('views/header.php');
if($user === "guest"){
	//skilaboð um að þú þurfir að logga þig inn til að versla
}
else{
	include('views/cart_contents.php');
}
include('views/footer.php');