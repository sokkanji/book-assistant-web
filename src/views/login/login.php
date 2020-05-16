<?php
session_start();
require_once("../base/dbconfig.php");

$email=$_POST['email'];
$pw=$_POST['pw'];

$sql = "SELECT pw, u_name FROM user WHERE email = ?";

$stmt = mysqli_prepare($con, $sql);
$bind = mysqli_stmt_bind_param($stmt, "s", $email);

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while($row = mysqli_fetch_array($result)) {
    if($row['pw'] == $pw) {
        $_SESSION['email'] = $email;
        $_SESSION['u_name'] = $row['u_name'];
        echo "<script> location.href='../base/index.html'; </script>";
    }
}
mysqli_stmt_close($stmt);

echo "<script> alert('이메일 혹은 패스워드가 일치하지 않습니다.'); 
history.back();
</script>";
?>