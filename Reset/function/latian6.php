<link rel="stylesheet" type="text/css" href="style.css"/>
<form action="" method="get">
  <select name="bulan">
    <option>Januari</option>
    <option>Februari</option>
    <option>Maret</option>
  </select>
  <input type="submit" name="tombol" value="kirim">
</form>
<nav>
<ul>
  <li><a href="#">Menu 1</a>
    <ul>
      <li><a href="#">Submenu 1</a></li>
      <li><a href="#">Submenu 1</a></li>
    </ul>
  </li>
  <li><a href="#">Menu 2</a>
    <ul>
      <li><a href="#">Submenu 2</a></li>
      <li><a href="#">Submenu 2</a></li>
    </ul>
  </li>
  <li><a href="#">Menu 3</a>
    <ul>
      <li><a href="#">Submenu 3</a></li>
      <li><a href="#">Submenu 3</a></li>
    </ul>
  </li>
</ul>
</nav>
<?php

  $db = mysqli_connect('localhost', 'root', '', 'dbonlineshop')or die('gagal');

  function query($sql){
    global $db;
    $result=mysqli_query($db, $sql);
    return $result;
  }

  function formopen($action, $method){
    echo "<form action='$action' method='$method'>";
  }
  function formclose(){
    echo "</form>";
  }
  function selectopen($name){
    echo "<select name='$name'>";
  }
  function option($value){
    echo "<option>$value</option>";
  }
  function selectclose(){
    echo "</select>";
  }
  function tombol($type, $name, $value){
    echo "<input type='$type' name='$name' value='$value'>";
  }

  $sql = "SELECT * FROM tblkategori";
  $result = query($sql);

  formopen('', 'get');
  selectopen('bulan');
  while($row = mysqli_fetch_array($result)){
    option($row[0]);
  }
  tombol('submit', 'tombol', 'kirim');
  formclose();

  $sql = "SELECT * FROM tblkategori";
  $result = query($sql);

  $kategori = query("SELECT * FROM tblkategori");

  echo '<ul>';
  while ($rowkategori = mysqli_fetch_array($kategori)) {
    echo '<li>'.$rowkategori[0];
    echo '<ul>';
    $merk = query("SELECT * FROM tblmerk WHERE kategori = '$rowkategori[0]'");
    while ($rowmerk = mysqli_fetch_array($merk)) {
      echo '<li>'.$rowmerk[0].'</li>';
    }
    echo '</ul>';
    '</li>';
  }
  echo '</ul>';

  $a = 0;
  $b = 0;
  while ($a < 5) {
    echo '<ul>';
    echo '<li>'.$a;
    while ($b < 3) {
      echo '<ul>';
      echo '<li>'.$b.'</li>';
      echo '</ul>';
      $b++;
    }
    echo '</li>';
    echo '</ul>';
    $a++;
  }
?>
