<?php
    $host = 'localhost';
    $database ='dbonlineshop';
    $user ='root';
    $password ='';

    $link = mysqli_connect($host, $user, $password, $database)
            or die(mysqli_error($link));


    function enter(){
        echo '<br>';
    }

    function head($value){
        echo '<h2>'.$value.'</h2>';
    }


    function tampil($query){
        global $link;

        $result = mysqli_query($link, $query) or die ('Query salah');
        return $result;
    }
    $query = "SELECT * FROM tblkategori";
    $result = tampil($query);

    head('Table Kategori');

    echo '<table border="2">';
    echo '<th>Kategori</th>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['kategori'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
    enter();
    echo '<hr>';
    enter();

    $query = "SELECT * FROM tblmerk";
    $result = tampil($query);

    head('Table Merk');
    echo '<table border="2">';
    echo '<th>Merk</th>';
    echo '<th>Kategori</th>';

    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['merk'].'</td>';
        echo '<td>'.$row['kategori'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
    enter();
    echo '<hr>';
    enter();

    $query = "SELECT * FROM tblbarang";
    $result = mysqli_query($link, $query) or die ('Query Salah');

    head('Table Barang');
    echo '<table border="2">';
    echo '<th>Merk</th>';
    echo '<th>Nama</th>';
    echo '<th>Deskripsi</th>';
    echo '<th>Harga</th>';
    echo '<th>Stok</th>';
    echo '<th>Gambar</th>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['merk'].'</td>';
        echo '<td>'.$row['nama'].'</td>';
        echo '<td>'.$row['deskripsi'].'</td>';
        echo '<td>'.$row['harga'].'</td>';
        echo '<td>'.$row['stok'].'</td>';
        echo '<td>'.$row['gambar'].'</td>';
    }
    echo '</table>';
    enter();
    echo '<hr>';
    enter();

    $query = "SELECT * FROM tblcustomer";
    $result = tampil($query);

    head('Table Costumer');
    echo '<table border="2">';
    echo '<th>Nama</th>';
    echo '<th>E-Mail</th>';
    echo '<th>Password</th>';
    echo '<th>Alamat</th>';
    echo '<th>No. Hp</th>';
    echo '<th>Status Account</th>';

    while($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<td>'.$row[1].'</td>';
        echo '<td>'.$row[2].'</td>';
        echo '<td>'.$row[3].'</td>';
        echo '<td>'.$row[4].'</td>';
        echo '<td>'.$row[5].'</td>';
        echo '<td>'.$row[6].'</td>';
        echo '</tr>';
    }

    echo '</table>';
?>
