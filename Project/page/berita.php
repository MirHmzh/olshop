<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$result = query("SELECT * FROM tblberita WHERE idberita = $id");
 		$row = mysqli_fetch_array($result);
 		echo '<div id="berita">';
 		echo '<img src="image/'.$row[5].'"/>';
 		echo '<h3>'.$row[2].'</h3>';
 		echo '<p>'.$row[4].'</p>';
 		echo '<br>';
 		echo '<p>'.$row[3].'</p>';
 		echo '</div>';
 	}
?>