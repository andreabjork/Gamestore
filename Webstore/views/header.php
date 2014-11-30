<?php
if(!isset($user)){
	session_start();
	$user = "guest";
	if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
}

// get the number of items in the users shopping cart.
$cur = new PDO("sqlite:SQL/gamestore.db");
$raw = $cur->query("SELECT COUNT(*) FROM ShoppingCarts WHERE user='$user'");
$raw_dat = $raw->fetch();
$quantity = $raw_dat[0];

?>
<!DOCTYPE html>
<html lang="is">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0;">
		<title>BoardGamer</title>
		<link rel="stylesheet" href="CSS/header.css">
		<link rel="stylesheet" href="CSS/main.css">
		<link rel="stylesheet" href="CSS/form.css">
		<link rel="stylesheet" href="CSS/cart.css">
		<link rel="stylesheet" href="CSS/footer.css">
		<link rel="stylesheet" href="CSS/product.css">
		<link rel="stylesheet" href="CSS/aboutsite.css">
		<link href='http://fonts.googleapis.com/css?family=Lato|Gentium+Book+Basic:400italic,400' rel='stylesheet' type='text/css'>
		<script src="libraries/jquery.js"></script>	
		<script src="libraries/jquery.md5.js"></script>	
	</head>
	<body id="body">
		<header>
			<div class="main">
				<div class="logo">
					<a href="index.php"><img id="logoImg" src="data/logo.png" alt="BoardGamer"/></a>
				</div>
				<div <?php echo ($user == 'guest') ?  'class="hidden currentUser"' : 'class=currentUser' ; ?>>
					<ul>
						<li><input type="button" class="logout" value="Logout" /></li>
						<li>User: <span class="userName"><?php echo $user; ?></span></li>
					</ul>
				</div>
				<div class="signBox">
					<form name="signin" onsubmit="return ">
						<ul>
							<li>
								<label>Username: <input class="inputField" id="nameField"/></label>
							</li>
							<li>
								<label>Password: <input class="inputField" id="passwordField" type="password" /></label>
							</li>
							<li><span>Don't have an account? <a href="register.php">Click here to register!</a></span></li>
						</ul>
						<input type="submit" id="signBtn" value="Sign in!"  onclick="return login()"/>
					</form>
				</div>
				<ul class="actions">
					<li id="signin" <?php echo ($user == 'guest') ? '' : 'class="hidden"' ; ?>>Sign in</li>
					<li id="cart" <?php echo ($user == 'guest') ?  'class="hidden"' : '' ; ?>><a href="cart.php"><p id="cartText">My cart</p></a><img src="data/cart.ico" alt="Cart icon" id="cartIcon" /> <span class="incart"><?php echo $quantity ?></span></li>
				</ul>
			</div>
			<div class="navigation">
				<ul class="buttons">
					<li id="products"><a href="index.php">Our products</a></li>
					<li id="about"><a href="about.php">About us</a></li>
				</ul>
				<form id="searchArea" action="index.php" method="GET">
					<input id="searchBtn" type="submit" value="" >
					<input id="search" name="searchField" placeholder="Search"/>
				</form>
			</div>
			<div class="dropDown">
				<ul class="dropButtons">
					<li id="trading"><a href="index.php?genre=trading">Trading Card Games</a></li>
					<li id="family"><a href="index.php?genre=family">Family Games</a></li>
					<li id="boardgames"><a href="index.php?genre=boardgame">Boardgames</a></li>
					<li id="cardgames"><a href="index.php?genre=cardgame">Cardgames</a></li>
					<li id="strategy"><a href="index.php?genre=strategy">Strategy games</a></li>
					<li id="conquer"><a href="index.php?genre=conquering">Conquering games</a></li>
					<li id="coop"><a href="index.php?genre=coop">Cooperative games</a></li>
				</ul>
			</div>
		</header>
		<script type="text/javascript" src="JS/nav.js"></script>