<?php
require_once("../base/dbconfig.php");

$u_name=$_POST['u_name'];
$email=$_POST['email'];
$n_date=date("Y-m-d");    
 
$sql = 'INSERT INTO news(u_name, email) VALUES("' . $u_name . '","'. $email .'")';

$result = mysqli_query($con, $sql);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($result){ 
	echo "<script>alert('". $n_date ."부터 정상적으로 책잡이 뉴스레터를 구독합니다.'); 
	location.href='./news.php'; 
	</script>";
} else{
	echo "<script>alert('뉴스레터 구독하는데 실패했습니다.');
	history.back();
	</script>";
} 

mysqli_close($con);
?>