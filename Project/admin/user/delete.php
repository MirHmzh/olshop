<?php 
	if (isset($_GET['value'])) {
		$value = $_GET['value'];
		query("DELETE FROM tbluser WHERE email = '$value' ");
		script("Berhasil Dihapus!");
		header('location:index.php?menu=8&action=0');
		
	}	
 ?>