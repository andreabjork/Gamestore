<?php
session_start();
$user = "guest";
if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
	$user = $_SESSION['user'];
}

//contruct the site
include('views/header.php');
include('views/about_us.php');
include('views/footer.php');
?>