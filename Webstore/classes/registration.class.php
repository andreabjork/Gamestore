<?php
// Object for registering as a new member on the site. 
// Creates itself with information from a form and validates the information.
class Registration {
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
	
	
	// Use: registration = new Populate($data)
	// Pre: $data is the form submission array from form.php
	// Post: registration is a Registration object holding all the information from $data.
	public function Populate($data) {
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

	// Use: valid = registration->valid($cur)
	// Pre: registration has been populated.
	// Post: valid = true if there were no errors in the registration, false otherwise.
	public function Valid($cur) {
		$this->errors = array();
		$validity = TRUE;
		$password_valid = TRUE;
		$user_available = TRUE;
		if(preg_match("/^[a-zA-Z0-9]{1,12}$/", $this->username) !== 1){
			$this->errors += array("username"=>"Invalid username. Your username must be between 1 and 12 characters long and may only contain alpha-numeric characters.");
			$validity = False;
		}else{
			$user_available = $this->available($this->username,$cur);
		}
		if(!$user_available){
			$this->errors += array("username"=>"That username is already taken.");
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

	// Use: err = registration->Errors()
	// Pre: registration has been populated and validated. $errors is therefore initalized.
	// Post: err is the $errors array
	public function Errors() {
		return $this->errors;
	}
	
	// Use: info = registration->Info()
	// Pre: registration is populated
	// Post: info is an an array with all the class variables of registration relating to the registration form.
	public function info() {
		return array($this->username,$this->password,$this->email,$this->country,$this->name,$this->addr1,$this->addr2,$this->city,$this->zip);
	}
	
	// Use: aff = registration->write($cur)
	// Pre: $cur is a PDO object for a nonempty database, the registration object has been validated
	// Post: the valid registration information has been added to the table Customers.
	public function write($cur) {
		$password = md5($this->password);
		$statement = "INSERT INTO CUSTOMERS (username,password,email,country,name,addr_line1,addr_line2,city,zip) VALUES ('$this->username','$password','$this->email','$this->country','$this->name','$this->addr1','$this->addr2','$this->city','$this->zip')";
		$affected = $cur->exec($statement);
		return $affected;
	}
	
	// Use: isAvailable = available($user, $cur)
	// Pre: $user is a user from Customers, $cur is a PDO objcet
	// Post: isAvailable=true if the username $user is "available"(not already in the table Customers from the database of $cur), isAvailable=false otherwise.
	public function available($user,$cur) {
		$exists = $cur->query("SELECT COUNT(*) FROM Customers WHERE username='$user'");
		if($exists){
			$data = $exists->fetchAll();
			$row = $data[0];
			if($row[0]>0){
				return False;
			}
			else{
				return True;
			}
		}
		else{
			echo "Something went wrong, if you see this message please contact the webpage's administrator. Thank you.";
			return False;
		}
	}
}