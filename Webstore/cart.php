<?php
// skilum UTF-8 til vafra með header
header('Content-Type: text/html; charset=utf-8');

//búum til tengingu við gagnagrunn
$cur = new PDO("SQL/gamestore.db");

//skilgreinum notandann sem á körfuna
$user = "guest";
if (isset($_GET['user']) && !empty($_GET['user'])){
	$user = $_GET['user'];
}

// púslum saman viðmóti -- hér gæti þurft að hrista eitthvað upp í hlutunum
include('views/header.php');
if($user === "guest"){
	//skilaboð um að þú þurfir að logga þig inn til að versla
}
else{
	include('views/cart_contents.php');
}
include('views/footer.php');