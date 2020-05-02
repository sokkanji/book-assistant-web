<?php
require_once("../base/dbconfig.php");

$s_name=$_POST['s_title'];
$s_addr01=$_POST['s_addr01'];
$s_addr02=$_POST['s_addr02'];
$s_tel=$_POST['s_tel'];
$s_web=$_POST['s_web'];
$s_intro=$_POST['s_intro'];
$s_etc=$_POST['s_etc'];
$s_photo=$_POST['s_photo'];
 
$sql = 'INSERT INTO report(s_title, s_addr, s_tel, s_web, s_intro, s_etc, s_photo) 
VALUES("' . $s_title . '","'. $s_addr01 . " " . $s_addr02 . '","' . $s_tel . '","' . $s_web . '","'. $s_intro . '","'. $s_etc . '","'. $s_photo .'")';

$result = mysqli_query($con, $sql);
if($result){ 
	echo "<script>alert('정상적으로 글이 등록되었습니다.'); 
	location.href='../review/report.html'; 
	</script>";
} else{
	echo "<script>alert('글을 등록하지 못했습니다.'); history.back();</script>";
} 

mysqli_close($con);
?>