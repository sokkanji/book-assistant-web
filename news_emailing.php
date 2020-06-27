<?php
require_once("./dbconfig.php");

$u_name=$_POST['u_name'];
$email=$_POST['email'];
$n_date=date("Y-m-d");    
 
$sql = 'INSERT INTO news(u_name, email) VALUES("' . $u_name . '","'. $email .'")';

$result = mysqli_query($con, $sql);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($result){ 
	echo "<script>alert('책잡이 뉴스레터 구독 정상 처리되었습니다.'); 
	location.href='./news.php'; 
	</script>";
} else{
	echo "<script>alert('뉴스레터 구독하는데 실패했습니다.');
	history.back();
	</script>";
} 

mysqli_close($con);
?>