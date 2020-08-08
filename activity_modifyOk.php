<?php
    session_start();
    require_once("./dbconfig.php");

    $a_no = $_GET["a_no"];
    $a_title = $_POST["a_title"];
    $a_content = $_POST["a_content"];
    $a_date = date("Y-m-d");

    $sql = "UPDATE activity SET a_title='".$a_title."', a_content='".$a_content."', a_date='".$a_date."' WHERE a_no=".$a_no."";
    $result = mysqli_query($con, $sql);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if($result) {
        echo "<script>alert('정상적으로 수정되었습니다.');
        location.href='./activity.php'; 
        </script>";
    }
    else {
        echo "<script>alert('글을 수정하지 못했습니다.'); 
        history.back();
        </script>";	
    } 
?>