<?php
session_start();
$user = "guest";
if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
	$user = $_SESSION['user'];
}

header('Content-Type: text/html; charset=utf-8');

require('classes/products.class.php');

// establish a database connection
try {
    $prodDB = new PDO("sqlite:SQL/gamestore.db");
} catch(PDOException $e) {
    echo $e->getMessage();
}

$products = new Products($prodDB);
$errors = array();

// Fetch entries to display them
if(isset($_GET["searchField"])) {
	$results = $products->FetchResults($_GET["searchField"]);
}elseif(isset($_GET["genre"])) {
	$results = $products->FetchGenre($_GET["genre"]);
} else {
	$results = $products->Fetch("*");
}

// construct the site
include('views/header.php');
include('views/main.php');
include('views/footer.php');

