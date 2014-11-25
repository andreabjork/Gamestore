<?php
session_start();
$user = "guest";
if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
	$user = $_SESSION['user'];
}

header('Content-Type: text/html; charset=utf-8');

// Things we might want to change
const DEBUG = true;

require('classes/products.class.php');



try {
    /*** connect to SQLite database ***/
    $prodDB = new PDO("sqlite:SQL/gamestore.db");
} catch(PDOException $e) {
    echo $e->getMessage();
}


// TODO búa til gamestore.db
$products = new Products($prodDB);

$prodID = $_GET["id"];

$results = $products->Fetch("*", "id", $prodID);

if (DEBUG) {
	ini_set('display_errors', 1);
	error_reporting(~0);
}

include('views/header.php');
include('views/about_product.php');
include('views/footer.php');
/*
// How long have been?
$logger->Log("Finished!");
*/

if (DEBUG) {
	include('views/debug.php');
}


