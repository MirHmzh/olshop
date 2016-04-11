

<?php 
	if(isset($_GET['cart'])){
		$cart = $_GET['cart'];
		
		if(!isset($_SESSION['faktur'])){
			$faktur = date("Ymdhi");
			$_SESSION['faktur'] = $faktur;
			$tanggal = date("Y-m-d");
			$email = $_SESSION['email'];
            
            /*--blok untuk --*/
			$sql = "INSERT INTO tblbeli (tanggal, faktur, email) 
					VALUES ('$tanggal','$faktur','$email')";
			query($sql);
            
            /*--blok untuk --*/
			$sql = "SELECT * FROM tblbarang WHERE idbarang = '$cart'";
			$result = query($sql);
			$row = mysqli_fetch_array($result);
			$barang = $row[1];
			$harga = $row[2];
            
            /*--blok untuk --*/
			$sql = "INSERT INTO tbldetailbeli (faktur, namabarang, harga, jumlah) VALUES ('$faktur','$barang',$harga,1)";
			query($sql);
		}else{
            
            /*--blok nama barang & harga--*/
			$sql = "SELECT * FROM tblbarang WHERE idbarang = '$cart'";
			$result = query($sql);
			$row = mysqli_fetch_array($result);
			$barang = $row[1];
			$harga = $row[2];
			$faktur = $_SESSION['faktur'];
            
            /*--blok untuk mengecek--*/
            $sql = "SELECT * FROM tbldetailbeli WHERE faktur = '$faktur' AND namabarang = '$barang'";
            
            $result = query($sql);
            $row = mysqli_fetch_array($result);
            if(mysqli_num_rows($result) > 0){
                $jumlah = $row[4]+1;
                $sql = "UPDATE tbldetailbeli SET jumlah = $jumlah WHERE iddetail = $row[0]";
                query($sql);
            }else{
                $sql = "INSERT INTO tbldetailbeli (faktur, namabarang, harga, jumlah) VALUES ('$faktur','$barang',$harga,1)";
			query($sql);
            }
		}
	}
    if(isset($_GET['action'],$_GET['idaction'])){
        $action = $_GET['action'];
        $idaction = $_GET['idaction'];
        if($action == 1){
            $sql = "DELETE FROM tbldetailbeli WHERE iddetail = $idaction";
            query($sql);
        }
    }
    
    if(isset($_POST['jumlah'], $_POST['idaction'])){
        $jumlah = $_POST['jumlah'];
        $idaction = $_POST['idaction'];
        $sql = "UPDATE tbldetailbeli SET jumlah = $jumlah WHERE iddetail = $idaction";
        query($sql);
    }

	if(isset($_SESSION['faktur'])){
		$faktur = $_SESSION['faktur'];
		$sql = "SELECT * FROM tbldetailbeli WHERE faktur = '$faktur'";
		$result = query($sql);
		echo '<div class="table-info">';
		echo '<table cellpadding="5">';
		echo '<tr>';
		echo '<th>No.</th>';
		echo '<th>Nama Barang</th>';
		echo '<th>Harga</th>';
		echo '<th colspan=2>Jumlah</th>';
        echo '<th>Hapus</th>';
		echo '</tr>';
		$no=1;
		$total = 0;
		while($row = mysqli_fetch_array($result)){
			echo '<tr>';
			echo '<td>'.$no++.'</td>';
			echo '<td>'.$row[2].'</td>';
			echo '<td> Rp '.number_format($row[3],0,",",".").'</td>';
            
            $namabarang = $row[2];
            $sql = "SELECT * FROM tblbarang WHERE namabarang = '$namabarang'";
            $resultstok = query($sql);
            $rowstok = mysqli_fetch_array($resultstok);
            $stok = $rowstok[6];
            
			echo '<td><form method="post">';
            echo '<input type="number" name="jumlah" value="'.$row[4].'" style="width:50px;" min="1" max="'.$stok.'">';
            echo '<input type="hidden" name="idaction" value="'.$row[0].'"';
            echo '</td>';
            echo '<td>';
            echo '<input type="submit" name="update" value="Update">';
            echo '</td></form>';
            echo '<td class="btn-hps"><a href="index.php?menu=2&action=1&idaction='.$row[0].'">Hapus</a></td>';
			echo '</tr>';
			$total = $total+($row[3]*$row[4]);
		}
		echo '</table>';
		echo '</div>';
		echo 'Total belanja anda : Rp '.number_format($total,0,",",".");
		echo '<br>';
        echo '<div class="detail-beli" style="margin-top:12px; width:100px;">';
        echo '<a href="index.php?menu=10&total='.$total.'" style="font-size:12px;">Check Out</a>';
        echo '</div>';
        
	}else{
		echo 'Keranjang kosong';
	}

 ?>