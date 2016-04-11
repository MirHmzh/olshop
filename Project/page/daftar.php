<div id="frm">
<form action="" method="post">
	<label>E-mail : </label>
	<input type="email" name="email" placeholder="E-mail" required/>
	<label>Password :</label>
	<input type="password" name="password" placeholder="Password" required="required"/>
	<label>Nama : </label>
	<input type="text" name="nama" placeholder="Nama Lengkap" required/>
	<label>Alamat : </label>
	<textarea name="alamat" required="required" placeholder="Alamat lengkap" style="left:90px;"></textarea><br><br>
	<label>Kota : </label>
	<input type="text" name="kota" placeholder="Masukkan kota anda" required>
	<label>Kode POS : </label>
	<input type="number" name="kodepos" placeholder="Kode Pos" required/>
	<label>No. Telp : </label>
	<input type="number" name="telp" placeholder="No Telepon" required/>

	<?php 
		$capctha = rand(1,1000);
		echo '<h3 style="margin:-20px 0 15px 12px;">Capctha&nbsp&nbsp : '.$capctha.'</h3>';
	 ?>
	 <input type="hidden" name="textcapctha" value="<?= $capctha?>"/>
	 <label>Capctha : </label>
	 <input type="text" name="capctha" required>
	<input type="submit" name="button" value="Daftar"/>
</form>
</div>
<?php 
	if(isset($_POST['email'], $_POST['password'], $_POST['nama'],
		$_POST['alamat'], $_POST['kota'], $_POST['kodepos'], $_POST['telp'], $_POST['button'])){
		
		$email 		= strip_tags($_POST['email']);
		$password 	= base64_encode(strip_tags($_POST['password']));
		$nama 		= strip_tags($_POST['nama']);
		$alamat 	= strip_tags($_POST['alamat']); 
		$kota 		= strip_tags($_POST['kota']);
		$pos		= strip_tags($_POST['kodepos']);
		$telp 		= strip_tags($_POST['telp']);
		$capctha 	= $_POST['textcapctha'];
		$text_capctha = strip_tags($_POST['capctha']);
		if($text_capctha == $capctha){

		$sql = "SELECT * FROM tbluser WHERE email = '$email'";
		$resultuser = query($sql);
			if(mysqli_num_rows($resultuser) == 1){
				script("User sudah terdaftar");
			}else{


			$sql = "INSERT INTO tbluser VALUES ('$email','$password','$nama',
				'$alamat', '$pos','$telp',0,0, '$kota')";
			query($sql);
			script("Pendaftaran berhasil tunggu konfirmasi dari admin");
			location("index.php");
			}
		}else{
			script("Ada data yang salah");
		}
	}
 ?>