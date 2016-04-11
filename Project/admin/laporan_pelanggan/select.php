<?php 
	$result = query("SELECT tblbeli.email, tblbeli.total, tblbeli.status, tbldetailbeli.faktur, tbldetailbeli.jumlah, 
			  tbldetailbeli.jumlah, tbldetailbeli.namabarang
		     FROM tblbeli INNER JOIN tbldetailbeli WHERE tblbeli.faktur = tbldetailbeli.faktur");

 echo "<table>";
 	echo "<tr>";
 		echo "<th>Email</th>";
 		echo "<th>Faktur</th>";
 		echo "<th>Barang</th>";
 		echo "<th>Jumlah Barang</th>";
 		echo "<th>Total</th>";
 		echo "<th>Status</th>";
 	echo "</tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>";
			$status = $row[2];
			switch ($status) {
				case '0':
					echo "UNPAID";
					break;
				case '1':
					echo "PAID";
					break;
				case '2':
					echo "ON SENT";
					break;
				case '3':
					echo "DELIVERED";
					break;
				default:
					break;
			}
		echo "</tr>";
	}
 ?>
 </table>