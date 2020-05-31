<?php
session_start();

$_SESSION['userId']=$_GET['userId'];
$_SESSION['u_name']=$_GET['userNickName'];
$_SESSION['email']=$_GET['userEmail'];

// echo "<script>alert('1>>".$_SESSION['userId'] . "'); </script>";
// echo "<script>alert('2>>".$_SESSION['u_name'] . "'); </script>";
// echo "<script>alert('3>>".$_SESSION['email'] . "'); </script>";

echo "<script>location.href='../base/index.html'</script>";
?>
