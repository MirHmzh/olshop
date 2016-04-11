<div id="frm">
	<form method="post">
	<label>Kategori</label>
		<select name="kategori">
			<?php
				$sqlkategori = "SELECT * FROM tblkategori";
				$resultkategori = query($sqlkategori);
				while ($row = mysqli_fetch_array($resultkategori)) {
					echo '<option>'.$row[0].'</option>';
				}
			?>
		</select>
	<label>Merk</label>
	<input type="text" name="merk" placeholder="Tambah merk baru" required>
	<input type="submit" name="button" value="Simpan">
	</form>
</div>
<?php
	if (isset($_POST['kategori'], $_POST['merk'])) {
		$kategori = $_POST['kategori'];
		$merk = strip_tags($_POST['merk']);
		$sql = "INSERT into tblmerk (kategori, merk) VALUES('$kategori','$merk') ";
		query($sql);
		script("Tambah sukses");
		location("index.php?menu=2&action=0&page=1");
	}
?>