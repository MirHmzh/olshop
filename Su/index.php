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
        <title><?php echo $row[0]?></title>
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
                            <span class="elektro"><?php echo $row[0]?></span>
                        </h1>
                    </div>
                </div>
            </header>

            <aside>
                <nav>
                <?php
                    $result = query("SELECT * FROM tblkategori");
                    echo '<ul>';
                    
                    echo '<li><a href="index.php">Home</a></li>';
                    while($row = mysqli_fetch_array($result)){
                        
                        echo '<li>'.$row[0];
                        echo '<ul>';
                        $merk = query("SELECT * FROM tblmerk WHERE kategori = '$row[0]'");
                        while($rowmerk = mysqli_fetch_array($merk)){
                            echo '<li><a href="index.php?id='.$rowmerk[0].'">'.$rowmerk[2].'</a></li><br/>';
                        }
                        echo '</ul>';
                        echo '</li>';
                        
                    }
                    echo '<li><a href="index.php?menu=1">Kontak</a></li>';
                    echo '</ul>';
                ?>
                </nav>
            </aside>

            <div id="container">
                <?php
                    if(isset($_GET['menu'])){
                        $menu = $_GET['menu'];
                        if($menu == 1){
                            require_once 'page/kontak.php';
                        }else if($menu == 2){
                            require_once 'page/cart.php';
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
        </div>
    </body>
</html>
