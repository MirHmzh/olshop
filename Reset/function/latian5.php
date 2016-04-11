

<?php
            /*koneksi database*/
    $host='localhost';
    $user='root';
    $pass='';
    $db  ='dbonlineshop';

    $link = mysqli_connect($host, $user, $pass, $db)or die ('gagal');

    function query($sql){
        global $link;


    $result=mysqli_query($link, $sql);
        return $result;

    }

    /*hitung jumlah data*/
    $sql="SELECT * FROM tblmerk";
    $result= query($sql);


    $jumlahdata=mysqli_num_rows($result);
    echo 'jumlah data = '.$jumlahdata;
    /*-----------------------------------------*/
    echo '<br>';
    /*HITUNG JUMLAH PAGE*/
        $tampil = 3;
        $halaman=ceil($jumlahdata/$tampil);
        echo 'jumlah yang ditampilkan = '.$tampil;
        echo '<br>';
        echo 'jumlah halaman = '.$halaman;
    /*-----------------------------*/
    echo '<hr>';

    /*buat paging*/

        for($a=1; $a<=$halaman; $a++){
            echo '<a href="?page='.$a.'">'.$a.'</a>&nbsp&nbsp&nbsp';
        }
        echo '<hr>';

    /*-------------------------------------------*/

    /*--------------ambil variabel dari URL----------------*/
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $page = ($page *$tampil)-$tampil;


    }else{
        $page =0;
    }

    /*-------------------------------------------------------*/


    echo '<br>';
    $dataawal =$page;
    $jumlah=$tampil;
    $result = query("SELECT * FROM tblmerk LIMIT $dataawal,$jumlah");
    $nomer = $page+1;


    while($row=mysqli_fetch_array($result)){
        echo $nomer.'.&nbsp';
        echo $row[0];
        echo '<br>';
        $nomer++;
    }

?>
