<?php  
	$query = query("SELECT * FROM tblidentitas");
 ?>

 	<table>
 		<tr>
 			<th>Nama Toko</th>
 			<th>Alamat</th>
 			<th>Telp</th>
 			<th>Email</th>
 			<th>Bank 1</th>
 			<th>Bank 2</th>
 			<th>Bank 3</th>
 			<th>Bank 4</th>
 			<th>Bank 5</th>
 			<th>Aksi</th>
 		</tr>
<?php while ($row = mysqli_fetch_array($query)) { 		
 		echo '<tr>';
 			echo '<td>'.$row[0].'</td>';
 			echo '<td>'.$row[1].'</td>';
 			echo '<td>'.$row[2].'</td>';
 			echo '<td>'.$row[3].'</td>';
 			echo '<td>'.$row[4].'</td>';
 			echo '<td>'.$row[5].'</td>';
 			echo '<td>'.$row[6].'</td>';
 			echo '<td>'.$row[7].'</td>';
 			echo '<td>'.$row[8].'</td>';
 			echo '<td><a style="text-align:center;" href="index.php?menu=9&action=1" class="btn-hps">Edit</a></td>';
 			echo '</tr>';
 		}
  ?>
 	</table>