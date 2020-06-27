<?php
require_once("./dbconfig.php");
require_once("./password.php");

$pw1=$_POST['pw1'];
$pw2=$_POST['pw2'];

if($pw1 == $pw2){
    $pw = password_hash($pw2, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET pw='".$pw."'WHERE email = '".$_SESSION['email']."'";

    $result = mysqli_query($con, $sql);
    ECHO "<script>console.log('" . $sql . "');</script>";
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if($result){ 
        session_destroy();
        echo "<script> alert('정상적으로 비밀번호 변경되었습니다.'); 
        location.href='./login.html';
        </script>";
    } else{
        echo "<script> alert('비밀번호 변경을 실패했습니다.'); 
        history.back(); 
        </script>";
    }
} else{
    echo "<script> alert('비밀번호가 일치하지 않습니다.'); 
    history.back(); 
    </script>";
}

mysqli_close($con);
?>

