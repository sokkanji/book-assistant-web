<?php
    session_start();
    $_SESSION["userId"]=$_GET["userId"];
    $_SESSION["u_name"]=$_GET["userNickName"];
    $_SESSION["email"]=$_GET["userEmail"];
    echo "<script>location.href='index.php'</script>";
?>
