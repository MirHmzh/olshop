<div id="frm">
	<form method="POST" enctype="multipart/form-data">
		<label>Barang</label>
		<input type="text" name="barang" required>
		<label>Harga</label>
		<input type="text" name="harga" required>
		<label>Deskripsi</label>
		<input type="deskripsi" name="deskripsi" required>
		<label>Gambar</label>
		<input type="file" name="photos" required>
		<label>Merk</label>
		<select name="merk">
			<?php 
				$sql = "SELECT * FROM tblmerk ORDER BY merk";
				$result = query($sql);
				while ($row = mysqli_fetch_array($result)) {
					echo "<option>".$row[2]."</option>";
				}
			 ?>
		</select>
		<label>Stok</label>
		<input type="number" name="stok" required>
		<input type="submit" name="button" value="Simpan">
	</form>
</div>

<?php 
if (isset($_POST['button'])) {
	$merk = $_POST['merk'];
	$sql_merk = "SELECT * FROM tblmerk WHERE merk = '$merk'";
	$result_merk = query($sql_merk);
	$merk1 = mysqli_fetch_array($result_merk);
	$idmerk = $merk[0];
	$name_gambar = $_FILES['photos']['name'];
	$size_gambar = $_FILES['photos']['size'];
	$temp_gambar = $_FILES['photos']['tmp_name'];
	$type_gambar = $_FILES['photos']['type'];
	$barang = strip_tags($_POST['barang']);
	$harga = strip_tags($_POST['harga']);
	$deskripsi = strip_tags($_POST['deskripsi']);
	$stok = strip_tags($_POST['stok']);
	if ($type_gambar == 'image/jpeg') {
		move_uploaded_file($temp_gambar, '../image/gambar/'.$name_gambar);
		$insert = "INSERT INTO tblbarang (namabarang, hargabarang, deskripsi, gambar, stock) VALUES ('$barang','$harga','$deskripsi','$name_gambar','$stok')";
		query($insert);
		script("Barang sudah ditambahkan");
		location("index.php?menu=3&action=0");
	}

}else{
	script("Hanya bisa mengupload gambar");
}
 ?>
