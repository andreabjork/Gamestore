<?php 

$data = $results->fetchAll();

foreach($data as $product) {
	
	$id = $product["id"];
	$directory = "data/images/$id";
	//getting images
	$filenames = glob('./data/images/'.$id.'/*.*', GLOB_BRACE);
		
	$mainImage = $filenames[0];
	$image2 = $filenames[1];
	$image3 = $filenames[2];
	
	if(!isset($mainImage)) {$mainImage="data/notfound.jpg";}
	
	$stock = $product['stock'];
	if($stock == 0) {
		$stockMsg = '<span class="stock out">Out of stock!</span>';
	} else {
		$stockMsg = '<span class="stock"> In stock: '.$stock.'</span>';
	}
	$price = number_format($product['price'], 2, '.', '');
	
	$addBtnClass = ($user === 'guest') ? 'addBtn hidden' : 'addBtn' ;
	
	echo '<main class="container flex">';
		echo '<section class="imgViewer">';
			echo '<div class="imgBox">';
				echo '<span class="helper"></span>';
				echo '<img class="mainImg" src="'.$mainImage.'" alt="Image of product">';
			echo '</div>';
			if(isset($image2)) {
				echo '<div class="subImgBoxes">';
					echo '<ul>';
						echo '<li class="subBox1"><img class="subimg img1" src="'.$mainImage.'" alt="Image of product"></li>';
						echo '<li class="subBox2"><img class="subimg img2" src="'.$image2.'" alt="Image of product"></li>';
						if(isset($image3)) {
							echo '<li class="subBox3"><img class="subimg img3" src="'.$image3.'" alt="Image of product"></li>';
						}
				echo '</ul>';
			echo '</div>';
			}
		echo '</section>';
		echo '<section class="textBox">';
			echo '<h1>'.$product["name"].'</h1>';
			echo '<p>'.$product["description"].'</p>';
			echo $stockMsg;
		echo '</section>';
		echo '<section class="prodActionArea">';
			echo '<div class="prodActions">';
				echo '<span class="prodPrice">$ '.$price.'</span>';
				echo '<a href='.$product["bgg_url"].'><div class="BBG">View item on BoardGameGeek.com!</div></a>';
				echo '<input type="button" class="'.$addBtnClass.'" value="Add to cart" name='.$product["id"].' />';
			echo '</div>';
		echo '</section>';
	echo '</main>';
	echo '<div class="overlay">';
		echo '<div class="imgFrame">';
			echo '<span class="helper"></span>';
			echo '<input type="image" class="prev" src="data/left.ico" alt="previous image">';
			echo '<img class="bigImg" src='.$mainImage.'  alt="Image of product" />';
			echo '<input type="image" class="next" src="data/right.ico" alt="next image	">';
			echo '<input type="image" class="close" src="data/remove.ico" alt="exit image viewer">';
		echo '</div>';
	echo '</div>';
}
 
?>

<script type="text/javascript" src="JS/product.js"></script>

