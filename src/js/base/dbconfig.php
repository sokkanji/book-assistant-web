<?php
    ini_set('display_errors', 1); 
    ini_set('error_reporting', E_ALL);

    $con = mysqli_connect("localhost", "root", "mirim2", "book");
    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

    if($con){
      echo "<script>console.log('성공');</script>";
  } else {
      echo "<script>console.log('실패');</script>";
  }

?>