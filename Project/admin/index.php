<?php 
	session_start();
	require_once '../function/function.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin LARISO</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../responsive.css">
</head>
<body>
	<div id="wrapper">
	<header>
		<div class="top">
			<a href="index.php?menu=10" style="float:right;margin:10px;color:white;">Logout</a>
		</div>
		<nav>
		<?php 
				if(isset($_SESSION['level'])){
						$level = $_SESSION['level'];
					?>
			<ul>
				<?php 
					if($level == 2){
				?>
				<li class="main-menu">Master
					<ul>
						<li class="sub-menu"><a href="?menu=1&action=0">Kategori</a></li>
						<li class="sub-menu"><a href="?menu=2&action=0">Merk</a></li>
						<li class="sub-menu"><a href="?menu=3&action=0">Barang</a></li>
					</ul>
				</li>
				<?php
					}// level
				?>
				<li class="main-menu">Transaksi
					<ul>
						<li class="sub-menu"><a href="?menu=4">Penjualan</a></li>
						<li class="sub-menu"><a href="?menu=5">Pelanggan</a></li>
					</ul>
				</li>
				<li class="main-menu">Laporan
					<ul>
						<li class="sub-menu"><a href="?menu=6">Laporan Penjualan</a></li>
						<li class="sub-menu"><a href="?menu=7">Laporan Pelanggan</a></li>
					</ul>
				</li>
				<li class="main-menu">Utilitas
					<ul>
						<li class="sub-menu"><a href="?menu=8&action=0">User</a></li>
						<li class="sub-menu"><a href="?menu=9&action=0">Identitas</a></li>
					</ul>
				</li>
			</ul>
			<?php
				}
			 ?>
		</nav>
		
	</header>
	<div class="main-content">
		<?php
			if(!isset($_SESSION['level'])){
				require_once 'login.php';
			}else{ 
			if(isset($_GET['menu'])){
				$menu = $_GET['menu'];
				if(isset($_GET['action'])){
					$action = $_GET['action'];

				}
				switch ($menu) {
					case '1':
						if($action ==  0 && $menu == 1){
							require_once 'kategori/select.php';		
						}else if($action == 1 && $menu == 1){
							require_once 'kategori/insert.php';
						}else if($action == 2 && $menu == 1){
							require_once 'kategori/update.php';
						}else if($action == 3 && $menu == 1) {
							require_once 'kategori/delete.php';
						}
						
						break;
					case '2':
						if($action == 0 && $menu == 2){
							require_once 'merk/select.php';
						}else if($action == 1 && $menu == 2){
							require_once 'merk/insert.php';
						}else if($action == 2 && $menu == 2){
							require_once 'merk/update.php';
						}else if ($action == 3 && $menu == 2) {
							require_once 'merk/delete.php';
						}
						
						break;
					case '3':
						if ($action == 0 && $menu == 3) {
							require_once 'barang/select.php';	
						}else if ($action == 1 && $menu == 3) {
							require_once 'barang/insert.php';
						}else if ($action == 2 && $menu == 3 ) {
							require_once 'barang/update.php';
						}else if ($action == 3 && $menu == 3) {
							require_once 'barang/delete.php';
						}
					break;
					case '4':
						require_once 'penjualan/select.php';
						break;
					case '5':
						require_once 'pelanggan/select.php';
						break;
					case '6':
						require_once 'laporan_penjualan/select.php';
						break;
					case '7':
						require_once 'laporan_pelanggan/select.php';
						break;
					case '8':
						if ($action == 0 && $menu == 8) {
							require_once 'user/index.php';	
						}elseif($action == 1 && $menu == 8){
							require_once 'user/update.php';
						}elseif ($action == 2 && $menu == 8) {
							require_once 'user/delete.php';
						}
						break;
					case '9':
						if ($action == 0 && $menu == 9) {
							require_once 'identitas/index.php';	
						}elseif ($action == 1 && $menu == 9) {
							require_once 'identitas/update.php';
						}
						break;
					case '10':
						require_once 'logout.php';
							break;
					default:
						break;
				}
			}
		}
		 ?>
	</div>
	</div>
</body>
</html>