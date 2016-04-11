<?php

	$sql = "SELECT * FROM tblkategori";
	$result = query($sql);

?>
	<div class="tambah">
		<a href="?menu=1&action=1">Tambah</a>
	</div>
	<div class="table-info">
	<table>
		<tr>
			<th>Kategori</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
		while($row= mysqli_fetch_array($result)){
			echo '<tr>';
			echo '<td>'.$row[0].'</td>';
			echo '<td><a href="?menu=1&action=2&value='.$row[0].'" class="btn-tmb">Ubah</a></td>';
			echo '<td><a href="?menu=1&action=3&value='.$row[0].'" class="btn-hps">Hapus</a></td>';
			echo '</tr>';
		}
		?>
	</table>
	</div>

