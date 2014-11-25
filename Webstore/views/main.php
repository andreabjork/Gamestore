



		<div class="products">
			<?php
				$data = $results->fetchAll();
				foreach($data as $product) {
					
					$id = $product["id"];
					$directory = "data/images/$id";
					$filenames = glob('./data/images/'.$id.'/*.*', GLOB_BRACE);
					$mainImage = $filenames[0];
					if($mainImage == "") {
						$mainImage = "data/notfound.jpg";
					}
	
					echo '<div class="product">';
						echo '<div class="productName">';
							echo '<h2>'.$product["name"].'</h2>';
						echo '</div>';
						echo '<div class="productImage">';
							echo '<img src="'.$mainImage.'">';
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