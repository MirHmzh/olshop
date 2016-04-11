<form action="" method="POST">
  <input type="text" name="kategori" value=""/>
  <input type="submit" name="kirim" value="Kirim"/>
</form>

<?php
  $db = mysqli_connect('localhost','root','','dbonlineshop');

  function quera($sql){
    global $db;
    $result = mysqli_query($db,$sql);
    return $result;
  }

  if(isset($_POST['kirim'])){
    $kategori = mysqli_real_escape_string($db,$_POST['kategori']);
    $sql = "INSERT INTO tblkategori VALUES ('$kategori') ";
    quera($sql);
  }

  echo '</br>';
  $sql = "INSERT INTO tblkategori VALUES ('KIPAS') ";

  quera($sql);
  $result = quera("SELECT * FROM tblkategori");

  while ($row = mysqli_fetch_array($result)) {
    echo $row[0];
    echo "</br>";
  }


?>
