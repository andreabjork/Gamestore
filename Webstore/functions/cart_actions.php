
<?php
echo $_POST["action"];


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

if(isset($_POST["action"]) && isset($_POST["prod_id"]) && isset($_POST["user"])) {
	switch ($_POST["action"]) {
		case 'remove':
			echo "we reached the remove part!";
			$cartProd->Delete($_POST["user"], $_POST["prod_id"]);
			break;
		case 'increment':
			$cartProd->Increment($_POST["user"], $_POST["prod_id"]);
			break;
		case 'decrement':
			$cartProd->Decrement($_POST["user"], $_POST["prod_id"]);
			break;
		case 'add':
			$cartProd->Add($_POST["user"], $_POST["prod_id"]);
			break;
		default:
			echo "nothing was valid";
			break;
	}
}

?>
