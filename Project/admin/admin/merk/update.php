1<?php
	if(isset($_GET['value'])){
		$value = $_GET['value'];
		?>
			<div id="frm">
				<form method="post">
					<label>Kategori</label>
					<select name="kategori">
						<?php
							$sqlkategori = "SELECT * FROM tblkategori";
							$resultkategori = query($sqlkategori);
							while($row = mysqli_fetch_array($resultkategori)){
								$sql = "SELECT * FROM tblmerk WHERE idmerk = $value";
								$result = query($sql);
								$kategori = mysqli_fetch_array($result);

								if($row[0] == $kategori[1]){
									echo '<option selected>'.$row[0].'</option>';
								}else{
									echo '<option>'.$row[0].'</option>';
								}
							}
						?>
					</select>
					<label>Merk</label>
					<input type="text" name="merk" value="<?php echo $kategori[2]?>">
					<input type="submit" name="button" value="Simpan">
				</form>
			</div>
		<?php
		 if(isset($_POST['kategori'], $_POST['merk'])){
		 	$kategori = $_POST['kategori'];
		 	$merk = $_POST['merk'];
		 	$sql = "UPDATE tblmerk SET kategori = '$kategori', merk = '$merk' WHERE idmerk = $value ";
		 	query($sql);
		 	script("Update Complete");
		 	location("index.php?menu=2&action=0&page=1");
		 }
	}
?>
