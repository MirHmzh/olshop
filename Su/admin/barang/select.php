<div id="frm-cari">
	<form method="post">
		<input type="text" name="barang" placeholder="Cari Barang">
		<input type="submit" name="button" value="Cari">
	</form>
<div>
<?php 
	if(isset($_POST['barang'])){
		$barang = $_POST['barang'];
		$result = query("SELECT * FROM tblbarang WHERE namabarang LIKE '%$barang%'");
	}else{
		$result = query("SELECT * FROM tblbarang");
	}

	$jumlah 	= mysqli_num_rows($result);
	$tampil 	= 4;
	$halaman 	= ceil($jumlah/$tampil);

	

	if(isset($_GET['page'])){
		$page 	= $_GET['page'];
		$hasil 	= ($page * $tampil) - $tampil;
	}else{
		$hasil 	= 0;
		$page 	= 0;
	}

	if(isset($_POST['barang'])){
		$barang = $_POST['barang'];
		$result = query("SELECT * FROM tblbarang WHERE namabarang LIKE '%$barang%'" );
	}else{
		$result = query("SELECT * FROM tblbarang LIMIT $hasil, $tampil");
	}
	
	?>
	<table border="1">
		<tr>
			<th>Id Barang</th>
			<th width="200">Nama Barang</th>
			<th width="100">Harga</th>
			<th>Deskripsi</th>
			<th>Gambar</th>
			<th>Id Merk</th>
			<th>Stok Barang</th>
		</tr>
	<?php
	while ($row = mysqli_fetch_array($result)) {
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.substr($row[1],0,45).'</td>';
		echo '<td> Rp '.number_format($row[2],0,",",".").'</td>';
		echo '<td>'.substr($row[3],0,100).'</td>';
		echo '<td>'.$row[4].'</td>';
		echo '<td>'.$row[5].'</td>';
		echo '<td>'.$row[6].'</td>';
		echo '</tr>';
	}
 ?>
 </table>

 <div class="paging">
 <?php
 	if($page > 1){
 		$b = $page - 1;
 		echo '<a href="index.php?menu=3&page='.$b.'">Prev</a>';
 	}

 	for($a=1; $a<=$halaman; $a++){
		echo '<a href="index.php?menu=3&page='.$a.'">'.$a.'</a>&nbsp&nbsp&nbsp';
	}

	if($page < $halaman){
		$c = $page + 1;
		echo '<a href="index.php?menu=3&page='.$c.'">Next</a>';
	}	
 ?>
 </div>
 	