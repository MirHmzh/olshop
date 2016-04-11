<?php
    $host = 'localhost';
    $database ='dbonlineshop';
    $user ='root';
    $password ='';

    $link = mysqli_connect($host, $user, $password, $database)
            or die(mysqli_error($link));

    function frmopen($action, $method){
        echo '<form action="'.$action.'" method="'.$method.'">';
    }

    function frmclose(){
        echo '</form>';
    }

    function frminput($type, $name, $value, $holder){
        echo '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" placeholder="'.$holder.'" required>';
    }

    function tombol($name, $value){
        echo '<input type="submit" name="'.$name.'" value="'.$value.'">';
    }

    function selectopen($name){
        echo '<select name="'.$name.'">';
    }

    function selectclose(){
        echo '</select>';
    }

    function option($value){
        echo '<option>'.$value.'</option>';
    }

    function enter(){
        echo '<br/>';
    }

    function query($sql){
        global $link;
        $result=mysqli_query($link, $sql);
        return $result;

    }
?>
