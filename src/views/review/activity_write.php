<?php
require_once("../base/dbconfig.php");
$a_title=$_POST['a_title'];
$a_content=$_POST['a_content'];
// $a_id=$_POST['a_id'];
$a_date=date("Y-m-d");

$sql = 'INSERT INTO activity(a_title, a_content, a_date) VALUES("' . $a_title . '", "' . $a_content . '","' . $a_date . '")';

$result = mysqli_query($con, $sql);
if($result){ 
	$msg = "정상적으로 글이 등록되었습니다.";
	// $a_no = $db->insert_id;
	echo "<script>alert('$msg'); 
	document.location.href='../html/review/activity.php'; 
	</script>";
} else{
	$msg = "글을 등록하지 못했습니다.";
	echo "<script>alert('$msg'); history.back();</script>";
} 

mysqli_close($con);
?>