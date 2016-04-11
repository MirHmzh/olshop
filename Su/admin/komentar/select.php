<?php 
	$result = query("SELECT * FROM tblkomentar");

	$jumlah = mysqli_num_rows($result);
	$tampil = 4;
	$halaman = ceil($jumlah/$tampil);

	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$hasil = ($page * $tampil) - $tampil;
	}else{
		$hasil = 0;
		$page = 0;
	}

	$result = query("SELECT * FROM tblkomentar LIMIT $hasil, $tampil");
	?>
	<table border="1">
		<tr>
			<th>Id Komentar</th>
			<th>E-Mail</th>
			<th>Tanggal</th>
			<th>Komentar</th>
			<th>Status</th>
			<th>Id Barang</th>
			<th>Level</th>
			<th>Nama</th>
		</tr>
	<?php
	while ($row = mysqli_fetch_array($result)) {
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[3].'</td>';
		echo '<td>'.$row[4].'</td>';
		echo '<td>'.$row[5].'</td>';
		echo '<td>'.$row[6].'</td>';
		echo '<td>'.$row[7].'</td>';
		echo '</tr>';
	}
	echo '<div class="paging">';
	echo '</div>';

 ?>
 	</table>
 	<div class="paging">
 <?php  
 	if($page > 1){
 		$b = $page - 1;
 		echo '<a href="index.php?menu=6&page='.$b.'">Prev</a>';
 	}

 	for($a=1; $a<=$halaman; $a++){
		echo '<a href="index.php?menu=6&page='.$a.'">'.$a.'</a>&nbsp&nbsp&nbsp';
	}

	if($page < $halaman){
 		$c = $page + 1;
 		echo '<a href="index.php?menu=6&page='.$c.'">Next</a>';
 	}
 ?>
 	</div>