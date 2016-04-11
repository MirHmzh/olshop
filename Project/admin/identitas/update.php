<?php 
	$query = query("SELECT * FROM tblidentitas");
	$row   = mysqli_fetch_array($query);

	echo '<div id="frm">';
		echo '<form method="post">';
			echo '<label>Nama Toko : </label>';
			echo '<input type="text" name="nama" placeholder="Nama" value ="'.$row[0].'" required/>';
			echo '<label>Alamat :</label>';
			echo '<input type="text" name="alamat" placeholder="Alamat" value ="'.$row[1].'" required="required"/>';
			echo '<label>Telp : </label>';
			echo '<input type="number" name="telp" placeholder="Telp" value ="'.$row[2].'" required/>';
			echo '<label>Email : </label>';
			echo '<input type="email" name="email" placeholder="Email" value ="'.$row[3].'" required="required"/>';
			echo '<label>Bank 1 : </label>';
			echo '<input type="text" name="bank1" placeholder="Bank - 1" value ="'.$row[4].'" required/>';
			echo '<label>Bank 2 : </label>';
			echo '<input type="text" name="bank2" placeholder="Bank - 2" value ="'.$row[5].'" required/>';
			echo '<label>Bank 3 : </label>';
			echo '<input type="text" name="bank3" placeholder="Bank - 3" value ="'.$row[6].'" required/>';
			echo '<label>Bank 4 : </label>';
			echo '<input type="text" name="bank4" placeholder="Bank - 4" value ="'.$row[7].'" required/>';
			echo '<label>Bank 5 : </label>';
			echo '<input type="text" name="bank5" placeholder="Bank - 5" value ="'.$row[8].'" required/>';
			echo '<input type="submit" name="button" value="Perbarui"/>';
		echo '</form>';
	echo '</div>';

	if (isset($_POST['button'])) {
		$nama 	= strip_tags($_POST['nama']);
		$alamat = strip_tags($_POST['alamat']);
		$telp   = strip_tags($_POST['telp']);
		$email  = strip_tags($_POST['email']);
		$bank1  = strip_tags($_POST['bank1']);
		$bank2  = strip_tags($_POST['bank2']);
		$bank3  = strip_tags($_POST['bank3']);
		$bank4  = strip_tags($_POST['bank4']);
		$bank5  = strip_tags($_POST['bank5']);
		query("UPDATE tblidentitas SET namatoko = '$nama', alamat = '$alamat', telp = '$telp', email = '$email', bank1 = '$bank1', bank2 = '$bank2', bank3 = '$bank3', bank4 = '$bank4', bank5 = '$bank5'");
		header('location:index.php?menu=9&action=0');
	}
 ?>

