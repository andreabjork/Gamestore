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

	/**
	 * Fyrir: Búið er að sækja færslur með Fetch
	 * Eftir: Skilar heildarfjölda færsla
	 */
	public function Total($data) {
		return sizeof($data);
	}

}