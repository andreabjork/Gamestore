<!--to call cart.js, do all the nice php db things, and render our cart-->
		<div class='container'>	
			<h1>Your cart:</h1>
			<?php
				$subtotal = 0;
				foreach ($data as $row) {
					$id = $row['prod_id'];
					$qty = $row['quantity'];
					$result = $cartProd->Fetch('*','id',$id);
					$info = $result->fetchAll();
					$info = $info[0];
					$title = $info['name'];
					$img = $info['img_src'];
					if($img == "") {
						$img = "data/notfound.jpg";
					}
					$price = $info['price'];
					$totPrice = $price*$qty;
					$subtotal += $totalPrice;
					echo "<div id=$id class='cartItem'>";
						echo "<div class='prodInfo'>";
							echo "<h2>$title</h2>";
							echo "<p>$$price</p>"
							echo "<img src='$img' />";
						echo "</div>";
						echo "<span class='price'>Price: $$totPrice</span>";
						echo "<div class='incdec'>";
							echo"<input type='button' class='cartBtn increment' prod_id=$id user='$user'>";
							echo"<span class='quantity'>$qty</span>";
							echo"<input type='button' class='cartBtn decrement' prod_id=$id user='$user'>";
						echo "</div>";
						echo "<input type='button' class='cartBtn remove' prod_id=$id user='$user'>";
					echo "</div>";
				}
				echo "<p id=subtotal>Subtotal: $$subtotal</p>"
			?>
		</div>
		
		<script type="text/javascript" src="JS/cart.js"></script>