<?php
    frmopen('','POST');
    selectopen('merk');
    $result=query("SELECT* FROM tblkategori");
    while($row=mysqli_fetch_array($result)){
      echo '<option>'.$row[0].'<option>';
    }
    selectclose();
    frminput('text','merk','','Isi merk');
    tombol('tombol','tambah');
    frmclose();
    enter();

    $result = query("SELECT * FROM tblmerk");
    $jumlahdata = mysqli_num_rows($result);
    $tampil     = 3;
    $halaman    = ceil($jumlahdata / $tampil);

    if(isset($_GET['page'])){
      $page = $_GET['page'];
      $page = ($page * $tampil) - $tampil;
    }else{
      $page = 0;
    }

    if(isset($_POST['tombol'])){
        $merk = $_POST['merk'];

        $sql = "SELECT*FROM tblmerk WHERE merk = '$merk'";

    }else{
        $sql = "SELECT*FROM tblmerk LIMIT $page,$tampil";
    }
    $result = query($sql);

    echo '<div class="tambah">';
    echo '<a href="?menu=22">Tambah</a>';
    echo '</div>';
    for ($a=1; $a<=$halaman; $a++) {
      echo '<a href=?menu=2&page='.$a.'">'.$a.'</a>&nbsp&nbsp';
    }

    echo '<table border="4">';
    echo '<tr>';
    echo '<th>Merk</th>';
    echo '<th>Kategori</th>';
    echo '<th>ubah</th>';
    echo '<th>hapus</th>';
    echo '</tr>';
    while ($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<td>'.$row[0].'</td>';
        echo '<td>'.$row[1].'</td>';
        echo '<td><a href="#">Ubah</a></td>';
        echo '<td><a href="#">Hapus</a></td>';
        echo '</tr>';
    }
    echo '</table>';
?>
