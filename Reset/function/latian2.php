<form action="" method="get">
  Nama : <input type="text" name="nama" value="">
  Alamat : <input type="text" name="alamat" value="">
  <input type="submit" name="tombol" value="kirim">
</form>
<?php
if(isset($_GET['nama'],$_GET['alamat'])){
  $isi = $_GET['nama'];
  $alamat = $_GET['alamat'];
  echo $isi.' tinggal di '.$alamat;
}
?>
