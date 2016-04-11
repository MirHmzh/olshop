<div class="loguser">
	<section id="section-log">
		<div class="container">
		</div>			
	</section>
	<aside id="aside-log">
		<div class="form-header">
			<span>Login Admin Lariso</span>
		</div>
		<div class="form-aside">
	<form method="POST">
		<input type="text" name="user" placeholder="Username/Email" required="required">
		<input type="password" name="pass" placeholder="Password" required="required">
		<input type="submit" name="button" value="Login">
	</form>

<?php
		if(isset($_POST['button'])){
			$user 		= strip_tags($_POST['user']);
			$password  	= strip_tags(base64_encode($_POST['pass']));
			$Quser 		= query("SELECT * FROM tbluser WHERE email='$user' AND password = '$password' AND status = 1 AND level = 2");

			if(mysqli_num_rows($Quser) == 0){
				echo 'Anda bukan pengurus Lariso';
			}else{
			$data = mysqli_fetch_array($Quser);
			$_SESSION['id_user'] = $data[0];
			$_SESSION['level'] = $data[7];
			header('location:index.php');
			}
		}

	?>
		</div>			
	</aside>
</div>