<?php 

$data = $results->fetchAll();

foreach($data as $product) {
	echo '<div class="container">';
		echo '<div class="imgBox">';
		$imgsrc = $product["img_src"];
		if($imgsrc == "") {
			$imgsrc = "data/notfound.jpg";
		}
			echo '<img src="'.$imgsrc.'">';
		echo '</div>';
		echo '<div class="textBox">';
			echo '<h1>'.$product["name"].'</h1>';
			echo '<p>'.$product["description"].'</p>';
		echo '</div>';
	echo '</div>';
}

 
?>


