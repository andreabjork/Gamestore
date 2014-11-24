<?php

class Product {
	public $id;
	public $name;
	public $price;
	public $description;
	public $bgg_url;
	public $img_src;
	public $stock;
	public $genre;
}

class Products extends Product
{
	private $pdo;
	private $results = array();

	/**
	 * Búa til Todos hlut sem tekur við $pdo breytu -- inniheldur uppsetta tengingu við gagnagrunn
	 */
	public function __construct($pdo) {
		$this->pdo = $pdo;
		//$pdo->exec('CREATE TABLE IF NOT EXISTS gamestore(id integer primary key, title text, finished bool, key text)');
	}

	/**
	 * Fyrir: $key er lykill sem sækja á færslur fyrir
	 * Eftir: Skilar fylki af Todo hlutum eða tóma fylkinu
	 */
	public function Fetch($key, $attr="", $cond="", $table="Products") {
		$db = $this->pdo;
		if($cond === "") {
			$res = $db->query('SELECT '.$key.' FROM '.$table);
		} else {
			//echo " | Executing query: '".'SELECT '.$key.' FROM '.$table.' WHERE '.$attr.'='.$cond."' | ";
			$res = $db->query('SELECT '.$key.' FROM '.$table.' WHERE '.$attr.'='.$cond);
		}
		return $res;
	}
	
	
	public function FetchGenre($genre) {
		$db = $this->pdo;
		$q = "SELECT * FROM Products INNER JOIN Genres ON Products.id=Genres.id WHERE genre='$genre'";
		$res = $db->query($q);
		return $res;
	}

	public function FetchResults($searched) {
		$db = $this->pdo;
		$q = "SELECT * FROM Products WHERE name LIKE '%$searched%'";
		$res = $db->query($q);
		return $res;
	}

	public function Delete($user, $id) {
		$db = $this->pdo;
		$q = "DELETE FROM ShoppingCarts WHERE user='$user' AND prod_id=$id";
		echo "this is our query ".$q;
		$res = $db->exec($q);
	}

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

	/**
	 * Fyrir: Búið er að sækja færslur með Fetch
	 * Eftir: Skilar heildarfjölda færsla
	 */
	public function Total($data) {
		return sizeof($data);
	}

}