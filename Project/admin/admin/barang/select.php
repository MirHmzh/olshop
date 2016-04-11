<?php
	$sql = "SELECT * FROM tblbarang";
	$result = query($sql);
	$jumlah = mysqli_num_rows($result);
	$tampil = 5;
	$halaman = ceil($jumlah/$tampil);

	if (isset($_GET['page'])){
		$page = $_GET['page'];
		$awal = ($page * $tampil) - $tampil;
		$akhir = $page * $tampil;
	}else{
		$page = 0;
		$awal = 0;
		$akhir = $tampil;
	}
	$sql = "SELECT * FROM tblbarang LIMIT $awal,$akhir";
	$result = query($sql);
?>
	<div class="overflow">
		<div class="tambah">
			<a href="?menu=3&action=1">Tambah</a>
		</div>
	<table>
		<tr>
			<th>Barang</th>
			<th style="width:110px;">Harga</th>
			<th>Deskripsi</th>
			<th>Stok</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
			while($row = mysqli_fetch_array($result)){
				echo '<tr>';
				echo '<td>'.$row[1].'</td>';
				echo '<td>Rp '.number_format($row[2],0,",",",").'</td>';
				echo '<td>'.$row[3].'</td>';
				echo '<td>'.$row[6].'</td>';
				echo '<td><a href="" class="btn-tmb">Ubah</a></td>';
				echo '<td><a href="" class="btn-hps">Hapus</a></td>';
				echo '</tr>';	
			}
		?>
	</table>
	</div>

	<div class="paging">
		<?php 
			if ($page > 1) {
			$x = $page - 1;
			echo '<a href="?menu=3&action=0&page='.$x.'">Prev</a>&nbsp';
		}

	for ($i=1; $i < $halaman ; $i++) { 
		echo "<a href='?menu=3&action=0&page=".$i."'>".$i."</a> ";
	}

	if ($page <= 1) {
		$x = $page + 1;
		echo '<a href="?menu=3&action=0&page='.$x.'">Next</a>&nbsp';
	}
		 ?>	
	</div>