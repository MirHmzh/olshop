<div id="frm-cari">
	<form method="post">
		<select name="kategori">
			<option selected disabled>Pilih Kategori</option>
			<?php 
				$kategori = query("SELECT * FROM tblkategori");
				while($row = mysqli_fetch_array($kategori)){
					echo '<option>'.$row[0].'</option>';
				}
			 ?>
			}
		</select>
		<input type="text" name="merk" placeholder="Cari Merk">
		<input type="submit" name="button" value="Cari">
	</form>
</div>
<?php

	if(isset($_POST['merk'], $_POST['kategori'])){
		$merk = $_POST['merk'];
		$kategori = $_POST['kategori'];
		$result = query("SELECT * FROM tblmerk WHERE merk LIKE '%$merk%' AND kategori = '$kategori'");
	}else{
		$result = query("SELECT * FROM tblmerk");
	}
	$jumlah = mysqli_num_rows($result);
	$tampil = 4;
	$halaman = ceil($jumlah / $tampil);

	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$hasil = ($page * $tampil) - $tampil;
	}else{
		$page = 0;
		$hasil = 0;
	}

	if(isset($_POST['merk'], $_POST['kategori'])){
		$merk = $_POST['merk'];
		$kategori = $_POST['kategori'];
		$result = query("SELECT * FROM tblmerk WHERE kategori = '$kategori' AND merk LIKE '%$merk%'");
	}else{
		$result = query("SELECT * FROM tblmerk LIMIT $hasil, $tampil");
	}


	?>
	<table border="1">
		<tr>
			<th>Id Merk</th>
			<th width="200">Kategori</th>
			<th width="150">Merk</th>
		</tr>
	<?php
	while ($row = mysqli_fetch_array($result)) {
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		echo '</tr>';
	}
?>
	</table>
	<div class="paging">
<?php 
	if($page > 1 ){
		$b = $page - 1;
		echo '<a href="index.php?menu=2&page='.$b.'">Prev</a>';
	}

	for($a=1; $a<=$halaman; $a++){
		echo '<a href="index.php?menu=2&page='.$a.'">'.$a.'</a>&nbsp&nbsp';
	}

	if($page < $halaman ){
		$c = $page + 1;
		echo '<a href="index.php?menu=2&page='.$c.'">Next</a>';
	}
?>
	</div>