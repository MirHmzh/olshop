<?php

  /*
    zodiak :
    lahir bulan januari mempunyai 2 bintang : 1.aquarius, 2.capricorn
    jika lahir pada tanggal 1-20 maka bintang nya aquarius
    jika lahr pada tanggal 21-31 maka bintang nya capricorn
  */

  $bulan = 5;
  $tanggal = 21;

  if($bulan == 1){
    if($tanggal > 0 and $tanggal <= 20){
      echo 'zodiak anda aquarius';
    }else if($tanggal <= 31){
      echo 'zodiak anda capricorn';
    }
  }else if($bulan == 2){
    if($tanggal > 0 and $tanggal <= 20){
      echo 'zodiak anda capricorn';
    }else if($tanggal <= 28){
      echo 'zodiak anda pisces';
    }
  }else if($bulan == 3){
    if($tanggal > 0 and $tanggal <= 20){
      echo 'zodiak anda pisces';
    }else if($tanggal <= 31){
      echo 'zodiak anda aries';
    }
  }else if($bulan == 4){
    if($tanggal > 0 and $tanggal <= 20){
      echo 'zodiak anda aries';
    }else if($tanggal <= 30){
      echo 'zodiak anda gemini';
    }
  }else{
    echo 'NOT FOUND 404';
  }

?>
