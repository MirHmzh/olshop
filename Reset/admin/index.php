<?php
    require_once '../function/function.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <header>
            <div class="banner">
                <h1>Admin Page</h1>
                <p>Selamat datang Tedo HarisCandra</p>
            </div>
            <nav>
                <ul>
                    <li><a>Master</a>
                        <ul>
                            <li><a href="?menu=1">Kategori</a></li>
                            <li><a href="?menu=2">Merk</a></li>
                            <li><a href="?menu=3">Barang</a></li>
                        </ul>
                    </li>
                    <li><a>Transaksi</a>
                        <ul>
                            <li><a href="?menu=4">Customer</a></li>
                            <li><a href="?menu=5">Penjualan</a></li>
                            <li><a href="?menu=6">Detail Penjualan</a></li>
                        </ul>
                    </li>
                    <li><a>Utilitas</a>
                        <ul>
                            <li><a href="?menu=7">Artikel</a></li>
                            <li><a href="?menu=8">Komentar</a></li>
                            <li><a href="?menu=9">Rating</a></li>
                        </ul>
                    </li>
                    <li><a>Admin</a>
                        <ul>
                            <li><a href="?menu=10">User</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </header>

        <section>
            <?php
                if(isset($_GET['menu'])){
                    $menu = $_GET['menu'];
                    if($menu == 1){
                        require_once 'kategori/select.php';
                    } else if($menu == 2) {
                      require_once 'merk/select.php';
                    }else if ($menu == 3){
                      require_once 'barang/select.php';
                    }else if ($menu == 4){
                      require_once 'customer/select.php';
                    }else if ($menu == 5){
                      require_once 'penjualan/select.php';
                    }else if ($menu == 6){
                      require_once 'detail penjualan/select.php';
                    }else if ($menu == 7){
                      require_once 'artikel/select.php';
                    }else if ($menu == 8){
                      require_once 'komentar/select.php';
                    }else if ($menu == 9){
                      require_once 'rating/select.php';
                    }else if ($menu == 10){
                      require_once 'user/select.php';
                    }else if($menu == 11){
                      require_once 'kategori/insert.php';
                    }else if($menu == 22){
                      require_once 'merk/insert.php';
                    }
                }else{
                  echo ' ';
                }
            ?>
        </section>
    </body>
</html>
