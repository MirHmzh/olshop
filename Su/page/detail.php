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
			Size : <?php echo $row[3] ?>
		</div>
		<div class="detail-stok">
			<?php 
				echo 'Stok Barang : '.$row[6];
			 ?>
		</div>
		<div class="detail-harga">
			<?php echo 'Rp '.number_format($row[2],0,",",".") ?>
		</div>
		
		<div class="detail-beli">

			<a href="index.php?menu=2&cart=<?php echo $detail;?>">
				<img src="image/icon/icon_cart.png">
				Beli
			</a>
		</div>
		
		
	</div>
</div>