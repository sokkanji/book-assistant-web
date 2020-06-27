<?php
require_once("./dbconfig.php");
require_once("./password.php");

$u_name=$_POST['u_name'];
$email=$_POST['email'];
$pw1=$_POST['pw1'];
$pw2=$_POST['pw2'];

if($pw1 == $pw2){
	$encrypted_pw = password_hash($pw2, PASSWORD_DEFAULT);
	$sql = 'INSERT INTO user(u_name, email, pw) VALUES("' . $u_name . '","'. $email . '","' . $encrypted_pw  .'")';

	$result = mysqli_query($con, $sql);
	if($result){ 
		echo "<script>alert('회원가입 완료되었습니다.'); 
		location.href='./login.html'; 
		</script>";
	} else{
		echo "<script>alert('회원가입 실패했습니다.');
		history.back();
		</script>";
	} 
} else{
	echo "<script>alert('회원가입 실패했습니다.');
	history.back();
	</script>";
} 

mysqli_close($con);
?>