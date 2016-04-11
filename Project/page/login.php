<div id="frm">
	<form action="" method="post">
		<label>E-mail : </label>
		<input type="email" name="email" placeholder="E-mail" required>
		<label>Password : </label>
		<input type="password" name="password" placeholder="Password" required="required">
		<input type="submit" name="login" value="Login">
	</form>
</div>
<?php 
	if(isset($_POST['email'], $_POST['password'], $_POST['login'])){
		$email 		= strip_tags($_POST['email']);
		$password 	= base64_encode(strip_tags($_POST['password']));

		$sql = "SELECT * FROM tbluser WHERE email = '$email' and password = '$password' and status = 1";
		$result = query($sql);

		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			$_SESSION['email'] = $row[0];
			$_SESSION['password'] = $row[1];
			$_SESSION['nama'] = $row[2];
			$_SESSION['level'] = $row[7];
			header('location: index.php');
		}else {
			echo '
			<script>
				alert("Username/Password anda salah");
			</script>
			';
		}
	}
 ?>