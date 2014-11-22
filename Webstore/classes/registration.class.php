<?php

/**
 * Hlutur sem heldur utan um skráningu, kann að búa sig til útfrá gögnum í formi og validate'a
 */
class Registration
{
	public $username;
	public $password;
	public $re_password;
	public $email;
	public $name;
	public $addr1;
	public $addr2;
	public $country;
	public $city;
	public $zip;
	public $errors;
	/**
	 * Forskilyrði: $data er fylki með lykill => gögn úr formi
	 * Eftirskilyrði: Registration hlutur er útfylltur með gögnum úr $data
	 */
	public function Populate($data)
	{
		$this->username = $data["username"];
		$this->password = $data["password"];
		$this->re_password = $data["re_password"];
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
		$password_valid = TRUE;
		if(preg_match("/^[a-zA-Z0-9]{1,12}$/", $this->username) !== 1){
			$this->errors += array("username"=>"Invalid username. Your username must be between 1 and 12 characters long and may only contain alpha-numeric characters.");
			$validity = False;
		}
		if(preg_match("/^[a-zA-Z0-9]{1,12}$/", $this->password) !== 1){
			$this->errors += array("password"=>"Invalid password. Your password must be between 1 and 12 characters long and may only contain alpha-numeric characters.");
			$validity = False;
			$password_valid = False;
		}
		if($password_valid && $this->re_password !== $this->password){
			$this->errors += array("password"=>"Invalid password. Your password and re-typed password do not match.");
			$validity = False;
		}
		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
			$this->errors += array("email"=>"Invalid e-mail.");
			$validity = False;
		}
		if(preg_match("/^[\p{L}]+[ \p{L}]*$/", $this->name) !== 1){
			$this->errors += array("name"=>"Invalid name. Your name must be atleast 1 character long and may only contain alphabetical characters.");
			$validity = False;
		}
		if(preg_match("/^[\p{N}\p{L} ,.-]+$/", $this->addr1) !== 1){
			$this->errors += array("addr1"=>"Invalid address. Your address may only contain alphanumerical or ,.- characters");
			$validity = False;
		}
		if(preg_match("/^[\p{L}]+[ \p{L}]*$/", $this->city) !== 1){
			$this->errors += array("city"=>"Invalid city name. Your city name must be atleast 1 character long and may only contain alphabetical characters.");
			$validity = False;
		}
		if(preg_match("/^[\p{L}\p{N}-]*[\p{L}\p{N}][\p{L}\p{N}-]*$/", $this->zip) !== 1){
			$this->errors += array("zip"=>"Invalid zip/postal code. Your zip/postal code must contain atleast 1 character and may only contain alphanumericals and hyphens.");
			$validity = False;
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
		return array($this->username,$this->password,$this->email,$this->country,$this->name,$this->addr1,$this->addr2,$this->city,$this->zip);
	}
	
	public function write($cur){
		$statement = "INSERT INTO CUSTOMERS (username,password,email,country,name,addr_line1,addr_line2,city,zip) VALUES ('$this->username','$this->password','$this->email','$this->country','$this->name','$this->addr1','$this->addr2','$this->city','$this->zip')";
		$cur->exec($statement);
	}
}