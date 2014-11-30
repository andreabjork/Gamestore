<?php
session_start();

//connect to the database:
try {
	$cur = new PDO("sqlite:SQL/gamestore.db");
} catch(PDOException $e) {
	echo $e->getMessage();
}


if(isset($_POST["username"]) && isset($_POST["password"])) {
	$user = $_POST["username"];
	$pwd = $_POST["password"];
	exists($user,$pwd,$cur);
}else if(isset($_POST["logout"])){
	unset($_SESSION['user']);
	// this echo is caught by ajax and won't be displayed on the site!
	echo "success";
}


// Usage: exists($user,$pwd,$cur)
// Pre:   $user is a string, $pwd is an md5 sum and $cur is a PDO object connected to the gamestore.db database
// Post:  echoes "success" if ($user,$pwd) is a (username,password) touple in Customers, in gamestore.db
//		  echoes "failure" otherwise. These echoes serve as a return value for ajax's handling.
function exists($user,$pwd,$cur){
	$exists = $cur->query("SELECT COUNT(*) FROM Customers WHERE username='$user' AND password='$pwd'");
	if($exists){
		$data = $exists->fetchAll();
		$row = $data[0];
		if($row[0]>0){
			$_SESSION['user'] = $user;
			// this echo is caught by ajax and won't be displayed on the site!
			echo "success";
		}
		else{
			// this echo is caught by ajax and won't be displayed on the site!
			echo "failure";
		}
	}
	else{
		// this echo is caught by ajax and won't be displayed on the site!
		echo "failure";
	}
}

?>