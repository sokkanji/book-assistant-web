<?php
require_once("../base/dbconfig.php");
require_once("./password.php");

$pw1=$_POST['pw1'];
$pw2=$_POST['pw2'];

if($pw1 == $pw2){
	$sql = 'SELECT pw FROM user WHERE email = "' . $_SESSION['email'] . '"';
	$result = mysqli_query($con, $sql);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$board = mysqli_fetch_array($result);

	if(password_verify($pw2, $board['pw'])){
		echo "<script> location.href='./change_pw.html'; </script>";
	} else{
        echo "<script> alert('비밀번호 변경을 실패했습니다.'); 
        history.back(); 
        </script>";
    }
} else{
	echo "<script> alert('없는 계정입니다. 비밀번호를 확인해주세요.'); 
	history.back(); 
	</script>";
}
mysqli_close($con);
?>