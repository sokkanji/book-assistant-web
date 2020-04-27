<?php
    $con = mysqli_connect("localhost", "root", "mirim2", "book");
    if($con){
        echo "<script>console.log('성공');</script>";
    } else {
        echo "<script>console.log('실패');</script>";
    }
?>