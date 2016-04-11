<?php

  $db = mysqli_connect('localhost','root','','dbonlineshop');

  function query($sql){
    global $db;
    $result = mysqli_query($db,$sql);
    return $result;
  }

  /*echo '<select name="kategori-1">';
  $result=query("SELECT* FROM tblkategori");
  while($row=mysqli_fetch_array($result)){
    echo '<option>'.$row[0].'<option>';

  }
  echo '</select>';


  */

?>

<form method="post">
  <select name="kategori">
    <?php
      $result=query("SELECT* FROM tblkategori");
      while($row=mysqli_fetch_array($result)){
        echo '<option>'.$row[0].'<option>';
      }
    ?>
    <input type="text" name="merk" value="">
    <input type="submit" name="button" value="save">
  </select>
</form>

<?php

  if(isset($_POST['button'])){
    $merk = $_POST['merk'];
    $ketegori = $_POST['kategori'];

    $sql = "INSERT INTO tblmerk (merk) VALUES ('$merk')";

    query($sql);
  }

  $result = query("SELECT * FROM tblmerk");
  while($row = mysqli_fetch_array($result)){
    echo $row[0];
    echo $row[1];
    echo '<br>';
  }

?>
