<?php
require_once("../base/dbconfig.php");

$sql ="DELETE FROM activity WHERE a_no='".$_GET['a_no']."'";
$result = mysqli_query($con, $sql);
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
<script type="text/javascript">alert("게시물이 정상적으로 삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=.\activity.php" />