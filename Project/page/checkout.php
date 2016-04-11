<?php

if(isset($_SESSION['faktur'])){
    echo '<p style="text-align: center;">';
    echo 'Isi Kolom dibawah Dengan Data Yang Lain Jika Alamat Atau Nama Penerima Berbeda Dengan Nama Anda<br>';

    if(isset($_GET['total'])){
        $total = $_GET['total'];
        echo 'Total Belanja Anda, Adalah : Rp '.number_format($total,0,".",".").'<br>';
        echo 'Untuk Memudahkan Kami Memeriksa Pembayaran Anda<br> Sistem Akan Menambahkan Angka Unik Dibelakang Jumlah Belanja Anda<br>';
        $kodeunik = rand(1,100);
        $transfer = $total+$kodeunik;
        echo 'Jumlah Yang Harus Anda Tranfers Sebesar</p>';
        echo '<h3 style="font-weight: bold; text-align: center;"> Rp '.number_format($transfer,0,".",".").'</h3>';
    }
    
   
    
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM tbluser WHERE email = '$email'";
    $result = query($sql);
    
    $row = mysqli_fetch_array($result);
    echo '<div id="frm">';
    echo '<form method="post">';
    echo '<label>Penerima</label>';
    echo '<input type="text" name="penerima" value="'.$row[2].'"required>';
    echo '<label>Alamat</label>';
    echo '<textarea name="alamat" required>'.$row[3].'</textarea><br><br>';
    echo '<label>Kota</label>';
    echo '<input type="text" name="kota" value="'.$row[8].'" required>';
    echo '<label>Kode Pos</label>';
    echo '<input type="text" name="pos" value="'.$row[4].'"required>';
    echo '<label>Telepon</label>';
    echo '<input type="text" name="telp" value="'.$row[5].'"required>';
    echo '<label>Metode Pembayaran</label>';
    echo '<select name="bank">';
    echo '<option>Mandiri</option>';
    echo '<option>BCA</option>';
    echo '<option>BNI</option>';
    echo '<option>BRI</option>';
    echo '<option>Bank Jatim</option>';
    echo '</select>';
    echo '<label>Kurir</label>';
    echo '<select name="kurir">';
    echo '<option>JNE</option>';
    echo '<option>POS</option>';
    echo '<option>TiKi</option>';
    echo '<option>Baby Roshan</option>';
    echo '</select>';
    
  
    echo '<input type="submit" name="button" value="Bayar">';
    echo '</form>';
    
    echo '</div>';

    if(isset($_POST['button'])){
        $penerima = $_POST['penerima'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $kodepos = $_POST['pos'];
        $telp = $_POST['telp'];
        $pembayaran = $_POST['bank'];
        $kurir = $_POST['kurir'];
        $faktur= $_SESSION['faktur'];
        
        $sql = "UPDATE tblbeli SET kurir = '$kurir', metode = '$pembayaran', alamat = '$alamat', kota = '$kota', kodepos = '$kodepos', telp =                    '$telp', penerima = '$penerima', total = '$transfer' WHERE faktur = '$faktur' ";
        query($sql);
        
        $sql = "SELECT * FROM tbldetailbeli WHERE faktur = '$faktur'";
        $result = query($sql);
        while($row = mysqli_fetch_array($result)){
            $barang = $row[2];
            $jumlah = $row[4];
            
            $sql = "SELECT * FROM tblbarang WHERE namabarang = '$barang'";
            $hasil = query($sql);
            $row = mysqli_fetch_array($hasil);
            $stok = $row[6] - $jumlah;
            
            $sql = "UPDATE tblbarang SET stock = $stok WHERE namabarang = '$barang'";
            query($sql);
        }
        unset($_SESSION['faktur']);
        header('location:index.php?menu=11&transfer='.$transfer.'&faktur='.$faktur.'');
    }
    
}

?>