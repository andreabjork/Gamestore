<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
}

// Things we might want to change
const DEBUG = false;
const CACHE_TIME = 600;
const CACHE_FS = 'cache/';
const WS_URL = 'http://apis.is/concerts';

require('classes/products.class.php');



try {
    $prodDB = new PDO("sqlite:SQL/gamestore.db");
} catch(PDOException $e) {
    echo $e->getMessage();
}



$products = new Products($prodDB);

$errors = array();
/*
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
	// TODO meðhöndla POST frá formi og hugsanlegar villur
	foreach($_GET as $key => $value) {
		$products->Insert($title, $key);
	}
}*/

// Sækja færslur svo hægt sé að birta
if(isset($_GET["searchField"])) {
	$results = $products->FetchResults($_GET["searchField"]);
}elseif(isset($_GET["genre"])) {
	$results = $products->FetchGenre($_GET["genre"]);
} else {
	$results = $products->Fetch("*");
}

if (DEBUG) {
	ini_set('display_errors', 1);
	error_reporting(~0);
}
/*
// Our dependencies
$logger = require('log.php');
require('cache.php');
require('product.class.php');

$cache = new Cache(60);

// Track how long we're doing all of this
$logger->Log("Starting");

$rest = new RestClient($cache, $logger);

try {
	$data = $rest->Request(WS_URL, 'GET', true);
}
catch (Exception $e) {
	// make sure the view can handle a false $data
	$data = false;
}
*/
include('views/header.php');
include('views/main.php');
include('views/footer.php');
/*
// How long have been?
$logger->Log("Finished!");
*/

if (DEBUG) {
	include('views/debug.php');
}

