<?php
if(!isset($user)){
	session_start();
	$user = "guest";
	if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
}
$cur = new PDO("sqlite:SQL/gamestore.db");
$raw = $cur->query("SELECT COUNT(*) FROM ShoppingCarts WHERE user='$user'");
$raw_dat = $raw->fetch();
$quantity = $raw_dat[0];

?>
<!doctype html>
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
					<a href="index.php"><img id="logoImg" src="data/logo.png"/></a>
				</div>
				<div <?php echo ($user == 'guest') ?  'class="hidden currentUser"' : 'class=currentUser' ; ?>>
					<ul>
						<li><input type="button" alt="logout" class="logout" value="Logout" /></li>
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
					<a href="cart.php"><li id="cart" <?php echo ($user == 'guest') ?  'class="hidden"' : '' ; ?>><p id="cartText">My cart</p><img src="data/cart.ico" alt="Cart icon" id="cartIcon" /> <span class="incart"><?php echo $quantity ?></span></li></a>
				</ul>
			</div>
			<div class="navigation">
				<ul class="buttons">
					<a href="index.php"><li id="products">Our products</li></a>
					<a href="about.php"><li id="about">About us</li></a>
				</ul>
				<form id="searchArea" action="index.php" method="GET">
					<label for="searchField"><input id="searchBtn" type="submit" value="" ></label>
					<input id="search" name="searchField" placeholder="Search"/>
				</form>
			</div>
			<div class="dropDown">
				<ul class="dropButtons">
					<a href="index.php?genre=trading"><li id="trading">Trading Card Games</li></a>
					<a href="index.php?genre=family"><li id="family">Family Games</li></a>
					<a href="index.php?genre=boardgame"><li id="boardgames">Boardgames</li></a>
					<a href="index.php?genre=cardgame"><li id="cardgames">Cardgames</li></a>
					<a href="index.php?genre=strategy"><li id="strategy">Strategy games</li></a>
					<a href="index.php?genre=conquering"><li id="conquer">Conquering games</li></a>
					<a href="index.php?genre=coop"><li id="coop">Cooperative games</li></a>
				</ul>
			</div>
		</header>
		<script type="text/javascript" src="JS/nav.js"></script>