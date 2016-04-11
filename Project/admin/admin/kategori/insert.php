<div id="frm">
	<form method="post">
		<label>Kategori</label>
		<input type="text" name="kategori" placeholder="Tambahkan Kategori" required>
		<input type="submit" name="button" value="Simpan">
	</form>
</div>

<?php
	if(isset($_POST['kategori'], $_POST['button'])){
		$kategori = strip_tags($_POST['kategori']);
		$sql = "INSERT into tblkategori (kategori) VALUES ('$kategori')";
		query($sql);
		script("simpan sukses");
		location("index.php?menu=1&action=0");
	}
?>