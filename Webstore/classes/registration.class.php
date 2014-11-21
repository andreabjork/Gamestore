<?php

/**
 * Hlutur sem heldur utan um skráningu, kann að búa sig til útfrá gögnum í formi og validate'a
 */
class Registration
{
	private $username;
	private $password;
	private $email;
	private $name;
	private $addr1;
	private $addr2;
	private $country;
	private $city;
	private $zip;
	private $errors;
	/**
	 * Forskilyrði: $data er fylki með lykill => gögn úr formi
	 * Eftirskilyrði: Registration hlutur er útfylltur með gögnum úr $data
	 */
	public function Populate($data)
	{
		$this->username = $data["username"];
		$this->password = $data["password"];
		$this->email = $data["email"];
		$this->name = $data["name"];
		$this->addr1 = $data["addr1"];
		$this->addr2 = $data["addr2"];
		$this->country = $data["country"];
		$this->city = $data["city"];
		$this->zip = $data["zip"];
	}

	/**
	 * Forskilyrði: Registration hlutur er útfylltur með gögnum
	 * Eftirskilyrði: Aðferð skilar true ef registration hlutur uppfyllir kröfur, false ef ekki
	 */
	public function Valid()
	{
		$this->errors = array();
		$validity = TRUE;
		if(preg_match("^[a-zA-Z0-9]{1,12}$", $this->username) !== 1){
			$this->errors += array("username"=>"Your username must be between 1 and 12 characters long and may only contain alpha-numeric characters (a-z),(A-Z) and (0-9).");
		}
		if(preg_match("^[a-zA-Z0-9]{1,12}$", $this->password) !== 1){
			$this->errors += array("password"=>"Your password must be between 1 and 12 characters long and may only contain alpha-numeric characters (a-z),(A-Z) and (0-9).");
		}
		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
			$this->errors += array("email"=>"Your password must be between 1 and 12 characters long and may only contain alpha-numeric characters (a-z),(A-Z) and (0-9).");
		}
		if(preg_match("^[\p{L}]+[ \p{L}]*$", $this->name) !== 1){
			$this->errors += array("name"=>"Your name must be atleast 1 character long and may only contain alphabetical characters.");
		}
		
		return $validity;
	}

	/**
	 * Forskilyrði: Búið er að keyra Validate() aðferð
	 * Eftirskilyrði: Skilar fylki af villum sem komu upp ef einhverjar, annars tóma fylkinu
	 */
	public function Errors()
	{
		return $this->errors;
	}
	
	public function info(){
		return array($this->username,$this->password,$this->email,array($this->country,$this->name,$this->addr1,$this->addr2,$this->city,$this->zip));
	}
}