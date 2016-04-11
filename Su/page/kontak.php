<?php
    $result = query("SELECT * FROM tblidentitas");
    $row = mysqli_fetch_array($result);
    echo '<div class="kontak">';
    echo '<h1>'.$row[0].'</h1>';
    echo $row[1].'<br>';
    echo $row[2].'<br>';
    echo $row[3].'<br>';
    echo $row[4].'<br>';
    echo '</div>';
?>