<?php
	header('Content-Type: text/html; charset=utf-8');
	// krefjumst þess að hafa registration klasann
	require('classes/registration.class.php');
	$cursor = new SQLite3("SQL/gamestore.db");
	// server superglobal er með REQUEST_METHOD sem er HTTP aðferð sem notuð var
	$method = $_SERVER['REQUEST_METHOD'];
	
	// hér verður haldið utan um gögn og athugað hvort gögn séu gild
	$registration = new Registration();
	$valid = FALSE;
	$errors = array();
	// er verið að post'a formi? Meðhöndlum þá gögn
	if ($method === 'POST')
	{
		$registration->Populate($_POST);
		$valid = $registration->Valid();
		$errors = $registration->Errors();
		
		if($valid){$registration->write($cursor);}
	}
	
	include('views/header.php');
	include('views/form.php');
	include('views/footer.php');
?>


