<?php
session_start();
$user = "guest";
if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
	$user = $_SESSION['user'];
}

header('Content-Type: text/html; charset=utf-8');

require('classes/products.class.php');

try {
    /*** connect to SQLite database ***/
    $prodDB = new PDO("sqlite:SQL/gamestore.db");
} catch(PDOException $e) {
    echo $e->getMessage();
}

$products = new Products($prodDB);

$prodID = $_GET["id"];

$results = $products->Fetch("*", "id", $prodID);

// construct the site:
include('views/header.php');
include('views/about_product.php');
include('views/footer.php');


