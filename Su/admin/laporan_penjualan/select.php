<?php 
	if(isset($_GET['action'], $_GET['idaction'])){
		$action = $_GET['action'];
		$id = $_GET['idaction'];

		if($action == 1){
			$sql = "DELETE FROM tblbeli WHERE faktur = '$id'";
			query($sql);
			$sql = "DELETE FROM tbldetailbeli WHERE faktur = '$id'";
			query($sql);
		}else{
			$status = $_GET['status'] + 1;
			if($status > 3){
				$status = 0;

			}
			$sql = "UPDATE tblbeli SET status = $status WHERE faktur = '$id'";
            query($sql);
				
		}
	}

	$sql = "SELECT * FROM tblbeli WHERE status < 4 ORDER BY status, faktur";
	$result = query($sql);
	echo '<table cellpadding="5">';
	echo '<tr>';
	echo '<th>Tanggal</th>';
	echo '<th>Faktur</th>';
	echo '<th>E-mail</th>';
	echo '<th>Total</th>';
	echo '<th>Status</th>';
	echo '<th colspan="2">Aksi</th>';
	echo '</tr>';
	while($row = mysqli_fetch_array($result)){
		echo '<tr>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[3].'</td>';
		echo '<td>'.$row[4].'</td>';
		echo '<td>';
		$status = $row[5];
		switch ($status) {
			case '0':
				echo 'UNPAID';
				break;
			case '1':
				echo 'PAID';
				break;
			case '2':
				echo 'DIKIRIM';
				break;
			case '3':
				echo 'DITERIMA';
				break;
			default:	
				break;
		}
		echo '</td>';
		echo '<td><a href="index.php?menu=8&action=0&idaction='.$row[2].'&status='.$status.'">Ubah</a></td>';
		echo '<td><a href="index.php?menu=8&action=1&idaction='.$row[2].'">Hapus</a></td>';
		echo '</tr>';
	}
	echo '</table>';
 ?>