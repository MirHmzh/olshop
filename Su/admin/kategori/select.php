<div id="frm-cari">
	<form method="post">
		<input type="text" name="kategori" placeholder="Cari Kategori">
		<input type="submit" name="button" value="Cari">
	</form>
</div>

<div class="tambah">
	<a href="index.php?menu=21">Tambah</a>
</div>
<?php 
	if(isset($_POST['kategori'])){
		$kategori = $_POST['kategori'];
		$result = query("SELECT * FROM tblkategori WHERE kategori LIKE '%$kategori%'");
	}else{
		$result = query("SELECT * FROM tblkategori");
	}

	$jumlah 	= mysqli_num_rows($result);
	$tampil 	= 2;
	$halaman 	= ceil($jumlah / $tampil);

	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$hasil = ($page * $tampil) - $tampil;
	}else{
		$page = 0;
		$hasil = 0;
	}

	if(isset($_POST['kategori'])){
		$kategori = $_POST['kategori'];
		$result = query("SELECT * FROM tblkategori WHERE kategori LIKE '%$kategori%'"); 
	}else{
		$result = query("SELECT * FROM tblkategori LIMIT $hasil, $tampil");
	}
	
	
	?>
	<table border="1">
	<tr>
		<th width="200">Kategori</th>
	</tr>
	<?php
	while ($row = mysqli_fetch_array($result)) {
		echo '<tr>';
		echo '<td width="300px">'.$row[0].'</td>';
		echo '</tr>';
	}
 ?>
 	</table>

 	<div class="paging">
 <?php 
 	if($page > 1){
 		$b = $page -1;
 		echo '<a href="index.php?menu=1&page='.$b.'">Prev</a>';
 	}
 	for($a=1; $a<=$halaman; $a++){
		echo '<a href="index.php?menu=1&page='.$a.'">'.$a.'</a>&nbsp&nbsp';
	} 

	if($page < $halaman){
		$c = $page + 1;
		echo '<a href="index.php?menu=1&page='.$c.'">Next</a>';
	}
 ?>
 	</div>