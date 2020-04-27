<?php
require_once("dbconfig.php");

// $id=$_POST['id'];
$a_title=$_POST['a_title'];
$a_content=$_POST['a_content'];
$a_date=date("Y-m-d");

$sql = 'INSERT INTO activity_write(a_title, a_content, a_date) VALUES("' . $a_title . '", "' . $a_content . '","' . $a_date . '")';

$result = mysqli_query($con, $sql);
if($result) $msg = "정상적으로 글이 등록되었습니다.";
else $msg = "글을 등록하지 못했습니다.";

echo "<script>alert('$msg');</script>";
mysqli_close($con);
?>