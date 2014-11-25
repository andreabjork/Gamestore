<?php
session_start();
$user = "guest";
if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
	$user = $_SESSION['user'];
}

include('views/header.php');
include('views/about_us.php');
include('views/footer.php');
?>