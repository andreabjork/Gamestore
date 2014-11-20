<?php
	$cursor = new SQLite3("SQL/gamestore.db");
	// server superglobal er með REQUEST_METHOD sem er HTTP aðferð sem notuð var
	$method = $_SERVER['REQUEST_METHOD'];
	
	// hér verður haldið utan um gögn og athugað hvort gögn séu gild
	$registration = new Registration();

	// er verið að post'a formi? Meðhöndlum þá gögn
	if ($method === 'POST')
	{
		$registration->Populate($_POST);
		$valid = $registration->Valid();
		$errors = $registration->Errors();
	}
?>