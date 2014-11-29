<?php

class Products {
	private $pdo; // PDO object for SQL

	// Use: p = new Products();
	// Pre: $pdo is a nonempty database
	// Post: p is a Products object with PDO object $pdo.
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	// Use: $res = product->Fetch($key, $attr, $cond, $table)
	// Pre: $key is an id from the tablem, $attr is an attribute from the table, (default: ""),
	//		$cond is a condition for the attribute $attr (default: "") and $table is the table (default: "Products")
	// Post: $res is a PDO object containing the $key-elements of the table $table where $attr=$cond.
	public function Fetch($key, $attr="", $cond="", $table="Products") {
		$db = $this->pdo;
		if($cond === "") {
			$res = $db->query('SELECT '.$key.' FROM '.$table);
		} else {
			$res = $db->query('SELECT '.$key.' FROM '.$table.' WHERE '.$attr.'='.$cond);
		}
		return $res;
	}
	
	// Use: $res = product->FetchGenre($genre)
	// Pre: $genre is a key from the table Genres.
	// Post: $res is a PDO object containing all the lines from the table Products joined
	// on id with the table Genres where genre matches $genre. 
	public function FetchGenre($genre) {
		$db = $this->pdo;
		$q = "SELECT * FROM Products INNER JOIN Genres ON Products.id=Genres.id WHERE genre='$genre'";
		$res = $db->query($q);
		return $res;
	}

	// Use: $res = product->FetchResults($searched)
	// Pre: $searched is a string
	// Post: $res is a PDO object containing all lines from the table Products
	//		where name matches or contains the string $searched.
	public function FetchResults($searched) {
		$db = $this->pdo;
		$q = "SELECT * FROM Products WHERE name LIKE '%$searched%'";
		$res = $db->query($q);
		return $res;
	}

	// Use: product->Delete($user, $id);
	// Pre: $user is a user from the table ShoppingCarts and $id is a prod_id
	//		from the same table.
	// Post: The item with id $id and user $user has been deleted from ShoppingCarts.
	public function Delete($user, $id) {
		$db = $this->pdo;
		$q = "DELETE FROM ShoppingCarts WHERE user='$user' AND prod_id=$id";
		echo "this is our query ".$q;
		$res = $db->exec($q);
	}

	// Use: product->Increment($user, $id)
	// Pre: $user is a user from the table ShoppingCarts and $id is a prod_id
	//		from the same table.
	// Post: the quantity in ShoppingCarts were $ prod_id = $id and user=$user has been increased by one.
	public function Increment($user, $id) {
		$db = $this->pdo;
		$q = "SELECT quantity FROM ShoppingCarts WHERE user='$user' AND prod_id=$id";
		$data = $db->query($q);
		$finalData = $data->fetchAll();
		$quantity = $finalData[0]["quantity"];
		echo intval($quantity);
		echo gettype(intval($quantity));
		$incQuantity = intval($quantity)+1;
		$q2 = "UPDATE ShoppingCarts SET quantity=$incQuantity WHERE user='$user' AND prod_id=$id";
		$success = $db->exec($q2);
		echo "this is our query $q2";
		echo "was there a success? ".$success;
	}
		
	// Use: product->Decrement($user, $id)
	// Pre: $user is a user from the table ShoppingCarts and $id is a prod_id
	//		from the same table.
	// Post: the quantity in ShoppingCarts were $ prod_id = $id and user=$user has been decreased by one.
	public function Decrement($user, $id) {
		$db = $this->pdo;
		$q = "SELECT quantity FROM ShoppingCarts WHERE user='$user' AND prod_id=$id";
		$data = $db->query($q);
		$finalData = $data->fetchAll();
		$quantity = $finalData[0]["quantity"];
		echo intval($quantity);
		echo gettype(intval($quantity));
		$decQuantity = intval($quantity)-1;
		$q2 = "UPDATE ShoppingCarts SET quantity=$decQuantity WHERE user='$user' AND prod_id=$id";
		$success = $db->exec($q2);
		echo "this is our query $q2";
		echo "was there a success? ".$success;
	}
	
	// Use: product->Add($user, $id)
	// Pre: $user is a username from the table ShoppingCarts and $id is a prod_id
	//		from the same table.
	// Post: a line has been added to ShoppingCarts with user=$user, id=$id and quantity=1
	public function Add($user, $id) {
		$db = $this->pdo;
		$q = "SELECT COUNT(*) FROM ShoppingCarts WHERE user='$user' AND prod_id=$id";
		$res = $db->query($q);
		$data = $res->fetchAll();
		$rows = $data[0][0];

		if($rows < 1) {
			$q2 = "INSERT INTO ShoppingCarts (user,prod_id,quantity) VALUES ('$user',$id,1)";
			$success = $db->exec($q2);
			echo "success";
		} else {
			echo "failure";
		}
	}
}