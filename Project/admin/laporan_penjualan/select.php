<?php
	$awal = "2015-11-26";
	$akhir = "2016-01-14";
	
?>

<form method="POST">
	<label>Tanggal awal : </label><input type="date" name="awal">
	<label>Tanggal akhir : </label><input type="date" name="akhir">
	<input type="Submit" name="cari" value="Cari">
</form>

<?php	

	if (isset($_POST['cari'])) {
		$awal = $_POST['awal'];
		$akhir = $_POST['akhir'];

		$query = query("SELECT tblbeli.tanggal, tblbeli.faktur, tbldetailbeli.namabarang FROM tblbeli INNER JOIN tbldetailbeli  ON tblbeli.faktur=tbldetailbeli.faktur 
				 WHERE tanggal BETWEEN '$awal' AND '$akhir' ");
?>
	<table>
		<tr>
			<th>Tanggal</th>
			<th>Faktur</th>
			<th>Barang</th>
		</tr>
<?php		
		
		while ($row = mysqli_fetch_array($query)) {
			echo "<tr>";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td title='".$row[2]."'>".substr($row[2],0,50)."</td>";
			echo "</tr>";
		}
	}
?>
	</table>