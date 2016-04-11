<?php

	$sql = "SELECT * FROM tblmerk ORDER by kategori asc";
	$result = query($sql);
	$jumlah = mysqli_num_rows($result);
	$tampil = 3;
	$halaman = ceil($jumlah/$tampil);

	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$awal = ($page * $tampil) - $tampil;
		$akhir = $page * $tampil;
	}else{
		$page = 0;
		$awal = 0;
		$akhir = $tampil;
	}

	if($page > 1){
		$prev = $page - 1;
		echo '<a href="?menu=2&action=0&page='.$prev.'">Prev</a>&nbsp&nbsp';
	}

	for($i=1; $i<=$halaman; $i++){
		echo '<a href="?menu=2&action=0&page='.$i.'">'.$i.'</a>&nbsp&nbsp';
	}

	if($page < $halaman){
		$next = $page + 1;
		echo '<a href="?menu=2&action=0&page='.$next.'">Next</a>&nbsp&nbsp';
	}

	$sql = "SELECT * FROM tblmerk ORDER by kategori asc LIMIT $awal,$tampil";
	$result = query($sql);

?>
	<div class="tambah">
		<a href="?menu=2&action=1">Tambah</a>
	</div>
	<table>
		<tr>
			<th>Kategori</th>
			<th>Merk</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
		while($row= mysqli_fetch_array($result)){
			echo '<tr>';
			echo '<td>'.$row[1].'</td>';
			echo '<td>'.$row[2].'</td>';
			echo '<td><a href="?menu=2&action=2&value='.$row[0].'" class="btn-tmb">Ubah</a></td>';
			echo '<td><a href="?menu=2&action=3&value='.$row[0].'" class="btn-hps">Hapus</a></td>';
			echo '</tr>';
		}
		?>
	</table>
