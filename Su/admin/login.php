<?php 
	session_start();
	require_once '../function/function.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div style="margin-top:200px;">
		<form method="post" id="frm">
			<label>Email : </label>
			<input type="email" name="email" placeholder="E-mail" required>
			<label>Password : </label>
			<input type="password" name="password" placeholder="Password" required="required">
			<input type="submit" name="login" value="Login">
		</form>
	</div>
</body>
</html>
<?php 
	if(isset($_POST['email'], $_POST['password'])){
		$email = strip_tags($_POST['email']);
		$password = base64_encode(strip_tags($_POST['password']));
		$sql = "SELECT * FROM tbluser WHERE email = '$email' AND password = '$password'";
		$result = query($sql);
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			$email = $_SESSION['email'] = $row[0];
			$password = $_SESSION['password'] = $row[1];
			$level = $_SESSION['level'] = $row[7];
			$nama = $_SESSION['nama'] = $row[2];
			if($level == 1){
				header('location:index.php');	
			}else{
				echo '<br>';
				echo '<p style="text-align:center;">Anda Bukan Admin</p>';
				session_destroy();
			}
			
		}else{
			echo "Email/Password anda salah";
		}
	}

 ?>