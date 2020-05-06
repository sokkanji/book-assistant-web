<?php
    $con = mysqli_connect("localhost", "root", "mirim2", "book");
    if(!$con){
		die('Could not connect : ' . mysqli_error());
    }
?>