<div id="frm-cari">
	<form method="post">
		<input type="text" name="user" Placeholder="Cari User">
		<input type="submit" name="button" value="Cari">
	</form>
</div>
<?php 

	if(isset($_POST['user'])){
		$user = $_POST['user'];
		$result = query("SELECT * FROM tbluser WHERE nama = '%$user%'");
	}else{
		$result = query("SELECT * FROM tbluser");
	}

	$jumlah = mysqli_num_rows($result);
	$tampil = 2;
	$halaman = ceil($jumlah / $tampil);

	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$hasil = ($tampil * $page) - $tampil;
	}else{
		$page = 0;
		$hasil = 0;
	}

	if(isset($_POST['user'])){
		$user = $_POST['user'];
		$result = query("SELECT * FROM tbluser WHERE nama LIKE '%$user%'");
	}else{
		$result = query("SELECT * FROM tbluser LIMIT $hasil, $tampil");
	}
	
	?>
	<table border="1">
		<tr>
			<th>E-Mail</th>
			<th>Password</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Kode Pos</th>
			<th>No. Telp</th>
			<th>Status</th>
			<th>Level</th>
			<th colspan="2">Aksi</th>
		</tr>
	<?php
	while($row = mysqli_fetch_array($result)){
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[3].'</td>';
		echo '<td>'.$row[4].'</td>';
		echo '<td>'.$row[5].'</td>';
		echo '<td>'.$row[6].'</td>';
		echo '<td>'.$row[7].'</td>';
		echo '<td><a href="index.php?menu=10&email='.$row[0].'">Update</a></td>';
		echo '<td><a href="#">Hapus</a></td>';
		echo '</tr>';
	}
 ?>
 	</table>
 	<div class="paging">
<?php 
	if($page > 1){
		$b = $page - 1;
		echo '<a href="index.php?menu=4&page='.$b.'">Prev</a>'; 
	}

	for ($a=1; $a<=$halaman; $a++) { 
		echo '<a href="index.php?menu=4&page='.$a.'">'.$a.'</a>&nbsp&nbsp';
	}

	if($page < $halaman){
		$c = $page + 1;
		echo '<a href="index.php?menu=4&page='.$c.'">Next</a>'; 
	}
 ?>
 	</div>