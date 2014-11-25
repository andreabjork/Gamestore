<?php
session_start();
//búum til tengingu við gagnagrunn

try {
	$cur = new PDO("sqlite:SQL/gamestore.db");
} catch(PDOException $e) {
	echo $e->getMessage();
}


if(isset($_POST["username"]) && isset($_POST["password"])) {
	$user = $_POST["username"];
	$pwd = $_POST["password"];
	return exists($user,$pwd,$cur);
}else if(isset($_POST["logout"])){
	unset($_SESSION['user']);
	echo "success";
}

function exists($user,$pwd,$cur){
	$exists = $cur->query("SELECT COUNT(*) FROM Customers WHERE username='$user' AND password='$pwd'");
	if($exists){
		$data = $exists->fetchAll();
		$row = $data[0];
		if($row[0]>0){
			$_SESSION['user'] = $user;
			echo "success";
		}
		else{
			echo "failure";
		}
	}
	else{
		echo "failure";
	}
}

?>