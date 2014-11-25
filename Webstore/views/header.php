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
		<script src="libraries/jquery.md5.js"></script>	
	</head>
	<body id="body">
		<header>
			<div class="main">
				<div class="logo">
					<img id="logoImg" src="data/logo.png"/>
				</div>
				<div <?php echo ($user == 'guest') ?  'class="hidden currentUser"' : 'class=currentUser' ; ?>>
					<ul>
						<li><input type="button" alt="logout" class="logout" value="Logout" /></li>
						<li>User: <span class="userName"><?php echo $user; ?></span></li>
					</ul>
				</div>
				<div class="signBox">
					<form>
						<ul>
							<li>
								<label>Username: <input class="inputField" id="nameField"/></label>
							</li>
							<li>
								<label>Password: <input class="inputField" id="passwordField" type="password" /></label>
							</li>
							<li><span>Don't have an account? <a href="register.php">Click here to register!</a></span></li>
						</ul>
						<input type="button" id="signBtn" value="Sign in!" />
					</form>
				</div>
				<ul class="actions">
					<li id="signin" <?php //echo ($user == 'guest') ? '' : 'class="hidden"' ; ?>>Sign in</li>
					<li id="cart" <?php echo ($user == 'guest') ?  'class="hidden"' : '' ; ?>><a href="cart.php">My cart</a></li>
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