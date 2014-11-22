
		<div class="products">
			<?php
				$data = $results->fetchAll();
				echo sizeof($data);
				echo $data[0]["description"];
				echo $data[1]["name"];
				echo $data[2]["name"];
				echo $data[3]["name"];
				echo $data[4]["name"];	
				foreach($data as $product) {
					echo '<div class="product">';
						echo '<div class="productName">';
							echo '<h2>'.$product["name"].'</h2>';
						echo '</div>';
						echo '<div class="productImage">';
							echo '<img src="'.$product["img_src"].'">';
						echo '</div>';
						echo '<div class="productText">';
							echo '<p>'.$product["description"].'</p>';
						echo '</div>';
						echo '<div class="productPage">';
							echo '<p>Click here to know more!</p>';
						echo '</div>';
					echo '</div>';
					
					
				}
			?>
		</div>
