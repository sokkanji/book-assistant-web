<?php
session_start();
require_once("./dbconfig.php");
require_once("./password.php");

$email=$_POST['email'];
$pw=$_POST['pw'];


$sql = "SELECT pw, u_name FROM user WHERE email = ?";

$stmt = mysqli_prepare($con, $sql);
$bind = mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$board = mysqli_fetch_array($result);
if(password_verify($pw, $board['pw'])){
    $_SESSION['email'] = $email;
    $_SESSION['u_name'] = $board['u_name'];
    echo "<script> location.href='./index.php'; </script>";
} else{
    echo "<script> alert('이메일 혹은 패스워드가 일치하지 않습니다.'); 
    history.back(); 
    </script>";
}

mysqli_stmt_close($stmt);
?>