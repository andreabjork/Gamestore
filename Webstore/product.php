<?php
header('Content-Type: text/html; charset=utf-8');

// Things we might want to change
const DEBUG = true;
const CACHE_TIME = 600;
const CACHE_FS = 'cache/';
const WS_URL = 'http://apis.is/concerts';

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
echo $prodID;

/*
$results = $products->Fetch("*", "id", $prodID);
$data = $results->fetchAll();

foreach($data as $product) {
	echo '<div class="container">';
		echo '<div class="imgBox">';
		$imgsrc = $product["img_src"];
		if($imgsrc == "") {
			$imgsrc = "data/notfound.jpg";
		}
			echo '<img src="'.$imgsrc.'">';
			
		echo '</div>';
		echo '<div class="textBox">';
			echo '<h1>'.$product["name"].'</h1>';
			echo '<p>'.$product["description"].'</p>';
		echo '</div>';
	echo '</div>';
}

*/


if (DEBUG) {
	ini_set('display_errors', 1);
	error_reporting(~0);
}

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


