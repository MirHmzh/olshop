<?php
 frmopen('','POST');
    frminput('text','customer','','Isi Kategori');
    tombol('tombol','Cari');
    frmclose();
    enter();

    $result = query("SELECT * FROM tblcustomer");
    $jumlahdata = mysqli_num_rows($result);
    $tampil     = 2;
    $halaman    = ceil($jumlahdata / $tampil);

    if(isset($_GET['page'])){
      $page = $_GET['page'];
      $page = ($page * $tampil) - $tampil;
    }else{
      $page = 0;
    }

    if(isset($_POST['tombol'])){
        $customer = $_POST['customer'];

        $sql = "SELECT*FROM tblcustomer WHERE nama ='$customer'";

    }else{
        $sql = "SELECT*FROM tblcustomer LIMIT $page,$tampil";
    }

    $result = query($sql);

    echo '<div class="tambah">';
    echo '<a href="#">Tambah</a>';
    echo '</div>';
    for ($a=1; $a<=$halaman; $a++) {
      echo '<a href=?menu=4&page='.$a.'">'.$a.'</a>&nbsp&nbsp';
    }
    echo '<table border="4">';
    echo '<tr>';
    echo '<th>Kode</th>';
    echo '<th>Nama</th>';
    echo '<th>E-mail</th>';
    echo '<th>Password</th>';
    echo '<th>Alamat</th>';
    echo '<th>No. Tlp</th>';
    echo '<th>Status</th>';
    echo '<th>ubah</th>';
    echo '<th> hapus</th>';
    echo '</tr>';
    while ($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<td>'.$row[0].'</td>';
        echo '<td>'.$row[1].'</td>';
        echo '<td>'.$row[2].'</td>';
        echo '<td>'.$row[3].'</td>';
        echo '<td>'.$row[4].'</td>';
        echo '<td>'.$row[5].'</td>';
        echo '<td>'.$row[6].'</td>';
        echo '<td><a href="#">Ubah</a></td>';
        echo '<td><a href="#">Hapus</a></td>';
        echo '</tr>';
    }
    echo '</table>';
?>
