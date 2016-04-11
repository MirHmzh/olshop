<?php 
	if(isset($_GET['email'])){
		$email = $_GET['email'];
		$sql = "SELECT * FROM tbluser WHERE email = '$email'";
		$result = query($sql);
		$row = mysqli_fetch_array($result);
		echo '<div class="profil">';
		echo '<h2>Profil</h2>';
		echo '<img src="image/capture.png"/>';
		echo '<h3>'.$row[2].'</h3><br>';
		echo '<p>Alamat : '.$row[3].'<br>';
		echo 'Kota : '.$row[8].'<br>';
		echo 'Kodepos : '.$row[4].'<br>';
		echo 'No.Telp : '.$row[5].'</p><br>';
		echo '<a style="" href="index.php?menu=6&email='.$email.'&action=edit" >Edit Profil</a>';
		echo '</div>';

		echo '<h3>Histori Transaksi</h3>';
		if(isset($_GET['faktur'])){
			$faktur = $_GET['faktur'];
			$sql = "SELECT * FROM tbldetailbeli WHERE faktur = '$faktur' ";
			$resultfaktur = query($sql);
			echo '<table cellpadding="5" style="float:right; margin-top:40px; ">';
			echo '<tr style="background-color: #00aedb;">';
			echo '<th>No.</th>';
			echo '<th>Barang</th>';
			echo '<th>Harga</th>';
			echo '<th>Jumlah</th>';
			echo '<th>Total</th>';
			echo '</tr>';
			$no = 1;
			$grandtotal = 0;
			while($rowfaktur = mysqli_fetch_array($resultfaktur)){
				echo '<tr>';
				echo '<td>'.$no++.'</td>';
				echo '<td>'.$rowfaktur[2].'</td>';
				echo '<td> Rp. '.number_format($rowfaktur[3],0,",",".").'</td>';
				echo '<td>'.$rowfaktur[4].'</td>';
				$harga =($rowfaktur[3] * $rowfaktur[4]);
				echo '<td> Rp. '.number_format($harga,0,",",".").'</td>';
				$grandtotal = $grandtotal + $harga;
				echo '</tr>';
			}
			echo '<tr>';
			echo '<td colspan="4" style="text-align:center;">Total keseluruhan : </td>';
			echo '<td> Rp. '.number_format($grandtotal,0,",",".").'</td>';
			echo '</tr>';
			echo '</table>';
		}
		$sql = "SELECT * FROM tblbeli WHERE email = '$email' ORDER BY status ASC";
		$result = query($sql);

        echo '<br>';
        echo '<br>';
		echo '<table cellpadding="5" >';
		echo '<tr style="background-color:  #00aedb;">';
		echo '<th>No.</th>';
		echo '<th>Tanggal</th>';
		echo '<th>No. Order</th>';
		echo '<th>Status</th>';
		echo '</tr>';
		$no = 1;
		while($row = mysqli_fetch_array($result)){
			echo '<tr>';
			echo '<td>'.$no++.'</td>';
			echo '<td>'.$row[1].'</td>';
			echo '<td><a href="index.php?menu=6&email='.$email.'&faktur='.$row[2].'">'.$row[2].'</a></td>';
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
			echo '</tr>';
		}
		echo '</table>';

		/*pembatas*/
		echo '<div class="profil-3">';
		if(isset($_GET['action']) == 'edit'){
			$action = $_GET['action'];
			$email = $_GET['email'];
			$user = query("SELECT * FROM tbluser WHERE email = '$email'");
			$rowuser = mysqli_fetch_array($user);
			echo '<div id="frm">';
			echo '<form method="post">';
			echo '<label>E-mail : </label>';
			echo '<input type="email" name="email" value="'.$rowuser[0].'" required>';
			echo '<label>Nama : </label>';
			echo '<input type="text" name="nama" value="'.$rowuser[2].'" required>';
			echo '<label>Alamat : </label>';
			echo '<textarea name="alamat" placeholder="Alamat" style="left:90px;" required>'.$rowuser[3].'</textarea><br><br>';
			echo '<label>Kota : </label>';
			echo '<input type="text" name="kota" value="'.$rowuser[4].'" required>';
			echo '<label>Kode POS : </label>';
			echo '<input type="number" name="kodepos" value="'.$rowuser[5].'" required>';
			echo '<label>Telp : </label>';
			echo '<input type="number" name="telp" value="'.$rowuser[6].'" required>';
			echo '<label>Password : </label>';
			echo '<input type="password" name="password" placeholder="Masukkan kembali password anda" required="required">';
			echo '<input type="submit" name="button" value="Update">';
			echo '</form>';
			echo '</div>';

			if(isset($_POST['button'])){
				$mail = strip_tags($_POST['email']);
				$password = base64_encode(strip_tags($_POST['password']));
				$nama = strip_tags($_POST['nama']);
				$alamat = strip_tags($_POST['alamat']);
				$kota = strip_tags($_POST['kota']);
				$pos = strip_tags($_POST['kodepos']);
				$telp = strip_tags($_POST['telp']);
				$_SESSION['nama'] = $nama;


				if($password != $rowuser[1]){
					script("Password yang anda masukkan tidak sama");
				}else{
				$sql = "UPDATE tbluser SET email = '$mail', nama = '$nama', alamat = '$alamat', kota = '$kota', kodepos = '$pos', telp = '$telp' WHERE email = '$email'";
				query($sql);
				location("index.php?menu=6&email=".$email."");
				}
			}
		}
		/*---*/

	}
 ?>