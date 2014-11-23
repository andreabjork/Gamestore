<!--to call cart.js, do all the nice php db things, and render our cart-->
		<?php
			$results = $cur->query("SELECT * FROM ShoppingCarts WHERE user=$user");
			$data = $results->fetchAll();
			
		?>
		<script type="text/javascript" src="JS/cart.js"></script>