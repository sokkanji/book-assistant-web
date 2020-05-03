<?php
require_once("../base/dbconfig.php");

$a_title=$_POST['a_title'];
$a_content=$_POST['a_content'];
// $u_name=$_POST['u_name'];
$a_date=date("Y-m-d");                                                                                                                                                                                                                              

$sql = 'INSERT INTO activity(a_title, a_content, a_date) VALUES("' . $a_title . '", "' . $a_content . '","' . $a_date . '")';

$result = mysqli_query($con, $sql);

if($result){ 
	echo "<script>alert('정상적으로 글이 등록되었습니다.'); 
	document.location.href='../review/activity.php'; 
	</script>";
} else{
	echo "<script>alert('글을 등록하지 못했습니다.');</script>";	
} 

mysqli_close($con);
?>