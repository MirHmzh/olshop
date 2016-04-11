<?php
	if(isset($_GET['value'])){
		$value = $_GET['value'];
		$sqlmerk = "SELECT * FROM tblmerk WHERE kategori = $value";
		$resultmerk = query($sqlmerk);
		if (mysqli_num_rows($resultmerk) > 0) {
			script("Data sudah digunakan tidak bisa dihapus");
			location("index.php?menu=1&action=0");
		}else{
			$sql = "DELETE FROM tblkategori WHERE kategori = '$value'";
			query($sql);
			script("Hapus Sukses");
			location("index.php?menu=1&action=0");
		}
	}
?>