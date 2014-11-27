<?php 

$data = $results->fetchAll();

foreach($data as $product) {
	
	$id = $product["id"];
		$directory = "data/images/$id";
		$filenames = glob('./data/images/'.$id.'/*.*', GLOB_BRACE);
			
		$mainImage = $filenames[0];
		$image2 = $filenames[1];
		$image3 = $filenames[2];
		
		if(!isset($mainImage)) {$mainImage="data/notfound.jpg";}
		if(!isset($image2)) {$image2="data/notfound.jpg";}
		if(!isset($image3)) {$image3="data/notfound.jpg";}
	
	echo '<div class="containerB">';
		echo '<div class="imgViewer">';
			echo '<div class="imgBox">';
				echo '<span class="helper"></span>';
				echo '<img class="mainImg" src="'.$mainImage.'">';
			echo '</div>';
			echo '<div class="subImgBoxes">';
				echo '<ul>';
					echo '<li class="subBox1"><img class="subimg img1" src="'.$mainImage.'"></li>';
					echo '<li class="subBox2"><img class="subimg img2" src="'.$image2.'"></li>';
					echo '<li class="subBox3"><img class="subimg img3" src="'.$image3.'"></li>';
				echo '</ul>';
			echo '</div>';
		echo '</div>';
		echo '<div class="textBox">';
			echo '<h1>'.$product["name"].'</h1>';
			echo '<p>'.$product["description"].'</p>';
		echo '</div>';
		$price = number_format($product['price'], 2, '.', '');
		echo '<span class="prodPrice">$ '.$price.'</span>';
		echo '<a href='.$product["bgg_url"].'><div class="BBG">View item on BoardGameGeek.com!</div></a>';
		echo '<input type="button" alt="Add to cart" class="addBtn" value="Add to cart" name='.$product["id"].' />';
		echo '<input type="button" alt="Add to cart" class="addBtn'.(($user==='guest')?' hidden':'').'" value="Add to cart" name='.$product["id"].' />';
	echo '</div>';
	echo '<div class="overlay">';
		echo '<div class="imgFrame">';
			echo '<span class="helper"></span>';
			echo '<input type="image" class="prev" src="data/left.ico">';
			echo '<img class="bigImg" src='.$mainImage.' \>';
			echo '<input type="image" class="next" src="data/right.ico">';
			echo '<input type="image" class="close" src="data/remove.ico">';
		echo '</div>';
	echo '</div>';
}
 
?>

<script type="text/javascript" src="JS/product.js"></script>

