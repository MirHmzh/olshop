<?php 
	if (isset($_GET['value'])) {
		$value = $_GET['value'];
		$sql_barang = "SELECT * FROM tblbarang WHERE idmerk = $value";
		$result = query($sql_barang);
		if (mysqli_num_rows($result)) {
			script("Merk yang terpakai tidak bisa dihapus");
			location("index.php?menu=2&action=0&page=1");
		}else{
			$sql = "DELETE FROM tblmerk WHERE idmerk = $value";
			query($sql);
			script("BErhasil dihapus");
			location("index.php?menu=2&action=0&page=1");
		}
	}
 ?>