		<main class="container flex">
			<?php
				$data = $results->fetchAll();
				if($data == FALSE) {
					echo "<h2>No search results were found.</h2>";
				}
				foreach($data as $product) {
					
					$id = $product["id"];
					$productName = $product["name"];
					$directory = "data/images/$id";
					// getting images
					$filenames = glob('./data/images/'.$id.'/*.*', GLOB_BRACE);
					$mainImage = $filenames[0];
					if($mainImage == "") {
						$mainImage = "data/notfound.jpg";
					}
					
					$price = floatval($product["price"]);
					$formattedPrice = number_format($price, 2, '.', '');
	
					echo '<div class="product">';
						echo '<div class="productName">';
							echo '<h2>'.$productName.'</h2>';
						echo '</div>';
						echo '<div class="productImage">';
							echo '<img src="'.$mainImage.'" alt="'.$productName.'">';
						echo '</div>';
						echo '<div class="productText">';
							$description = $product["description"];
							if(strlen($description)< 135) {
								$descr = $description;
							} else {
								$descr = substr($description, 0, 130)."...";
							}
							echo '<p>'.$descr.'</p>';
						echo '</div>';
						echo '<div class="productPrice">';
							echo "<p>$".$formattedPrice."</p>";
						echo '</div>';
						echo '<div class="productPage">';
							echo '<a href="product.php?id='.$product["id"].'"><p>Click here to know more!</p></a>';
						echo '</div>';
					echo '</div>';
				}
			?>
		</main>