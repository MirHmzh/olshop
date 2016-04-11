<?php
    frmopen('','POST');
    frminput('text','kategori','','Isi Kategori');
    tombol('tombol','Cari');
    frmclose();
    enter();


    $result = query("SELECT * FROM tblkategori");
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
      $kategori = $_POST['kategori'];

      $sql = "SELECT * FROM tblkategori WHERE kategori ='$kategori'";
    }else {
      $sql = "SELECT * FROM tblkategori LIMIT $page, $tampil";
    }

    $result = query($sql);

    echo '<div class="tambah">';
    echo '<a href="?menu=11">Tambah</a>';
    echo '</div>';

    for ($a=1; $a<=$halaman; $a++) {
      echo '<a href=?menu=1&page='.$a.'">'.$a.'</a>&nbsp&nbsp';
    }

    echo '<table border="4">';
    echo '<tr>';
    echo '<th>Kategori</th>';
    echo '<th>ubah</th>';
    echo '<th> hapus</th>';
    echo '</tr>';
    while ($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<td>'.$row[0].'</td>';
        echo '<td><a href="#">Ubah</a></td>';
        echo '<td><a href="#">Hapus</a></td>';
        echo '</tr>';
    }
    echo '</table>';
?>
