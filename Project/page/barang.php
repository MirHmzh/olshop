<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM tblbarang WHERE idmerk = $id LIMIT 0,9";
    }else {
         $sql = "SELECT * FROM tblbarang LIMIT 0,9";
    }

    $result = query($sql);

 ?>

<section>
   <div class="item">
    <?php 
        while ($row = mysqli_fetch_array($result)) {
            echo '
            <div class="item-1-3">
                <div class="item-image">
                    <img src="image/gambar/'.$row[4].'">
                </div>
                <div class="item-header">
                    '.$row[1].'
                </div>
                <div class="item-harga">
                    Rp '.number_format($row[2],0,",",".").'
                </div>
                <div class="item-detail">
                     <a href="index.php?menu=9&detail='.$row[0].'">Detail</a>
                </div>
            </div>
            ';
        }
     ?>
        
   </div> 
</section>

<aside>
    <h1>Berita</h1>
    <div id="news">
        <?php
            $result = query("SELECT * FROM tblberita LIMIT 0,3");
            while($row = mysqli_fetch_array($result)){
                echo '<h3 style="margin-bottom:-20px; color:red;">'.$row[2].'</h3><br/>';
                echo '<p class="time">'.$row[4].'</p>';
                echo '<p class="isi-berita">'.substr($row[3],0,300).'</p>';
                echo '<a href="index.php?menu=7&id='.$row[0].'"><span id="read">Read more..</span></a>';
            }
        ?>
    </div>
</aside>