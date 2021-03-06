		<main id="registration" class="container">	
			<h1><?php echo $valid ? "Registration successful!" : "Register" ?></h1>
			<?php echo $valid ? "<p>You will be redirected to our front page automatically. If you have not been redirected after 5 seconds <a href='index.php'>click here</a>.</p>" : "" ?>
			
			<?php
			// list all the errors
			if (count($errors) > 0){
				echo "<div id=\"errors\"><h2>Errors during registration:</h2><ul>";
				foreach ($errors as $id => $error) {
					echo "<li>$error</li>";
				}
				echo "</ul></div>";
			}
			
			?>
			
			<form id="register" <?php echo $valid ? 'class="hidden"' : '' ?> action="register.php" method="post">
				<p>Account information:</p>
				<div class="field">
					<label for="username">Username: *</label>
					<input type="text" name="username" id="username" <?php echo array_key_exists("username", $errors) ? 'class="error"' : '' ?> placeholder="Batman" value="<?php echo $registration->username; ?>" />
				</div>
				<div class="field">
					<label for="password">Password: *</label>
					<input type="password" name="password" id="password" <?php echo array_key_exists("password", $errors) ? 'class="error"' : '' ?> placeholder="password"/>
				</div>
				<div class="field">
					<label for="re_password">Re-type password: *</label>
					<input type="password" name="re_password" id="re_password" <?php echo array_key_exists("password", $errors) ? 'class="error"' : '' ?> placeholder="re-type password"/>
				</div>
				<div class="field">
					<label for="email">E-mail: *</label>
					<input type="text" name="email" id="email" <?php echo array_key_exists("email", $errors) ? 'class="error"' : '' ?> placeholder="bruce@wayneenterprises.com" value="<?php echo $registration->email; ?>" />
				</div>
				<p>Billing address:</p>
				<div class="field">
					<label for="name">Name: *</label>
					<input type="text" name="name" id="name" <?php echo array_key_exists("name", $errors) ? 'class="error"' : '' ?> placeholder="Bruce Wayne" value="<?php echo $registration->name; ?>" />
				</div>
				<div class="field">
					<label for="addr1">Address1: *</label>
					<input type="text" name="addr1" id="addr1" <?php echo array_key_exists("addr1", $errors) ? 'class="error"' : '' ?> placeholder="1007 Mountain Drive" value="<?php echo $registration->addr1; ?>" />
				</div>
				<div class="field">
					<label for="addr2">Address2:</label>
					<input type="text" name="addr2" id="addr2" placeholder="The Batcave" value="<?php echo $registration->addr2; ?>" />
				</div>
				<div class="field">
					<label for="country">Country: *</label>
					<?php include("views/country_selection.php") //source: http://www.dzone.com/snippets/html-select-list-countries ?>
				</div>
				<div class="field">
					<label for="city">City: *</label>
					<input type="text" name="city" id="city" <?php echo array_key_exists("city", $errors) ? 'class="error"' : '' ?> placeholder="Gotham" value="<?php echo $registration->city; ?>" />
				</div>
				<div class="field">
					<label for="zip">Zip: *</label>
					<input type="text" name="zip" id="zip" <?php echo array_key_exists("zip", $errors) ? 'class="error"' : '' ?> placeholder="53540" value="<?php echo $registration->zip; ?>" />
				</div>
			
				<div class="buttons">
					<input type="submit" value="Register">
				</div>
			</form>
		</main>