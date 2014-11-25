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
	
	echo '<div class="container">';
		echo '<div class="imgBox">';
			echo '<img class="mainImg" src="'.$mainImage.'">';
		echo '</div>';
		echo '<div class="textBox">';
			echo '<h1>'.$product["name"].'</h1>';
			echo '<p>'.$product["description"].'</p>';
		echo '</div>';
		echo '<input type="button" alt="Add to cart" class="addBtn" value="Add to cart" name='.$product["id"].' />';
	echo '</div>';
}

 
?>

<script type="text/javascript" src="JS/product.js"></script>

