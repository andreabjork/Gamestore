<?php
session_start();
$user = "guest";
if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
	$user = $_SESSION['user'];
}


echo $_POST["action"];
echo $user;
echo $_POST["prod_id"];

echo "something is working";
// Þurfum products.class hlutinn
require("classes/products.class.php");

//búum til tengingu við gagnagrunn
try {
	$cur = new PDO("sqlite:SQL/gamestore.db");
} catch(PDOException $e) {
	echo $e->getMessage();
}

//búum til products hlut
$cartProd = new Products($cur); 

if(isset($_POST["action"]) && isset($_POST["prod_id"]) && $user!="guest") {
	echo "we made it into the if statement!";
	switch ($_POST["action"]) {
		case 'remove':
			echo "we reached the remove part!";
			$cartProd->Delete($user, $_POST["prod_id"]);
			break;
		case 'increment':
			$cartProd->Increment($user, $_POST["prod_id"]);
			break;
		case 'decrement':
			$cartProd->Decrement($user, $_POST["prod_id"]);
			break;
		case 'add':
			echo "ok so were actually trying to add something";
			$cartProd->Add($user, $_POST["prod_id"]);
			break;
		default:
			echo "nothing was valid";
			break;
	}
}

?>
