<?php
require_once("../base/dbconfig.php");

$sql = "DELETE FROM activity WHERE a_no='".$_GET['a_no']."'";
$result = mysqli_query($con, $sql);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($result){ 
	echo "<script'>alert('글이 정상적으로 삭제되었습니다.');
	location.href='../review/activity.php'; 
	</script>";
} else{
	echo "<script>alert('글을 삭제하지 못했습니다.'); 
	history.back();
	</script>";	
} 
?>