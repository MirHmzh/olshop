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

    $sql = "INSERT INTO tblmerk VALUES ('$merk'.'$kategori')";

    query($sql);
    header('location: index.php?menu=2');
  }

?>
