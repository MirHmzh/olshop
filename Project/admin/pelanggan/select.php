<?php
	$sql = "SELECT * FROM tbluser WHERE level =0 ORDER by status desc";
	$result = query($sql);
?>
	<div class="tambah">
		<a href="">Tambah</a>
	</div>
	<table>
		<tr>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Kode Pos</th>
			<th>Telepon</th>
			<th>Status</th>
			<th>Kota</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
			while($row = mysqli_fetch_array($result)){
				?>
				<tr>
					<td><?= $row[2]?></td>
					<td><?= $row[3]?></td>
					<td><?= $row[4]?></td>
					<td><?= $row[5]?></td>
					<td>
						<?php 
							$status = $row[7];
							switch ($status) {
								case '0':
									echo 'Nonactive';
									break;
								case '1':
									echo 'Active';
									break;
								default:
									# code...
									break;
							}
						?>
					</td>
					<td><?= $row[8]?></td>
					<td><a href="" class="btn-tmb">Ubah</a></td>
					<td><a href="" class="btn-hps">Hapus</a></td>
				</tr>
				<?php
			}
		?>
	</table>