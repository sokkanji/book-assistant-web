<?php
    $con = mysqli_connect("localhost", "root", "mirim2", "book");
  
    mysqli_set_charset($con, 'utf8'); 
    
    if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>