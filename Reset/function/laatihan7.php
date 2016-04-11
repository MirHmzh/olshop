<?php
  $db = mysqli_connect('localhost','root','','dbonlineshop');

  function query($sql){
    global $db;
    $result = mysqli_query($db,$sql);
    return $result;
  }

  function frmopen($action, $method){
    echo '<form action="'.$action.'" method="'.$method.'" >';
  }

  function input($type,$nme,$value,$plc){
    echo '<input type="'.$type.'" name="'.$nme.'" value="'.$value.'" placeholder="'.$plc.'">';
  }

  function frmclose (){
    echo '</form>';
  }

  frmopen("","POST");
  input("text","kategori","","");
  input('submit','kirim','kirim','');
  frmclose();

  if(isset($_POST['kirim'])){
    $kategori = mysqli_real_escape_string($db,$_POST['kategori']);
    $sql = "INSERT INTO tblkategori VALUES ('$kategori') ";
    query($sql);
  }

  echo '</br>';
  $sql = "INSERT INTO tblkategori VALUES ('KIPAS') ";

  query($sql);
  $result = query("SELECT * FROM tblkategori");

  while ($row = mysqli_fetch_array($result)) {
    echo $row[0];
    echo "</br>";
  }
?>
