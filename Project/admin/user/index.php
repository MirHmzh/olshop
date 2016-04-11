<?php 
	$query = query("SELECT * FROM tbluser");
 ?>

 	<table>
 		<tr>
 			<th>Email</th>
 			<th>Nama</th>
 			<th>Alamat</th>
 			<th>Kode Pos</th>
 			<th>Telp</th>
 			<th>Level</th>
 			<th>Kota</th>
 			<th colspan="2"></th>
 		</tr>
<?php while ($row = mysqli_fetch_array($query)) { 		
 		echo '<tr>';
 			echo '<td>'.$row[0].'</td>';
 			echo '<td>'.$row[2].'</td>';
 			echo '<td>'.$row[3].'</td>';
 			echo '<td>'.$row[4].'</td>';
 			echo '<td>'.$row[5].'</td>';
 			echo '<td>'.$row[7].'</td>';
 			echo '<td>'.$row[8].'</td>';
 			echo '<td><a style="text-align:center;" href="index.php?menu=8&action=1&value='.$row[0].'" class="btn-hps">Edit</a></td>';
 			echo '<td><a style="text-align:center;" href="index.php?menu=8&action=2&value='.$row[0].'" class="btn-hps">Hapus</a></td>';
 			echo '</tr>';
 		}
  ?>
 	</table>

 

