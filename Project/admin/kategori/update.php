<div id="frm">	
	<form method="post">
		<label>Kategori</label>
		<input type="text" name="kategori" value="<?= $_GET['value'] ?>" required>
		<input type="submit" name="button" value="Simpan">
	</form>
</div>
<?php
	if(isset($_GET['value'], $_POST['kategori'])){
		$value = $_GET['value'];
		$kategori = $_POST['kategori'];
		$sql = "UPDATE tblkategori SET kategori = '$kategori' WHERE kategori = '$value'";
		query($sql);
		script("Update Sukses");
		location("index.php?menu=1&action=0");
	}
?>