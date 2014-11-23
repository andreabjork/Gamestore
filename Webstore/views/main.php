



		<div class="products">
			<?php
				echo "ok at least this prints";
				echo gettype($results);
				echo "did that work?";
				$data = $results->fetchAll();
				echo gettype($data);
				echo sizeof($data);
				echo "this should print";
				echo $data[0]["name"];
				foreach($data as $product) {
					echo '<div class="product">';
						echo '<div class="productName">';
							echo '<h2>'.$product["name"].'</h2>';
						echo '</div>';
						echo '<div class="productImage">';
						$imgsrc = $product["img_src"];
						if($imgsrc == "") {
							$imgsrc = "data/notfound.jpg";
						}
							echo '<img src="'.$imgsrc.'">';
						echo '</div>';
						echo '<div class="productText">';
							echo '<p>'.$product["description"].'</p>';
						echo '</div>';
						echo '<div class="productPrice">';
							echo "<p>$".$product["price"]."</p>";
						echo '</div>';
						echo '<div class="productPage">';
							echo '<a href=product.php?id='.$product["id"].'><p>Click here to know more!</p></a>';
						echo '</div>';
					echo '</div>';
				}
			?>
		</div>