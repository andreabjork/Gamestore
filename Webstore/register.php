<?php
session_start();
$user = "guest";
if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
	$user = $_SESSION['user'];
}

header('Content-Type: text/html; charset=utf-8');

// to register the registration class must be available
require('classes/registration.class.php');

// This will hold registration data and validate it
$registration = new Registration();

$cursor = new PDO("sqlite:SQL/gamestore.db");

$method = $_SERVER['REQUEST_METHOD'];
$valid = FALSE;
$errors = array();
$affected = "Null";

// handle the form being posted
if ($method === 'POST')
{
	$registration->Populate($_POST);
	$valid = $registration->Valid($cursor);
	$errors = $registration->Errors();
	
	// if the registration was valid, write the info to the database
	if($valid){
		$affected = $registration->write($cursor);
		// if writing succeded, log the new user in and redirect to the index page.
		if($affected){
			$_SESSION['user'] = $_POST['username'];
			header( "refresh:5;url=index.php" );
		}
	}
}

// construct the page:
include('views/header.php');
include('views/form.php');
include('views/footer.php');