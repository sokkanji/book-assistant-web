<?php
require_once("./dbconfig.php");

$s_store=$_POST['s_store'];
$s_addr01=$_POST['s_addr01'];
$s_addr02=$_POST['s_addr02'];
$s_tel=$_POST['s_tel'];
$s_web=$_POST['s_web'];
$s_intro=$_POST['s_intro'];
$s_etc=$_POST['s_etc'];

$tmpfile =  $_FILES['s_photo']['tmp_name'];
$o_name = $_FILES['s_photo']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['s_photo']['name']);
$folder = "../../upload/".$filename;
move_uploaded_file($tmpfile,$folder);

$sql = 'INSERT INTO report(s_store, s_addr, s_tel, s_web, s_intro, s_etc, s_photo) 
VALUES("' . $s_store . '","'. $s_addr01 . " " . $s_addr02 . '","' . $s_tel . '","' . $s_web . '","'. $s_intro . '","'. $s_etc . '","'. $o_name .'")';

$result = mysqli_query($con, $sql);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($result){ 
	echo "<script>alert('정상적으로 제보되었습니다.'); 
	location.href='./report.html'; 
	</script>";
} else{
	echo "<script>alert('전송 실패했습니다.');
	history.back();
	</script>";
} 

mysqli_close($con);
?>