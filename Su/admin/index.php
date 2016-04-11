<?php 
	session_start();

	if(isset($_SESSION['level'])){
		$lvl = $_SESSION['level'];
		if($lvl != 1){
			header("location:login.php");	
		}
	}else{
		header("location:login.php");
	}

	require_once '../function/function.php';
	$sql = "SELECT * FROM tblidentitas";
	$result = query($sql);
	$row = mysqli_fetch_array($result);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Lariso</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="wrapper">
		<header>
		<div class="top">
		<div class="top-1-2">
			<h1>
				<span class="lariso">Admin <?= $row[0]?></span>
				<span class="admin">Selamat Datang Admin (<?= $_SESSION['nama']?>)</span>
			</h1>
			</div>
			
			<?php 
				if($lvl == 1){
					?>
					<div class="top-1-3">
						<a href="logout.php">
							
							Logout
						</a>
					</div>
					<div class="top-1-3">
					<a href="index.php?profil=<?= $_SESSION['email']?>">
						
						Admin (<?= $_SESSION['nama']?>)
					</a>
					</div>
					<?php
					
				}
			 ?>
			
			 </div>
		</header>
		<nav>
			<ul>
				<li>Master
					<ul>
						<li><a href="?menu=1&page=1">Kategori</a></li>
						<li><a href="?menu=2&page=1">Merk</a></li>
						<li><a href="?menu=3&page=1">Barang</a></li>
						<li><a href="?menu=4&page=1">Pelanggan</a></li>
					</ul>
				</li>
				<li>Transaksi
					<ul>
						<li><a href="?menu=5">Penjualan</a></li>
						<li><a href="?menu=6&page=1">Komentar</a></li>
						<li><a href="?menu=7&page=1">Rating</a></li>
					</ul>
				</li>
				<li>Laporan
					<ul>
						<li><a href="?menu=8">Laporan Penjualan</a></li>
						<li><a href="?menu=9">Laporan Stok</a></li>
					</ul>	
				</li>
				<li>Admin
					<ul>
						<li><a href="?menu=10">Tambah User</a></li>
						<li><a href="?menu=11">Identitas</a></li>
						<li><a href="?menu=12">Ubah Password</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	<div class="konten">
		<?php
			if(isset($_GET['menu'])){
				$menu = $_GET['menu'];
				if($menu == 1){
					require_once 'kategori/select.php';
				}else if($menu == 2){
					require_once 'merk/select.php';
				}else if($menu == 3){
					require_once 'barang/select.php';
				}else if($menu == 4){
					require_once 'pelanggan/select.php';
				}else if($menu == 5){
					require_once 'penjualan/select.php';
				}else if($menu == 6){
					require_once 'komentar/select.php';
				}else if($menu == 7){
					require_once 'rating/select.php';
				}else if($menu == 8){
					require_once 'laporan_penjualan/select.php';
				}else if($menu == 9){
					require_once 'laporan_stok/select.php';
				}else if($menu == 10){
					require_once 'tambah_user/select.php';
				}else if($menu == 11){
					require_once 'identitas/select.php';
				}else if($menu == 12){
					require_once 'ubah_password/select.php';
				}else if($menu == 21){
					require_once 'kategori/insert.php';
				}else if($menu == 22){
					require_once 'merk/insert.php';
				}
			}else{
                require_once 'laporan_penjualan/select.php';
            }
		?>
		</div>
	</div>
</body>
</html>
