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
		<input type="text" name="user" placeholder="Username/Email" required>
		<input type="password" name="pass" placeholder="Password" required>
		<input type="submit" name="Login" value="Login">
	</form>

<?php
		if(isset($_POST['login'])){
			$user 		= strip_tags($_POST['user']);
			$password  	= strip_tags(base64_encode($_POST['pass']));
			$Quser 		= SELECT tbluser WHERE email='$user' AND password = '$password' AND status = 1 AND level = 2 OR level = 1; 

			if(mysqli_num_rows($Quser) == 0){
			echo '<div class="warning danger">
					<i class="icon-remove"></i>
					Anda bukan pengurus Lariso
			</div>';
			}else{
			$data = mysqli_fetch_array($Quser);
			$_SESSION['id_user'] = $data[0];
			$_SESSION['level'] = $data[9];
			$fungsi->lokasi("index.php");
			}
		}

	?>
		</div>			
	</aside>
</div>