<?php

class Item {
	public $id;
	public $qty;
	private $user;
	private $pdo;
	
	public function __construct($pdo, $row) {
		$this->user = $row['user'];
		$this->id = $row['prod_id'];
		$this->qty = $row['quantity'];
		$this->pdo = $pdo;
	}
	
	public function increment(){
		$this->qty++;
		$this->updateQty();
	}
	public function decrement(){
		if(--$this->qty === 0){
			$this->remove();
		}
		$this->updateQty();
	}
	private function updateQty(){
		$cur = $this->pdo;
		$cur->exec("UPDATE ShoppingCarts SET quantity='$this->qty' WHERE user='$this->user' and prod_id='$this->id'");
	}
	public function remove(){
		$cur = $this->pdo;
		$cur->exec("DELETE FROM ShoppingCarts WHERE user='$this->user' and prod_id='$this->id'");
	}
}

class Cart
{
	private $pdo;
	private $user;
	private $items = array();


	public function __construct($pdo, $user) {
		$this->user = $user;
		$this->pdo = $pdo;
	}
	
	public function populate(){
		$cur = $this->pdo;
		$rows = $cur->query("SELECT * FROM ShoppingCarts WHERE name='$this->user'");
		foreach ($rows as $row) {
			$this->items += array(new Item($cur, $row));
		}
	}
	
	public function refresh(){
		$items = array();
		$this->populate();
	}
}