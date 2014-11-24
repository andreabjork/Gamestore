<?php
//búum til tengingu við gagnagrunn
try {
	$cur = new PDO("sqlite:SQL/gamestore.db");
} catch(PDOException $e) {
	echo $e->getMessage();
}

if(isset($_POST["username"]) && isset($_POST["password"])) {
	$user = $_POST["username"];
	$pwd = md5($_POST["password"]);
	
	$exists = $cur->exec("SELECT * FROM Customers WHERE username='$user' AND password='$pwd'")->fetch(PDO::FETCH_ASSOC);
	
	if($exists){
		return $user;
	}
	return "error";
}

?>