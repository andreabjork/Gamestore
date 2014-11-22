<?php
// skilum UTF-8 til vafra með header
header('Content-Type: text/html; charset=utf-8');

// krefjumst þess að hafa registration klasann
require('classes/registration.class.php');

// hér verður haldið utan um gögn og athugað hvort gögn séu gild
$registration = new Registration();

// server superglobal er með REQUEST_METHOD sem er HTTP aðferð sem notuð var
$method = $_SERVER['REQUEST_METHOD'];
$valid = FALSE;
$errors = array();

// er verið að post'a formi? Meðhöndlum þá gögn
if ($method === 'POST')
{
	$registration->Populate($_POST);
	$valid = $registration->Valid();
	$errors = $registration->Errors();
}

// púslum saman viðmóti -- hér gæti þurft að hrista eitthvað upp í hlutunum
include('views/header.php');
include('views/form.php');
include('views/footer.php');