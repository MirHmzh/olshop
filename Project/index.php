<!DOCTYPE html>
<?php
    session_start();
    require_once 'function/function.php';

    $result = query("SELECT * FROM tblidentitas");
    $row = mysqli_fetch_array($result);

    $menu = 0;
?>
<html>
    <head>
        <title>Selamat Datang dan Selamat Berbelanja di Toko <?php echo $row[0]?></title>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="responsive.css" media="screen"/>
        <meta name="view port" content="width=device-width">
    </head>
    <body>
        <div id="wrapper">
            <header>
                <div class="top">
                    <div class="top-1-2">
                        <h1>
                            <span class="lariso"><?php echo $row[0]?></span>
                        </h1>
                    </div>
                    <?php
                        if(isset($_SESSION['email'],$_SESSION['password'])){
                            $rowcart = 0;
                            if(isset($_SESSION['faktur'])){
                                $faktur = $_SESSION['faktur'];
                                $sql = "SELECT * FROM tbldetailbeli WHERE faktur = '$faktur'";
                                $resultcart = query($sql);
                                $rowcart = mysqli_num_rows($resultcart);
                            }
                            if($rowcart == 0){
                                $url = "index.php";
                            }else{
                                $url = 'index.php?menu=2';
                            }
                            
                            echo '

                            <div class="top-1-3">
                            <a href="index.php?menu=4"></a>
                            <a href="index.php?menu=4">Logout</a>
                            </div>

                            <div class="top-1-3">
                            <a href="index.php?menu=6&email='.$_SESSION['email'].'"></a>
                            <a href="index.php?menu=6&email='.$_SESSION['email'].'">Profil ('.$_SESSION['nama'].')</a>
                            </div>

                            <div class="top-1-3">
                            <a href="'.$url.'">Cart('.$rowcart.')</a>
                            </div>

                            ';
                        }else {

                            echo '
                                <div class="top-1-3">
                                <a href="index.php?menu=3"></a>
                                <a href="index.php?menu=3">Login</a>
                                </div>

                                <div class="top-1-3">
                                <a href="index.php?menu=5"></a>
                                <a href="index.php?menu=5">Daftar</a>
                                </div>

                            ';
                        }
                     ?>
                </div>
                <nav>
                    <?php
                        require_once 'page/menu.php';
                    ?>
                </nav>
            </header>

            <div id="container">
                <?php
                    if(isset($_GET['menu'])){
                        $menu = $_GET['menu'];
                        if($menu == 1){
                            require_once 'page/kontak.php';
                        }else if($menu == 2){
                            require_once 'page/cart.php';
                        }else if($menu == 3){
                            require_once 'page/login.php';
                        }else if($menu == 4){
                            require_once 'page/logout.php';
                        }else if($menu == 5){
                            require_once 'page/daftar.php';
                        }else if($menu == 6){
                            require_once 'page/profil.php';
                        }else if($menu == 7){
                            require_once 'page/berita.php';
                        }else if($menu == 8){
                            require_once 'page/merk.php';
                        }else if($menu == 9){
                            require_once 'page/detail.php';
                        }else if($menu == 10){
                            require_once 'page/checkout.php';
                        }else if($menu == 11){
                            require_once 'page/konfirmasi.php';
                        }
                    }else {
                        if(isset($_GET['update'])){
                            header('location:index.php?menu=2');
                        }else{
                            require_once 'page/barang.php';
                        }
                       
                    }
                ?>
            </div>

            <footer>
                <div class="bottom">
                    <h2><?php
                        $result = query("SELECT * FROM tblidentitas");
                        $row = mysqli_fetch_array($result);
                        echo $row[0]?>
                    </h2>
                    <p>
                        <?php

                            echo $row[1].'<br/>';
                            echo $row[2].'<br/>';
                            echo $row[3].'<br/>';
                            echo $row[4].'<br/>';
                            echo $row[5].'<br/>';
                            echo $row[6].'<br/>';
                            echo $row[7].'<br/>';
                            echo $row[8];
                        ?>
                    </p>
                </div>
                <div class="bottom-1-2">
                    <?php
                        $result = query("SELECT * FROM tblkategori");
                        while($row = mysqli_fetch_array($result)){
                            echo $row[0];
                            echo '<br/>';
                        }
                    ?>
                </div>
            </footer>
        </div>
    </body>
</html>
