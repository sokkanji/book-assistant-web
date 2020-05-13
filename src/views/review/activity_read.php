<?php
    require_once("../base/dbconfig.php");

    if(!isset($_SESSION['email'])) { 
        echo "<script> alert('로그인 해주세요.'); 
        location.href='../login/login.html';</script>"; 
    }
?>

<html>

<head>
    <title>책잡이</title>

    <link rel="stylesheet" href="..\..\..\public\css\reset.css">
    <link rel="stylesheet" href="..\..\..\public\css\header.css">
    <link rel="stylesheet" href="..\..\..\public\css\footer.css">
    <link rel="stylesheet" href="..\..\..\public\css\activity_read.css">
    <link rel="stylesheet" href="..\..\..\public\fonts\font.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="..\..\js\includeHtml.js"></script>
    <script type="text/javascript" src="..\..\js\completed.js"></script>
</head>

<body>
    <include-html target="..\base\header.php" completed="headerCompleted"></include-html>

    <div id="activity_read">
        <h1>활동 기록하기</h1>
        <hr>

        <?php
        $sql = "UPDATE activity SET a_hit = a_hit + 1 WHERE a_no = '".$_GET['a_no']."'";
        $result = mysqli_query($con, $sql);
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $sql = "SELECT * FROM activity WHERE a_no= '".$_GET['a_no']."' ";
        $result = mysqli_query($con, $sql);

        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $activity = mysqli_fetch_array($result);
        ?>

        <h2><?php echo $activity['a_title']?></h2>
        <table>
            <tr>
                <td class="r_th">작성일</td>
                <td class="r_td"><?php echo $activity['a_date']?></td>
            </tr>
            <tr>
                <td class="r_th">조회수</td>
                <td class="r_td"><?php echo $activity['a_hit']?></td>
            </tr>
        </table>

        <div class="r_content"><?php echo $activity['a_content']?></div>

        <?php
            if( $_SESSION['u_name']==$activity['u_name']) {
                echo '<div class="activity_list_btn2"><a href="activity_delete.php?a_no='. $activity["a_no"] . ' ">삭제</a></div>';
                echo '<div class="activity_list_btn2"><a href="activity_modify.php?a_no='. $activity["a_no"] . ' ">수정</a></div>';
            }
        ?>

        <div class="activity_list_btn"><a href="activity.php">목록</a></div>
            
    </div>

    <include-html target="..\base\footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();</script>
</body>

</html>