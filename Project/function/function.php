<?php
    date_default_timezone_set("Asia/Jakarta");

    $db = mysqli_connect('localhost','root','123456','dbtoko');

    function query($sql){
        global $db;
        $result = mysqli_query($db,$sql);
        return $result;
    }

    function script($script){
    	echo '<script>alert("'.$script.'")</script>';
    }

    function location($location){
    	echo '<script>window.location.href="'.$location.'"</script>';
    }



?>
