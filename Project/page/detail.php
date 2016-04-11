<?php 
	if(isset($_GET['detail'])){
		$detail = $_GET['detail'];

		$sql = "SELECT * FROM tblbarang WHERE idbarang = $detail";
		$result = query($sql);

		$row = mysqli_fetch_array($result);
	}

 ?>
<div id="detail-barang">
	<div class="detail-image">
		<?php echo '<img src="image/gambar/'.$row[4].'">' ?>
	</div>
	<div class="kanan">
		<div class="detail-header">
			<?php echo $row[1] ?>
		</div>
		<div class="detail-deskripsi">
			<?php echo $row[3] ?>
		</div>
		<div class="detail-stok">
			<?php 
				echo 'Stok Barang : '.$row[6];
			 ?>
		</div>
		<div class="detail-harga">
			<?php echo 'Rp '.number_format($row[2],0,",",".") ?>
		</div>
		<?php 
			if(isset($_SESSION['nama'])){
				?>
		<div class="detail-beli">

			<a href="index.php?menu=2&cart=<?php echo $detail;?>">
				<img src="image/icon/icon_cart.png">
				Beli
			</a>
		</div>
		<?php
		}
		 ?>
		<div class="detail-rating">

			<?php

				if(isset($_POST['rating'])){
					$rate = $_POST['rating'];
					$email = $_SESSION['email'];
					$sql = "INSERT INTO tblrating (rating, idbarang, email) 
							VALUES ($rate, $detail, '$email')";

					query($sql);
				}

				$sql = "SELECT AVG(rating) AS rata FROM tblrating WHERE idbarang = $detail";
				$result = query($sql);

				$row = mysqli_fetch_array($result);
				$rating = ceil($row[0]);
				for($a=1; $a<=$rating; $a++){
					echo '<img src="image/icon/Star-Full.png">';
				}

			 ?>
			<?php
				if(isset($_SESSION['nama'])){
				?>	

			<div class="select">
				<form method="post">
					<select name="rating">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
					<input type="submit" name="rate" value="Rating">
				<form>

			</div>
			<?php
				}
			?>
		</div>
		<div class="detail-komentar">
			<h3>Komentar : </h3>
			<?php 
				if(isset($_SESSION['nama'])){

				?>
			<div class="post-komen">
				
				<form method="post">
					<textarea name="komentar" placeholder="Komentar anda tentang item ini"></textarea>
					<input type="submit" name="komen" value="Komentar">
				</form>
			</div>
			<?php
			}
				if(isset($_POST['komentar'])){
					$komentar = $_POST['komentar'];
					$email = $_SESSION['email'];
					$nama = $_SESSION['nama'];
					$date = date("Y-m-d");
					$level = $_SESSION['level'];
					$sql = "INSERT INTO tblkomentar (email, tanggal, isi, status, 
							idbarang, level, nama) 
							VALUES ('$email', '$date', '$komentar', 0,
							$detail, $level, '$nama')";

					query($sql);
				}

				$sql = "SELECT * FROM tblkomentar WHERE idbarang = $detail AND status = 1 ORDER by tanggal ASC";
				$result = query($sql);

				while($row = mysqli_fetch_array($result)){
					echo '<div class="koment">';
					echo '<span class="nama">'.$row[7].'</span>&nbsp&nbsp&nbsp';
					echo '<span class="tanggal">'.$row[2].'</span>';
					echo '</div>';
					if($row[6] == 1){
						$color = 'deepskyblue';	
					}else {
						$color = '#d1d1d1';
					}
					
					echo '<p style="background-color:'.$color.'">'.$row[3].'</p>';
				}
			 ?>

		</div>
	</div>
</div>