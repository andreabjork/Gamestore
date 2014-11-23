<!doctype html>
<html lang="is">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0;">
		<title>BoardGamer</title>
		<link rel="stylesheet" href="CSS/header.css">
		<link rel="stylesheet" href="CSS/main.css">
		<link rel="stylesheet" href="CSS/form.css">
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
				<ul class="actions">
					<li id="signin"><a href="register.php">Sign in</a></li>
					<li id="cart"><a href="cart.php">My cart</a></li>
				</ul>
			</div>
			<div class="navigation">
				<ul class="buttons">
					<li id="products"><a href="index.php">Our products</a></li>
					<li id="about"><a href="about.php">About us</a></li>
				</ul>
				<input id="search"/>
			</div>
			<div class="dropDown">
				<ul class="dropButtons">
					<li id="trading">Trading Card Games</li>
					<li id="family">Family Games</li>
					<li id="boardgames">Boardgames</li>
				</ul>
			</div>
		</header>
		<script type="text/javascript" src="JS/nav.js"></script>