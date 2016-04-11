<?php
	$sql = "SELECT * FROM tblbeli";
	$result = query($sql);
?>

	<table>
		<tr>
			<th>Tanggal</th>
			<th>Faktur</th>
			<th>E-mail</th>
			<th>Total</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		<?php
		while($row = mysqli_fetch_array($result)){
		?>
		<tr>
			<td><?= $row[1]?></td>
			<td><?= $row[2]?></td>
			<td><?= $row[3]?></td>
			<td>Rp <?= number_format($row[4],0,",",".")?></td>
			<td>
				<?php
					$status = $row[5];
					switch ($status) {
						case '0':
							echo 'UNPAID';
							break;
						case '1':
							echo 'PAID';
							break;
						case '2':
							echo 'ON SENT';
							break;
						case '3':
							echo 'DELEVIRED';
							break;
						default:

							break;
					}
				?>
			</td>
			<td><a href="" class="btn-hps">Hapus</a></td>
		</tr>
		<?php
		}
	?>
	</table>
	