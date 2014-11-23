<!--to call cart.js, do all the nice php db things, and render our cart-->
		<h1>Your cart:</h1>
		<?php
			foreach ($data as $row) {
				$id = $row['prod_id'];
				echo $id;
				echo gettype($id);
				/*
				$qty = $row['quantity'];
				*/
				echo "looking up product<br>";
				$result = $cartProd->Fetch('*','id',$id);
				$info = $result->fetchAll();
				echo "product found<br>";
				echo "$info<br>";
				foreach ($info as $key => $value) {
					echo "Key: $key , Value: $value<br>";
				}
				/* 
				$title = $info['name'];
				$img = $info['img_src'];
				$price = $info['price'];
				$totPrice = $price*$qty;
				*/
				/*echo "<div id=$id>";
					echo "<div class='prodInfo'>";
						echo "<h1>$title</h1>";
						echo "<img src='$img' />";
					echo "</div>";
					echo "<span class='price'>$totPrice</span>";
					echo "<div class='incdec'>";
						echo"<input type='button' class='cartBtn increment' prod_id=$id user='$user'>";
						echo"<span class='quantity'>$qty</span>";
						echo"<input type='button' class='cartBtn decrement' prod_id=$id user='$user'>";
					echo "</div>";
					echo "<input type='button' class='cartBtn remove' prod_id=$id user='$user'>";
				echo "</div>";*/
			}
		?>
		<!--<script type="text/javascript" src="JS/cart.js"></script>-->