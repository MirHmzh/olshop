<?php 
	if (isset($_GET['value'])) {
		$email = $_GET['value'];
		$query = query("SELECT * FROM tbluser WHERE email = '$email'");
		$row   = mysqli_fetch_array($query);
	
	echo '<div id="frm">';
		echo '<form method="post">';
			echo '<label>E-mail : </label>';
			echo '<input type="email" name="email" placeholder="E-mail" value ="'.$row[0].'" required/>';
			echo '<label>Password :</label>';
			echo '<input type="password" name="password" placeholder="Password" value ="'.$row[1].'" required="required"/>';
			echo '<label>Nama : </label>';
			echo '<input type="text" name="nama" placeholder="Nama Lengkap" value ="'.$row[2].'" required/>';
			echo '<label>Alamat : </label>';
			echo '<textarea name="alamat" required="required" placeholder="Alamat lengkap" value ="" style="left:90px;">'.$row[3].'</textarea><br><br>';
			echo '<label>Kode POS : </label>';
			echo '<input type="number" name="kodepos" placeholder="Kode Pos" value ="'.$row[7].'" required/>';
			echo '<label>No. Telp : </label>';
			echo '<input type="number" name="telp" placeholder="No Telepon" value ="'.$row[5].'" required/>';
			echo '<label>Kota : </label>';
			echo '<input type="text" name="kota" placeholder="Masukkan kota anda" value ="'.$row[8].'" required>';
			echo '<label>Level</label>';
			echo "<select name='level'>";
			if ($row[7] == 1) {
				echo "<option selected>ADMIN</option>";
				echo "<option>KASIR</option>";
			}else{
				echo "<option>ADMIN</option>";
				echo "<option selected>KASIR</option>";
			}
			echo "</select>";
			echo '<input type="submit" name="button" value="Perbarui"/>';
		echo '</form>';
	echo '</div>';

	if (isset($_POST['button'])) {
		$email 	= strip_tags($_POST['email']);
		$pass = strip_tags($_POST['password']);
		$nama = strip_tags($_POST['nama']);
		$alamat = strip_tags($_POST['alamat']);
		$pos = strip_tags($_POST['kodepos']);
		$telp = strip_tags($_POST['telp']);
		$level1 = strip_tags($_POST['level']);
		if ($level1 == 'ADMIN') {
					$level = 1;
				}else{
					$level = 2;
				}
		$kota = strip_tags($_POST['kota']);
		query("UPDATE tbluser SET email = '$email', password= '$pass', nama = '$nama', alamat = '$alamat', kodepos = '$pos', telp = '$telp', level = '$level', kota = '$kota' WHERE email = '$email'");
		header('location:index.php?menu=8&action=0');
	}
} ?>