<?php
  function form($action,$method){
    echo '
      <form action="'.$action.'" method="'.$method.'">
        Nama : <input type="text" name="nama" value="">
        Alamat : <input type="text" name="alamat">
        <input type="submit" name="tombol" value="kirim">
      </form>
    ';
  }
  function formopen($action,$method){
    echo '<form action="'.$action.'" method="'.$method.'">';
  }
  function forminput($type, $name, $value){
    echo '<input type="'.$type.'" name="'.$name.'" value="'.$value.'">';
  }
  function formclose(){
    echo '</form>';
  }
  function enter(){
    echo '<br>';
  }
  form('','post');
  enter();

  formopen('','get');
  echo 'Nama : ';
  forminput('text', 'nama', '');
  echo 'Alamat : ';
  forminput('text', 'alamat', '');
  echo 'Kelas : ';
  forminput('text', 'kelas', '');
  forminput('submit', 'tombol', 'kirim');
  formclose();
?>
