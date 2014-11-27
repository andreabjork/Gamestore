		<div class='container flex'>	
			<h2 class='yourCart'>Your cart</h2>
			<?php
				$subtotal = 0;
				foreach ($data as $row) {
					$id = $row['prod_id'];
					$qty = $row['quantity'];
					$result = $cartProd->Fetch('*','id',$id);
					$info = $result->fetchAll();
					$info = $info[0];
					$title = $info['name'];		
					
					$directory = "data/images/$id";
					$filenames = glob('./data/images/'.$id.'/*.*', GLOB_BRACE);
					$img = $filenames[0];
					if($img == "") {
						$img = "data/notfound.jpg";
					}
					
					$price = number_format($info['price'], 2, '.', '');
					$totPrice = number_format($price*$qty, 2, '.', '');
					$subtotal = number_format($subtotal+$totPrice, 2, '.', '');
					echo "<div id=$id class='cartItem'>";
						echo "<div class='prodInfo'>";
							echo "<h2>$title</h2>";
							echo "<p>$<span class='itemPrice'>$price</span></p>";
							echo "<img src='$img' />";
						echo "</div>";
						echo "<p class='price'>Price: $<span class='totPrice'>$totPrice</span></p>";
						echo "<div class='incdec'>";
							echo"<input type='image' src='data/increment.ico' alt='increment' class='cartBtn increment' prod_id=$id user='$user'>";
							echo"<span class='quantity'>$qty</span>";
							echo"<input type='image' src='data/decrement.ico' alt='decrement' class='cartBtn decrement' prod_id=$id user='$user'>";
						echo "</div>";
						echo "<input type='image' src='data/remove.ico' alt='remove' class='cartBtn remove' prod_id=$id user='$user'>";
					echo "</div>";
				}
				echo "<p id=subtotal>Subtotal: $<span id='subTot'>$subtotal</span></p>"
			?>
		</div>
		
		<script type="text/javascript" src="JS/cart.js"></script>