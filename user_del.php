<?php
session_start();
require_once("./dbconfig.php");
require_once("./password.php");

$pw=$_POST['pw'];

$sql = 'SELECT pw FROM user WHERE email = "' . $_SESSION['email'] . '"';
$result = mysqli_query($con, $sql);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$board = mysqli_fetch_array($result);

if(password_verify($pw, $board['pw'])){
	$sql = 'DELETE FROM user WHERE email = "' . $_SESSION['email'] . '"';
	$result = mysqli_query($con, $sql);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if($result){ 
		session_destroy();
		echo "<script>alert('회원탈퇴 완료되었습니다.'); 
		location.href='./index.php'; 
		</script>";
	} else{
        echo "<script> alert('회원탈퇴 실패했습니다.'); 
        history.back(); 
        </script>";
    }
} else{
	echo "<script>alert('비밀번호가 일치하지 않습니다.');
	history.back();
	</script>";
} 

mysqli_close($con);
?>