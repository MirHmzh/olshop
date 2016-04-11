<?php
    $result = query("SELECT * FROM tblkategori");
    echo '<img src="images/icon/menu.png" id="menu">';
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