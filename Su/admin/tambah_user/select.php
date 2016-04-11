<?php 
	if(isset($_GET['email'])){
		$mail = $_GET['email'];
	
		$result = query("SELECT * FROM tbluser WHERE email = '$mail'");
		$data = mysqli_fetch_array($result);	
?>
<div style="padding:20px 0;">
<form action="" method="post" id="frm"> 
	<label>E-mail : </label>
	<input type="email" name="email" value="<?= $data[0]?>" required/>
	<label>Password :</label>
	<input type="password" name="password" value="<?= $data[1]?>" required="required"/>
	<label>Nama : </label>
	<input type="text" name="nama" value="<?= $data[2]?>" required/>
	<label>Alamat : </label>
	<textarea name="alamat" required="required"><?= $data[3]?></textarea><br/>
	<label>Kode POS : </label>
	<input type="number" name="kodepos" value="<?= $data[4]?>" required/>
	<label>No. Telp : </label>
	<input type="number" name="telp" value="<?= $data[5]?>" required/>
	<label>Status</label>
	<input type="number" name="status" value="<?= $data[6]?>" required/>
	<label>Level</label>
	<input type="number" name="level" value="<?= $data[7]?>" required/>
	<input type="submit" name="button" value="Daftar"/>
</form>
<?php
	}
 ?>
<?php 
	if(isset($_POST['email'], $_POST['password'], $_POST['nama'], $_POST['alamat'], $_POST['kodepos'], $_POST['telp'],$_POST['status'], $_POST['level'])){

		$email = strip_tags($_POST['email']);
		$password = base64_encode(strip_tags($_POST['password']));
		$nama = strip_tags($_POST['nama']);
		$alamat = strip_tags($_POST['alamat']);
		$pos = strip_tags($_POST['kodepos']);
		$telp = strip_tags($_POST['telp']);
		$status = strip_tags($_POST['status']);
		$level = strip_tags($_POST['level']);

		$sql = "UPDATE tbluser SET nama='$nama', alamat='$alamat', kodepos='$pos', telp='$telp', status='$status', level='$level'  WHERE email='$mail'";
		query($sql);

		header("location:index.php?menu=4&page=1");

	}
 ?>