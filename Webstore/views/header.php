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
		<script src="libraries/jquery.js"></script>	
	</head>
	<body>
		<header>
			<div class="main">
				<div class="logo">
					<img id="logoImg" src="data/logo.png"/>
				</div>
				<div class="signBox">
					<form>
						<ul>
							<li>
								<label>Username: <input id="nameField"/></label>
							</li>
							<li>
								<label>Password: <input id="passwordField" type="password"/></label>
							</li>
							<li><button type="button" id="signBtn">Sign in!</button></li>
							<li><span>Don't have an account? <a href="register.php">Click here to register!</a></span></li>
						</ul>
					</form>
				</div>
				<ul class="actions">
					<li id="signin">Sign in</li>
					<li id="cart"><a href="cart.php">My cart</a></li>
				</ul>
			</div>
			<div class="navigation">
				<ul class="buttons">
					<li id="products"><a href="index.php">Our products</a></li>
					<li id="about"><a href="about.php">About us</a></li>
				</ul>
				<form>
					<input id="search" name="searchField" placeholder="Search for a boardgame..." action="index.php" method="POST"/>
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