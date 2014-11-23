<?php
$cur = new PDO("SQL/gamestore.db");

if(isset($_POST['action']) && !empty($_POST['action']) && isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['prod_id']) && !empty($_POST['prod_id'])){
	$action = $_POST['action'];
	$user = $_POST['user'];
	$prod_id = $_POST['prod_id'];
	$result = $cur->query("SELECT quantity FROM ShoppingCarts WHERE prod_id=$prod_id AND user='$user'");
	$qty=$result[0];
	switch($action){
		case 'increment' : increment($user,$prod_id);break;
		case 'decrement' : decrement($user,$prod_id);break;
		case 'remove' : remove($user,$prod_id);break;
		case 'add' : add($user,$prod_id);break;
		case 'exists' : exists($user,$prod_id);break;
	}
}

function increment($user,$id){
	$qty++;
	$stmt = "UPDATE ShoppingCarts SET quantity=$qty WHERE prod_id=$prod_id AND user='$user'";
	return $cur->exec($stmt);
}

function decrement($user,$id){
	$qty--;
	$stmt = "UPDATE ShoppingCarts SET quantity=$qty WHERE prod_id=$prod_id AND user='$user'";
	return $cur->exec($stmt);
}

function remove($user,$id){
	$stmt = "DELETE FROM ShoppingCarts WHERE prod_id=$prod_id AND user='$user'";
	return $cur->exec($stmt);
}

function add($user,$id){
	$stmt = "INSERT INTO ShoppingCarts (user,prod_id,quantity) VALUES ('$user',$prod_id,1)";
	return $cur->exec($stmt);
}

function exists($user,$id){
	$stmt = 'SELECT COUNT(*) FROM ShoppingCarts WHERE prod_id=$prod_id';
	$row = $stmt->query($stmt);
	
	if(!$row){return FALSE;}
	return TRUE;
}

?>