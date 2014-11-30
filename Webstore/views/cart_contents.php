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
					//price of a single item:
					$price = number_format($info['price'], 2, '.', '');
					//total price of given quantity of the item:
					$totPrice = number_format($price*$qty, 2, '.', '');
					//total price of all items in cart:
					$subtotal = number_format($subtotal+$totPrice, 2, '.', '');
					echo "<div id=$id class='cartItem flex'>";
						echo "<div class='prodInfo'>";
							echo "<div class='cartImg'>";
								echo "<img src='$img' alt='$title'/>";
							echo "</div>";
							echo "<div class='cartText'>";
								echo "<h2>$title</h2>";
								echo "<p class='unitPrice'>$<span class='itemPrice'>$price</span></p>";
								echo "<p class='price'>Price: $<span class='totPrice'>$totPrice</span></p>";
							echo "</div>";
						echo "</div>";
						echo "<div class='incdec'>";
							echo"<input type='image' src='data/increment.ico' alt='increment' class='cartBtn increment' data-prod-id='$id' data-user='$user'>";
							echo"<span class='quantity'>$qty</span>";
							echo"<input type='image' src='data/decrement.ico' alt='decrement' class='cartBtn decrement' data-prod-id='$id' data-user='$user'>";
						echo "</div>";
						echo "<input type='image' src='data/remove.ico' alt='remove' class='cartBtn remove' data-prod-id='$id' data-user='$user'>";
					echo "</div>";
										
				}
				echo "<p id=subtotal>Subtotal: $<span id='subTot'>$subtotal</span></p>";
				echo "<div id='checkoutArea'><input type='button' class='checkout' value='Proceed to checkout!' /></div>";
			?>
		</div>
		
		<script type="text/javascript" src="JS/cart.js"></script>